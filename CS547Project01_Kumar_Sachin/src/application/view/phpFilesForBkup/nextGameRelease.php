<!DOCTYPE html>
<html lang="en">
<head>
<title>About</title>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

<link rel="stylesheet" href="assets/css/custom.css"/>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>


</head>
<body>
	<!--Navbar-->
	<?php require "navbar.php"?>

		<div class="container">
		  <h3>AGS next big game release is on </h3>
		  <h1> <?php echo "Oct 31th 18:00 "; ?></h1>
		  <h1> <?php
				echo $viewData->format('%R %a days left<br><br><br>');

				echo $viewData->y . ' years<br>';
				echo $viewData->m . ' months<br>';
				echo $viewData->d . ' days<br>';
				echo $viewData->h . ' hours<br>';
				echo $viewData->i . ' minutes<br>';
				echo $viewData->s . ' seconds<br>';
				?>
		</h1>
		</div>

		<!--Footer-->
		<?php require "footer.php"?>

</body>
</html>
