<?php
    spl_autoload_register(function($className) {        
        $path = $_SERVER['DOCUMENT_ROOT'];
        $path .= "/mvc-model/app/storage/database/";
        $ext = ".class.php";
        $fullPath = $path . $className . $ext;

        if (!file_exists($fullPath)) {
            return false;
        }

        include "$fullPath";
    });
?>