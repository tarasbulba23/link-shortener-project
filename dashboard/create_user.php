<?php

// Allow the config
define('__CONFIG__', true);
// Require the config
require_once "../inc/config.php";

Page::ForceLogin();

$User = new User($_SESSION['user_id']);

require_once '../inc/header.php';

?>

    <div class="container">
        <?php include '../inc/header_dashboard.php';?>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form role="form" id="create-user">
                    <p class="bg-danger message-border" id="error-contener" style="display: none"></p>
                    <p class="bg-success message-border" id="success-contener" style="display: none"></p>
                    <div class="form-group">
                        <label for="exampleInputPassword">
                            Name
                        </label>
                        <input class="form-control" id="inputName" type="text" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">
                            Password
                        </label>
                        <input class="form-control" id="inputPass" type="password" />
                    </div>
                    <div class="form-group">
                        <ul class="list-inline list-unstyled list-footer">
                            <li>
                                <label>
                                    <input type="checkbox" name="create"/> Create
                                </label>
                            </li><li>
                                <label>
                                    <input type="checkbox" name="read"> Read
                                </label>
                            </li><li>
                                <label>
                                    <input type="checkbox" name="update"/> Update
                                </label>
                            </li><li>
                                <label>
                                    <input type="checkbox" name="delete"/> Delete
                                </label>
                            </li>
                        </ul>
                    </div>
                    <button type="submit" class="btn btn-default">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

<?php require_once "../inc/footer.php"; ?>