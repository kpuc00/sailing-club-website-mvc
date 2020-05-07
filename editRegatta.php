<?php
    include 'app/includes/main.inc.php';  
    $regattaCont = new RegattasController();
    $regatta = $regattaCont->GetRegattaById($_GET["regattaId"]);      
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'app/resources/php/head.php'; ?>
        <link rel="stylesheet" type="text/css" href="app/resources/css/bodystyle.css">
        <link rel="stylesheet" type="text/css" href="app/resources/css/add.css">
    </head>
    <body>
        
        <!-- Navigation Bar -->
        <?php include 'app/resources/views/layout/navbar.php'; ?>

        <div class="content">

            <h1>Add Race</h1>

            <div class="form">

                <form action="app/resources/php/UpdateRegatta.php" method="POST" >
                <h3>Edit the race details:</h3>

                <hr>
                
                <input type="title" id="raceName" name="raceName" placeholder="Title" value="<?php echo $regatta->getName(); ?>">      
                <div id="addRaceError"></div>
                <hr>

                <input type="hidden" name="id" value="<?php echo $regatta->getId(); ?>">

                <button type="submit">submit</button>
                
                </form>
            </div>

        </div>

        <!-- Footer -->
        <footer>
            <?php include 'app/resources/views/layout/footer.php'; ?>
        </footer>
    </body>
</html>