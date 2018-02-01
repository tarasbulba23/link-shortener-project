<?php

// Allow the config
define('__CONFIG__', true);
// Require the config
require_once "../inc/config.php";

Page::ForceLogin();

$User = new User($_SESSION['user_id']);

$categoriesSQL = DB::getConnection()->query('SELECT `id`, `name` FROM `short_url_category`');

require_once '../inc/header.php';

?>

    <div class="container">
        <?php include '../inc/header_dashboard.php';?>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form role="form" id="create-url">
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
                            URL
                        </label>
                        <input class="form-control" id="inputUrl" type="text" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">
                            Category
                        </label>
                        <select name="category" id="inputCategory">
                            <option value="" disabled selected></option>
                            <?php
                            while ($row = $categoriesSQL->fetch(PDO::FETCH_ASSOC)) {
                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                            }
                            $categoriesSQL->closeCursor();
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

<?php require_once "../inc/footer.php"; ?>