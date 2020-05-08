<?php
    include 'app/includes/main.inc.php';        
?>

<!DOCTYPE html>
<html>
<head>
    <title>Race registration</title>
    <?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/takePartRace.css">
    <script src="javascript/validateTakePartRaceInput.js"></script>
</head>
<body>

    <!-- Navigation Bar -->
    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <div class = "raceRegistration">

        <h1 id="registrationTitle">Registration Form</h1>

        <form action="fetchData/InsertCompetitor.php?regattaID=<?php echo $_GET["regattaID"]?>" method="POST" onsubmit="return validate()">
            <div class = "raceRegistrationForm">
                <div id="firstNameField">
                    <label  for="firstName">First Name</label></br>
                    <input type="text" name="firstName" id="firstName" placeholder="First Name">
                    <label id="firstNameError" for="firstName"></label>
                </div>

                <div id="lastNameField">
                    <label for="lastName">Last Name</label></br>
                    <input type="text" name="lastName" id="lastName" placeholder="Last Name">
                    <label id="lastNameError" for="firstName"></label>
                </div>

                <div id="ageField">
                    <label for="age">Age</label></br>
                    <input type="text" name="age" id="age" placeholder="Age">
                    <label id="ageError" for="firstName"></label>
                </div>

                <div id="clubField">
                    <label for="club">Club</label></br>
                    <input type="text" name="club" id="club" placeholder="Club">
                    <label id="clubError" for="firstName"></label>
                </div>

                <input type="submit" value="Submit" id="submintBtn"/>
                
            </div>
            
                
        </form>

    </div>

    <!-- Footer -->
    <footer>
        <?php include 'app/resources/views/layout/footer.php'; ?>
    </footer>

</body>
</html>