<?php

// Allow the config
define('__CONFIG__', true);

// Require the config
require_once "../inc/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Always return JSON format
    header('Content-Type: application/json');

    $return = [];

    $name = Filter::String( $_POST['name'] );

    $SQLdata = $con->prepare("SELECT su.id, su.name, su.url, suc.name as category FROM short_url su INNER JOIN short_url_category suc ON su.category = suc.id WHERE su.`name` LIKE :name");
    $SQLdata->bindValue(':name', '%' . $name . '%', PDO::PARAM_STR);
    $SQLdata->execute();

    if ($SQLdata->rowCount() != 0) {

        $return['success'] = '<table class="table">
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
                <tbody>';
        while ($row = $SQLdata->fetch(PDO::FETCH_ASSOC)) {
            $return['success'] .= '<tr>';
            foreach ($row as $value) {
                $return['success'] .= '<td>' . $value . '</td>';
            }
            $return['success'] .= '</tr>';
        }

        $return['success'] .= '</tbody>
                            </table>';

    } else {
        $return['error'] = 'Not found';
    }

    echo json_encode($return, JSON_PRETTY_PRINT); exit;
} else {
    // Die. Kill the script. Redirect the user. Do something regardless.
    exit('Invalid URL');
}