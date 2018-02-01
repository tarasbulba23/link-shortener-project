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
	<form role="form" id="verification">
		<p class="bg-danger message-border" id="error-contener" style="display: none"></p>
		<div class="form-group">
			<label for="exampleInputEmail1">
				Code
			</label>
			<input class="form-control" id="inputCode" type="text" value="<?=@htmlspecialchars($_GET['key'])?>"/>
		</div>
		<button type="submit" class="btn btn-default">
			Submit
		</button>
	</form>
</div>
</div>
</div>


<?php require_once "inc/footer.php"; ?>
