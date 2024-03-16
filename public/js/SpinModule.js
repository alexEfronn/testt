var SpinModule = (function() {
	var _inputRangeFrom;
	var _inputRangeTo;
	var _spinnerId;
	var _spinnerRange;
	var _maxSpins;
	var _sliderRange;
	var _buttonSpin;
	var _cachedRangeFrom;
	var _cachedRangeTo;
	var _csrf;
	var _spansWinType;
	var _spanWinTypeWin;
	var _spanWinTypePrewin;
	var _spanWinTypeLose;
	var LiveDropModule;
	var _buttonSpinDisabled;
	var _spanBalance;
	var _spinnerPrice;

	var caseOpenAudio = new Audio();
	caseOpenAudio.src = "../audio/open.wav";
	caseOpenAudio.volume = 0.1;
	
	var caseCloseAudio = new Audio();

	caseCloseAudio.src = "../audio/win.mp3";
	caseCloseAudio.volume = 0.1;
	var caseScrollAudio = new Audio();
	caseScrollAudio.src = "../audio/scroll.mp3";
	caseScrollAudio.volume = 0.2;
		
	var _init = function(params) {
		_inputRangeFrom = $(params["inputRangeFrom"]);
		_inputRangeTo = $(params["inputRangeTo"]);
		_buttonSpin = $(params["buttonSpin"]);
		_sliderRange = document.querySelector(params["sliderRange"]);
		_spinnerId = params["spinnerId"];
		_spinnerRange = params["spinnerRange"];
		_maxSpins = params["maxSpins"];
		_User = params["User"];
		_csrf = params["csrf"];
		_spinner = $(params["spinner"]);
		_spinsCounter = document.querySelector(params["spinsCounter"]);
		_winModal = $(params["winModal"]);
		_winSum = $(params["winSum"]);
		_spansWinType = $(params["winType"]);
		_spanWinTypeWin = $(params["winTypeWin"]);
		_spanWinTypePrewin = $(params["winTypePrewin"]);
		_spanWinTypeLose = $(params["winTypeLose"]);
		LiveDropModule = params["LiveDropModule"];
		_buttonSpinDisabled = false;
		_spanBalance = $(params["spanBalance"]);
		_spinnerPrice = params["spinnerPrice"];

		_cachedRangeFrom = 1;
		_cachedRangeTo = _spinnerRange;

		_inputRangeFrom.val(_cachedRangeFrom);
		_inputRangeTo.val(_cachedRangeTo);
		var range = {};
		for(var i = 1; i <=_maxSpins; i++) {
			range[ ((i / _maxSpins) * 100) + "%"] = i;
		}
		range["min"] = 1;range["max"] = _maxSpins;
		noUiSlider.create(_sliderRange, {
			start: [_cachedRangeFrom, _cachedRangeTo],
			connect: true,
			range: range,
			tooltips: true,
			pips: {
				mode: 'values',
				values: [1, _maxSpins],
				density:0
			},
			format: {
				to:function(dig) {return dig ^ 0;},
				from:function(dig) {return dig;}
			}
		});

		_setEvents();
	};
	var _setEvents = function() {
		_buttonSpin.on("click", _onButtonSpinClicked);
		_sliderRange.noUiSlider.on("change", _onRangeSliderChanged);
		_inputRangeFrom.on("change", _onInputRangeFromChanged);
		_inputRangeTo.on("change", _onInputRangeToChanged);
	};
	var _onButtonSpinClicked = function() {
		if(_buttonSpinDisabled) return;
		LiveDropModule.setPause(true);
		var formData = new FormData();
		formData.append("id", _spinnerId);
		formData.append("rangeFrom", _cachedRangeFrom);
		formData.append("rangeTo", _cachedRangeTo);
		formData.append("_token", _csrf);
		Utils.api("spin", formData, _spinSuccess, _spinError);
		_buttonSpinDisabled = true;
	};
	var _spinSuccess = function(response) {
		_spanBalance.text((_spanBalance.text() ^ 0) - _spinnerPrice);
		var spinsCount = response["spinsCount"] + 1;
		var socket = io.connect(':2019', {rememberTransport: false});
		socket.emit('update');
		var rand_deg = Math.floor(Math.random() * 40) + 200;

		var total_deg = -360 * spinsCount + rand_deg;
		var duration = Math.max(4000, (Math.log(spinsCount) / Math.log(1.8)) * 2000);

		//caseOpenAudio.play();
		var cacheInnerText = "";

		$({deg: 0}).animate({deg: total_deg}, {
			duration: duration,
			easing: 'swing', 
			step: function(now) { 
				_spinner.css({ transform: "rotate(" + now + "deg)" }); 

				_spinsCounter.innerText = (now / -360)^0;

				if (cacheInnerText != _spinsCounter.innerText && cacheInnerText != "")
				{
					caseScrollAudio.pause();     
					caseScrollAudio.currentTime = 0;
					caseScrollAudio.play();
				}

				cacheInnerText = _spinsCounter.innerText;
			},
			done:function() {
				LiveDropModule.setPause(false);
				_spansWinType.hide();

				if(response.ratio > 0.5) {
					_spanWinTypeWin.show();
				}
				else if(response.ratio >= 0.4 && response.ratio <= 0.5) {
					_spanWinTypePrewin.show();
				}
				else {
					_spanWinTypeLose.show();
				}
				_buttonSpinDisabled = false;
				_spanBalance.text(response.balance);

				caseCloseAudio.play();
				_winModal.modal("show");

				var counter = 0;
				var interval = 10;

				
				if (response.winSum < 1000) {

					if (response.winSum < 50) interval = interval * 2;
					if (response.winSum > 300) interval = interval / 3;
					if (response.winSum > 800) interval = interval / 4;

					var timer = setInterval(function() { 
						counter++;
						if (counter <= response.winSum)
							_winSum.text(counter);
					}, interval);

					setTimeout(function() { 
						if (counter == response.winSum) {
							clearInterval(timer);
						}
					}, 3000);

				}
				else {
					_winSum.text(response.winSum);
				}

							
			}
		});
	};
	var _spinError = function(response) {
		Utils.showError(response.error);
		LiveDropModule.setPause(false);
		_buttonSpinDisabled = false;
	};
	var _onRangeSliderChanged = function(ranges) {

		if(ranges[0] === _cachedRangeFrom) {
			_cachedRangeFrom = ranges[1] - _spinnerRange + 1;
			_cachedRangeTo = ranges[1];
		}
		else {
			_cachedRangeTo = ranges[0] + _spinnerRange - 1;
			_cachedRangeFrom = ranges[0];
		}
		if(_cachedRangeFrom < 1) {
			_cachedRangeFrom = 1;
			_cachedRangeTo = _cachedRangeFrom + _spinnerRange - 1;
		}
		if(_cachedRangeTo > _maxSpins) {
			_cachedRangeTo = _maxSpins;
			_cachedRangeFrom = _cachedRangeTo - _spinnerRange + 1;
		}

		_inputRangeTo.val(_cachedRangeTo);
		_inputRangeFrom.val(_cachedRangeFrom);
		_sliderRange.noUiSlider.set([_cachedRangeFrom, _cachedRangeTo]);
	};
	var _onInputRangeFromChanged = function() {
		_cachedRangeFrom = _inputRangeFrom.val() ^ 0;
		_cachedRangeTo = _cachedRangeFrom + _spinnerRange - 1;
		if(_cachedRangeFrom < 1) {
			_cachedRangeFrom = 1;
			_cachedRangeTo = _cachedRangeFrom + _spinnerRange - 1;
		}
		_inputRangeTo.val(_cachedRangeTo);
		_inputRangeFrom.val(_cachedRangeFrom);
		_sliderRange.noUiSlider.set([_cachedRangeFrom, _cachedRangeTo]);
	};
	var _onInputRangeToChanged = function() {
		_cachedRangeTo = _inputRangeTo.val() ^ 0;
		_cachedRangeFrom = _cachedRangeTo - _spinnerRange + 1;
		if(_cachedRangeTo > _maxSpins) {
			_cachedRangeTo = _maxSpins;
			_cachedRangeFrom = _cachedRangeTo - _spinnerRange + 1;
		}
		_inputRangeTo.val(_cachedRangeTo);
		_inputRangeFrom.val(_cachedRangeFrom);
		_sliderRange.noUiSlider.set([_cachedRangeFrom, _cachedRangeTo]);
	};
	return {
		"init":_init
	}
})();
