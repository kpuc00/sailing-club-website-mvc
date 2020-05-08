<?php
    include 'app/includes/main.inc.php';        
?>

<!DOCTYPE html>
<html>

<head>
    <title>List of regattas</title>
    <?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/bodystyle.css">
    <link rel="stylesheet" type="text/css" href="app/resources/css/list.css"> 
    <link rel="stylesheet" type="text/css" href="app/resources/css/form-popup.css"> 
</head>

<body>

    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <!-- content -->
    <div id="data" class="list">
        <h1>List of regattas</h1>
        <?php
            $regattaObj = new regattaView();
            $regattaObj->list();
        ?>
    </div>

</body>

</html>