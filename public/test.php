<?php
    // on déclenche une temporisation
    ob_start();
    require __DIR__ . "/page.php";

    $content = ob_get_clean();

    var_dump($content);
    die();