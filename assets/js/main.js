$(document)
.on("submit", "form#register", function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $("#error-contener", _form);

    var dataObj = {
        login: $("input[type='text']", _form).val(),
        email: $("input[type='email']", _form).val(),
        password: $("#inputPassword1", _form).val(),
        password_repeat: $("#inputPassword2", _form).val()
    };

    if (!dataObj.login.match(/^[A-Za-z0-9_]+$/) || dataObj.login.length < 6) {
        _error
            .text("Wrong login accept characters A-Z a-z 0-9 _ and at least 6 characters long.")
            .show();
        return false;
	} else if (dataObj.email.length < 6) {
        _error
            .text("Please enter a valid email address")
            .show();
        return false;
    } else if (dataObj.password.length < 8) {
		_error
			.text("Please enter a passphrase that is at least 8 characters long.")
			.show();
		return false;
	} else if (dataObj.password_repeat !== dataObj.password) {
		_error
			.text("Password not matches.")
			.show();
		return false;
	}

	// Assuming the code gets this far, we can start the ajax process
	_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/register.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is 
		if(data.redirect !== undefined) {
			window.location = data.redirect;
		} else if(data.error !== undefined) {
			_error
				.text(data.error)
				.show();
		}
	})
	.fail(function ajaxFailed(e) {
		// This failed 
	})
	.always(function ajaxAlwaysDoThis(data) {
		// Always do
		console.log('Always');
	});

	return false;
})
// 
.on("submit", "form#login", function(event) {
	event.preventDefault();

	var _form = $(this);
	var _error = $("#error-contener", _form);

	var dataObj = {
		email: $("input[type='email']", _form).val(),
		password: $("input[type='password']", _form).val()
	};

	if(dataObj.email.length < 6) {
		_error
			.text("Please enter a valid email address")
			.show();
		return false;
	} else if (dataObj.password.length < 8) {
		_error
			.text("Please enter a passphrase that is at least 8 characters long.")
			.show();
		return false;
	}

	// Assuming the code gets this far, we can start the ajax process
	_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/login.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is 
		if(data.redirect !== undefined) {
			window.location = data.redirect;
		} else if(data.error !== undefined) {
			_error
				.html(data.error)
				.show();
		}
	})
	.fail(function ajaxFailed(e) {
		// This failed 
	})
	.always(function ajaxAlwaysDoThis(data) {
		// Always do
		console.log('Always');
	});

	return false;
})

.on("submit", "form#verification", function(event) {
	event.preventDefault();

	var _form = $(this);
	var _error = $("#error-contener", _form);

	var dataObj = {
		code: $("input[type='text']", _form).val()
	};

	if(dataObj.code.length !== 32 || !dataObj.code.match(/^[a-z0-9]+$/)) {
		_error
			.text("Please enter a valid code")
			.show();
		return false;
	}

	// Assuming the code gets this far, we can start the ajax process
	_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/verification.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is
		if(data.redirect !== undefined) {
			window.location = data.redirect;
		} else if(data.error !== undefined) {
			_error
				.html(data.error)
				.show();
		}
	})
	.fail(function ajaxFailed(e) {
		// This failed
	})
	.always(function ajaxAlwaysDoThis(data) {
		// Always do
		console.log('Always');
	});

	return false;
})
.on("submit", "form#forgot", function(event) {
	event.preventDefault();

	var _form = $(this);
	var _error = $("#error-contener", _form);

	var dataObj = {
		email: $("input[type='email']", _form).val()
	};

    if(dataObj.email.length < 6) {
        _error
            .text("Please enter a valid email address")
            .show();
        return false;
    }

	// Assuming the code gets this far, we can start the ajax process
	_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/check_forgot_email.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is
		if(data.redirect !== undefined) {
			window.location = data.redirect;
		} else if(data.error !== undefined) {
			_error
				.html(data.error)
				.show();
		}
	})
	.fail(function ajaxFailed(e) {
		// This failed
	})
	.always(function ajaxAlwaysDoThis(data) {
		// Always do
		console.log('Always');
	});

	return false;
})
.on("submit", "form#change-password", function(event) {
	event.preventDefault();

	var _form = $(this);
	var _error = $("#error-contener", _form);

    var dataObj = {
        id: $("#id", _form).val(),
        email: $("#code", _form).val(),
        password: $("#inputPassword1", _form).val(),
        password_repeat: $("#inputPassword2", _form).val()
    };

    if (dataObj.id.length < 0) {
        _error
            .text("Wrong param.")
            .show();
        return false;
    } else if (dataObj.email.length < 0) {
        _error
            .text("Wrong param.")
            .show();
        return false;
    } else if (dataObj.password.length < 8) {
        _error
            .text("Please enter a passphrase that is at least 8 characters long.")
            .show();
        return false;
    } else if (dataObj.password_repeat !== dataObj.password) {
        _error
            .text("Password not matches.")
            .show();
        return false;
    }

	// Assuming the code gets this far, we can start the ajax process
	_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/change_password.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is
		if(data.redirect !== undefined) {
			window.location = data.redirect;
		} else if(data.error !== undefined) {
			_error
				.html(data.error)
				.show();
		}
	})
	.fail(function ajaxFailed(e) {
		// This failed
	})
	.always(function ajaxAlwaysDoThis(data) {
		// Always do
		console.log('Always');
	});

	return false;
});
