<?php

    header('Content-type: application/json; charset=UTF-8');

    $response = [];

    if ($_POST['delete']) {
        require_once 'database.php';

        $pid = intval($_POST['delete']);
        $query = 'DELETE FROM location WHERE id=:pid';
        $stmt = $DBcon->prepare($query);
        $stmt->execute([':pid'=>$pid]);

        if ($stmt) {
            $response['status'] = 'success';
            $response['message'] = 'Product Deleted Successfully ...';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Unable to delete product ...';
        }
        echo json_encode($response);
    }
