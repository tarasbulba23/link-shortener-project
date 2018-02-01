<?php 

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php"; 

	Page::ForceDashboard();

	require_once 'inc/header.php';
?>

<div class="container>
    <div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
	<form role="form" id="change-password">
		<p class="bg-danger message-border" id="error-contener" style="display: none"></p>
        <input type="hidden" value="<?=@htmlspecialchars($_GET['id'])?>" id="id">
        <input type="hidden" value="<?=@htmlspecialchars($_GET['code'])?>" id="code">
        <div class="form-group">

            <label for="exampleInputPassword1">
                Password
            </label>
            <input class="form-control" id="inputPassword1" type="password" />
        </div>
        <div class="form-group">

            <label for="exampleInputPassword1">
                Repeat Password
            </label>
            <input class="form-control" id="inputPassword2" type="password" />
        </div>
        <button type="submit" class="btn btn-default">
            Submit
        </button>
	</form>
</div>
</div>
</div>


<?php require_once "inc/footer.php"; ?>
