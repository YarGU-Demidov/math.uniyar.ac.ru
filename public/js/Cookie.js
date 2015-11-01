var Cookie = {
	Get: function(name) {
		var matches = document.cookie.match(new RegExp(
			"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
		));
		return matches ? decodeURIComponent(matches[1]) : null;
	},

	Delete: function(name) {
		this.Set(name, "", -1);
	},

	Set: function (name, value) {

		function setCookie(cookieName, newValue, opt) {
			opt = opt || {};

			var expires = opt.expires;

			if (typeof expires == "number" && expires) {
				var d = new Date();
				d.setTime(d.getTime() + expires*1000);
				expires = opt.expires = d;
			}
			if (expires && expires.toUTCString) {
				opt.expires = expires.toUTCString();
			}

			newValue = encodeURIComponent(newValue);

			var updatedCookie = cookieName + "=" + newValue;

			for(var propName in opt) {
				updatedCookie += "; " + propName;
				var propValue = opt[propName];
				if (propValue !== true) {
					updatedCookie += "=" + propValue;
				}
			}

			document.cookie = updatedCookie;
		}

		var exp = new Date();
		exp.setFullYear(exp.getFullYear()+100);


		setCookie(name, value, {
			path:		"/",
			//domain:		"math.uniyar.ac.ru",
			expires:	exp
		});
	}
}