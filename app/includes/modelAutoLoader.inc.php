<?php
    spl_autoload_register(function($className) {
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/public_html/app/model/";
        $ext = ".class.php";
        $fullPath = $path . $className . $ext;

        if (!file_exists($fullPath)) {
            return false;
        }

        include "$fullPath";
    });
?>