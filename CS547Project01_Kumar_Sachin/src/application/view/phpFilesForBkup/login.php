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
    <?php require "navbar.php" ?>
    
    <div class="container">
    </div>
    <hr>

		<div class="container">

        <div>
          <form method="post" action="?c=login&a=authenticateUser" >

                <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                      <small id="emailHelp" class="form-text text-muted">Please use the same email which you used for registration</small>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>

                <div class="form-group">
                    <a href="?c=login&a=forgotPassword">Forgot password?</a>
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
                
                <br>
                <br>
                <br>
                <label for="message" style="color:red;"><?php  echo $viewData ?></label>
                
          </form>
        </div>

		</div>



		<!--Footer-->
		<?php require "footer.php" ?>

</body>
</html>
