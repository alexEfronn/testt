var LiveDropModule = (function() {

	var _liveDropBlock;
	var _liveDropItems;
	var _socketModule;
	var _totalOpens;
	var _params;
	var _pause;

	var _init = function(params) {
		_liveDropBlock = $(params["liveDropBlock"]);
		_liveDropItems = $(params["liveDropItems"]);
		_totalOpens = $(params["totalOpens"]);
		_socketModule = params["socketModule"];
		_params = params;
		_pause = false;
		_setEvents();
	};
	var _setEvents = function() {
		_socketModule.setListener("livedrop", _onNewDrop);
	};
	var _onNewDrop = function(data) {
		console.log(data);
		var interval = setInterval(function() {
			if(!_pause) {
				clearInterval(interval);
				var parsedData = JSON.parse(data);
				_appendDrop(parsedData.newDrop);
				_setTotalOpens(parsedData.totalOpens);
			}
		}, 1000);
	};
	var _appendDrop = function(data) {
		_liveDropBlock.prepend($(data).hide().fadeIn("fast"));
		_deleteLastDrop();
	}
	var _setTotalOpens = function(totalOpens) {
		_totalOpens.text(totalOpens);
	}
	var _deleteLastDrop = function() {
		$(_liveDropItems[_liveDropItems.length - 1]).remove();
		_liveDropItems = $(_params["liveDropItems"]);
	};
	var _setPause = function(pause) {
		_pause = pause;
	}
	return {
		"init":_init,
		"setPause":_setPause
	}
})();