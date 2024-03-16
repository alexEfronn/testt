var Utils = (function() {
	var _api = function(method, params, onSuccess, onError, onProcess) {
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "/api/"+method, true);
		xhr.send(params);
		xhr.onreadystatechange = function() {
			if(xhr.readyState != 4) return;

			if(xhr.status != 200) {
				console.log(xhr.status+ ': '+xhr.statusText);
			}
			else {
				var response = JSON.parse(xhr.responseText);
				if(response.success === true) {
					onSuccess(response);
				}
				else {
					if(typeof onError === "function") {
						onError(response);
					}
				}
			}
		}
		if(typeof onProcess === "function") {
			onProcess();
		}
	}
	var _reload = function() {
		document.location.href = "";
	}
	var _redirect = function(url) {
		document.location.href = url;
	}
	var _showError = function(text) {
		_showBox(text, "error", 1500);
	};
	var _showMessage = function(text) {
		_showBox(text, "success", 1500);
	};
	var _showNotice = function(text) {
		_showBox(text, "notice", 1500);
	};
	var _showBox = function(word, type, time) {
		$('#notification-unotification-box').remove();

        _type = type == 'error' ? "Ошибка" : "Успех";

        $('body').append('<div class="notification_box '+type+'" id="notification-unotification-box"><div class="head"><i class="icon icon-'+type+'-white"></i><h3>'+_type+'</h3></div><p>'+word+'</p></div>');

        $('#notification-unotification-box').fadeIn();
        setTimeout(function(){$('#notification-unotification-box').fadeOut();}, time);
	}
	return {
		api:_api,
		reload:_reload,
		redirect:_redirect,
		showError:_showError,
		showMessage:_showMessage,
		showNotice:_showNotice
	}
})();