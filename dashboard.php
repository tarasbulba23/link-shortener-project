<?php 

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php"; 

	Page::ForceLogin();

  $User = new User($_SESSION['user_id']);

  $db = DB::getConnection();
  $links = $db->query('SELECT su.id, su.name, su.url, suc.name as category FROM short_url su INNER JOIN short_url_category suc ON su.category = suc.id');

  require_once 'inc/header.php';

?>

<div class="container">
    <?php include 'inc/header_dashboard.php';?>
    <div class="row">
        <div class="col-md-12">
            <?php if ($links->rowCount() > 0) : ?>
            <table class="table">
                <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Url
                    </th>
                    <th>
                        Category
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                    while ($row = $links->fetch(PDO::FETCH_ASSOC)) {
                        echo '<tr>';
                        foreach ($row as $value) {
                            echo '<td>';
                            echo $value;
                            echo '</td>';
                        }
                        echo '</tr>';
                    }
                ?>
                </tbody>
            </table>
            <?php else : ?>
                <p class="bg-info message-border">You don`t have any link</p>
            <?php endif;?>
        </div>
    </div>
</div>

<?php require_once "inc/footer.php"; ?>
