<?php
    include 'app/includes/main.inc.php';        
?>

<!DOCTYPE html>
<html>

<head>
    <title>List of regattas</title>
    <link rel="stylesheet" type="text/css" href="app/resources/css/bodystyle.css">
    <link rel="stylesheet" type="text/css" href="app/resources/css/listOfRegattas.css"> 
</head>

<body>

    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <div class="listOfRegattas">
        <h1>List of regattas</h1>
        <?php
        $regattaObj->regattaList();
        ?>
    </div>
    
    <footer>
            <?php include 'app/resources/views/layout/footer.php'; ?>
    </footer>

</body>
</html>