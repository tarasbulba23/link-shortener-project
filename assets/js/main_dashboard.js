$(document)
.on("submit", "form#create-category", function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $("#error-contener", _form);
    var _success= $("#success-contener", _form);

    var dataObj = {
        name: $("input[type='text']", _form).val()
    };

    if (!dataObj.name.match(/^[A-Za-z0-9_]+$/) || dataObj.name.length < 1) {
        _error
            .text("Wrong name accept characters A-Z a-z 0-9 _ and at least 1 characters long.")
            .show();
        return false;
	}

	// Assuming the code gets this far, we can start the ajax process
	_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/create_category.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is 
		if(data.success !== undefined) {
            _success
				.text(data.success)
                .show();
            _form[0].reset();
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
	})

	return false;
})
.on("submit", "form#create-url", function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $("#error-contener", _form);
    var _success= $("#success-contener", _form);

    var dataObj = {
        name: $("#inputName", _form).val(),
        url: $("#inputUrl", _form).val(),
		category: $("#inputCategory", _form).val()
    };

    var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name and extension
        '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
        '(\\:\\d+)?'+ // port
        '(\\/[-a-z\\d%@_.~+&:]*)*'+ // path
        '(\\?[;&a-z\\d%@_.,~+&:=-]*)?'+ // query string
        '(\\#[-a-z\\d_]*)?$','i'); // fragment locator

    if (!dataObj.name.match(/^[A-Za-z0-9_]+$/) || dataObj.name.length < 1) {
        _error
            .text("Wrong login accept characters A-Z a-z 0-9 _ and at least 1 characters long.")
            .show();
        return false;
	} else if (!pattern.test(dataObj.url)) {
        _error
            .text("Wrong, no valid url.")
            .show();
        return false;
	} else if (dataObj.category == null || dataObj.category.length < 1) {
        _error
            .text("Wrong, category must be select")
            .show();
        return false;
	}

	// Assuming the code gets this far, we can start the ajax process
	_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/create_url.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is
		if(data.success !== undefined) {
            _success
				.text(data.success)
                .show();
            _form[0].reset();
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
.on("submit", "form#create-user-group", function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $("#error-contener", _form);
    var _success= $("#success-contener", _form);

    var dataObj = {
        name: $("#inputName", _form).val(),
		right: $("input[type='checkbox']", _form).val()
    };

    if (!dataObj.name.match(/^[A-Za-z0-9_]+$/) || dataObj.name.length < 1) {
        _error
            .text("Wrong login accept characters A-Z a-z 0-9 _ and at least 1 characters long.")
            .show();
        return false;
	}

	// Assuming the code gets this far, we can start the ajax process
	_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/create_user_group.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is
		if(data.success !== undefined) {
            _success
				.text(data.success)
                .show();
            _form[0].reset();
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
.on("submit", "form#create-user", function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $("#error-contener", _form);
    var _success= $("#success-contener", _form);

    var dataObj = {
        name: $("#inputName", _form).val(),
        password: $("#inputPass", _form).val(),
		right: $("input[type='checkbox']", _form).val()
    };

    if (!dataObj.name.match(/^[A-Za-z0-9_]+$/) || dataObj.name.length < 1) {
        _error
            .text("Wrong login accept characters A-Z a-z 0-9 _ and at least 1 characters long.")
            .show();
        return false;
	} else if (dataObj.password.length < 8) {
        _error
            .text("Wrong password at least 8 characters long.")
            .show();
        return false;
	}

	// Assuming the code gets this far, we can start the ajax process
	_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/create_user.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is
		if(data.success !== undefined) {
            _success
				.text(data.success)
                .show();
            _form[0].reset();
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
.on("submit", "form#search", function(event) {
    event.preventDefault();

    var _form = $(this);
    var _error = $("#error-contener", _form);
    var _result = $("#result");
    _result.hide();

    var dataObj = {
        name: $("#inputName", _form).val()
    };

    if (dataObj.name.length < 1) {
        _error
            .text("Wrong at least 1 characters long.")
            .show();
        return false;
	}

	// Assuming the code gets this far, we can start the ajax process
	_error.hide();

	$.ajax({
		type: 'POST',
		url: '/ajax/search.php',
		data: dataObj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
		// Whatever data is
		if(data.success !== undefined) {
            _result
				.html(data.success)
                .show();
            _form[0].reset();
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
});