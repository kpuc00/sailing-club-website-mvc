<?php
    include 'app/includes/main.inc.php'; 
?>

<?php
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Profile</title>
	<?php include 'app/resources/php/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="app/resources/css/profile.css">
</head>

<body>

    <!-- Navigation Bar -->
    <?php include 'app/resources/views/layout/navbar.php'; ?>

    <div class="content">

	<h1>Account</h1>

	<div class="leftColumn">
		<h3>Welcome back, <?=$_SESSION['displayname']?>!</h3>

		<p>Your account details are below:</p>
			<table>
				<tr>
					<td>Username:</td>
					<td><?=$_SESSION['username']?></td>
				</tr>
				<tr>
					<td>Display name:</td>
					<td><?=$_SESSION['displayname']?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?=$_SESSION['email']?></td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td><?=$_SESSION['phone']?></td>
				</tr>
				<tr>
					<td>User type:</td>
					<td><?=$_SESSION['usertype']?></td>
				</tr>
				<tr>
					<td>Last login:</td>
					<td><?=$_SESSION['lastlogin']?></td>
				</tr>
				<tr>
					<td>Register date:</td>
					<td><?=$_SESSION['registerdate']?></td>
				</tr>
			</table>
			
		<?php
		//message for a success operation
			if (isset($_SESSION['usersuccess'])) 
			{
				echo '<div class="success"><p>' . $_SESSION['usersuccess'] .'</p></div>';
			}
		?>
		<form action="changeuserinfo.php" method="post">
			<input type="submit" name="changeUserInfo" value="Change user information">
		</form>
		<form action="changepassword.php" method="post">
			<input type="submit" name="changepassword" value="Change password">
		</form>
		<form class="delete" action="deleteprofile.php" method="post">
			<input type="submit" name="deleteprofile" value="Delete profile">
		</form>

	</div>

	<div class="rightColumn">
	<?php echo "<img id='profilepic' class='profilepic' alt='".$_SESSION['displayname']."' src='app/storage/images/profilepictures/".$_SESSION['profilepicture']."'>"; ?>
	<h3><?=$_SESSION['displayname']?></h3>
	<?php 
	if($_SESSION['usertype'] != "User"){
		echo "<a class='button' href='adminpage.php' title='Admin page'>Admin page</a>";
	}
	?>	
	<h4>Upload new profile picture.</h4>
	<form action="app/resources/php/uploadProfilePic.php" method="post" enctype="multipart/form-data">
			<input type="file" name="profilepic" accept="image/x-png,image/gif,image/jpeg">
			<br>
			<?php
			//displays an error
			if (isset($_SESSION['error'])) 
			{
				echo '<div class="error"><p>' . $_SESSION['error'] .'</p></div>';
			}

			//message for a success operation
			if (isset($_SESSION['success'])) 
			{
				echo '<div class="success"><p>' . $_SESSION['success'] .'</p></div>';
			}
			?>
			<input type="submit" name="submit" value="Upload new picture">
		</form>
		<form action="app/resources/php/removeProfilePic.php" method="post">
			<input type="submit" name="removepic" value="Remove picture">
		</form>
	</div>
	</div>
	
		<div id="myModal" class="modal">
			<span class="close">&times;</span>
			<img class="modal-content" id="img01">
			<div id="caption"></div>
		</div>
	
	<script src="app/resources/js/fullscreenprofilepic.js"></script>

    <!-- Footer -->
    <footer>
        <?php include 'app/resources/views/layout/footer.php'; ?>
    </footer>

</body>

</html>