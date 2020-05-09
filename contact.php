<?php
    include 'app/includes/main.inc.php';  
    
    $userObj = new userView();
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Contact</title>
        <?php include 'app/resources/php/head.php'; ?>
        <link rel="stylesheet" type="text/css" href="app/resources/css/contact.css">
    </head>

    <body>     
        <!-- Navigation Bar -->
        <?php include 'app/resources/views/layout/navbar.php'; ?>

        <div class="content">

            <h1>Contact</h1>

            <div class="leftColumn">

                <div class="form">
                    <form action="app/resources/php/InsertContactMessage.php" method="POST">
                        <?php
                            if (isset($_SESSION['success'])) 
                            {
                                echo '<div class="success"><p>' . $_SESSION['success'] .'</p></div>';
                            }
                        ?>
                        <label for="name">Name</label>
                        <input type="name" id="name" name="name" placeholder="Your Name" value="<?php echo $_SESSION['displayname']; ?>" required>

                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="yourname@domain.com" value="<?php echo $_SESSION['email']; ?>" required>

                        <label for="phone">Phone</label>
                        <input type="tel" id="phone" name="phone" placeholder="+359234567890" required>

                        <label for="subject">Message</label>
                        <textarea id="subject" name="subject" placeholder="Your message here.." style="height:200px" required></textarea>

                        <input type="submit" value="Submit" >
                    </form>
                </div>

            </div>

            <div class="rightColumn">
                <h3>Feel free to message us. We will respond you as soon as we can!</h3>
                <h4>Coaches:</h4>
                <p>
                    <img class='profilepic' src='app/storage/images/profilepictures/<?php echo $userObj->KrisPic(); ?>'><br>
                    <strong>Kristiyan Strahilov</strong><br>
                    k.strahilov@student.fontys.nl
                </p>
                <p>
                    <img class='profilepic' src='app/storage/images/profilepictures/<?php echo $userObj->MichaelPic(); ?>'><br>
                    <strong>Michael Groenewegen van der Weijden</strong><br>
                    m.groenewegenvanderweijden@student.fontys.nl
                </p>
            </div>

        </div>
        <!-- Footer -->
        <footer>
            <?php include 'app/resources/views/layout/footer.php'; ?>
        </footer>

    </body>

</html>