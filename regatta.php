<?php
    include 'app/includes/main.inc.php'; 
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Regatta 2019</title>
        <?php include 'app/resources/php/head.php'; ?>
        <link rel="stylesheet" type="text/css" href="app/resources/css/regatta.css">
    </head>

    <body>
        <!-- Navigation Bar -->
        <?php include 'app/resources/views/layout/navbar.php'; ?>

        <!-- Content Start -->
        <div class="content">

        <?php if(isset($_SESSION['loggedin'])){ ?>
            <a href="takePartRace.php?regattaId=<?php echo $_GET["regattaId"]?>">
                <input type="submit" value="Take part"/>
            </a>
        <?php
        } 
        else { ?>
            <a href="login.php">
                <input type="submit" value="Take part"/>
            </a>            
        <?php
        }
        ?>

            
            <!-- Table Of Competitors Start -->
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Club</th>
                </tr>
                <?php
                    $regattaView = new regattaView();
                    $regattaView->viewRegattaCompetitorsByRegattaId($_GET["regattaId"]);
                ?>
            </table>
            <!-- Table Of Competitors End -->

        </div>
        <!-- Content End -->

        <!-- Footer -->
        <footer>
            <?php include 'app/resources/views/layout/footer.php'; ?>
        </footer>

    </body>

</html>