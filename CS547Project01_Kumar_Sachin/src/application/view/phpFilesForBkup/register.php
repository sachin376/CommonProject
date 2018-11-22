<!DOCTYPE html>
<html lang="en">
<head>
<title>About</title>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/custom.css"/>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script> -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-datepicker.min.js"></script>

</head>
<body>
	<!--Navbar-->
	<?php require "navbar.php" ?>

		<div class="container">
      <div>
          <form method="post" action="?c=register" >

                <div class="form-group">
                      <label for="Screenname">Screen Name</label>
                      <input type="text" class="form-control" id="screen_name" name="screen_name" placeholder="Enter Screen Name">
                </div>

                <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>

                <div class="form-group">
                      <label for="Firstname">First Name</label>
                      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
                </div>

                <div class="form-group">
                      <label for="Lastname">Last Name</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>

                <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirm Password">
                </div>

                <div class="form-group">
                      <label for="dob">Date of Birth</label>
                      <div class="input-group date">
                          <input type="text" class="form-control" id="dob" name="dob" placeholder="Date of Birth">
                          <div class="input-group-addon">
                              <span class="glyphicon glyphicon-th"></span>
                          </div>
                      </div>

                       <script type="text/javascript">
                             $(document).ready(function() {
                                  $('#dob').datepicker();
                              });

                       </script>
                </div>

                <div class="form-group">
                    <label for="favourategame">Favourate Game</label>
                    <input type="text" class="form-control" id="favorite_game" name="favorite_game" placeholder="favourategame">
                </div>

                <div class="form-group">
                    <label for="phoneno">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                </div>

                <div class="form-group">
                    <label for="phonetype">Phone Type</label>
                    <!-- <input type="text" class="form-control" id="phonetype" name="phonetype" placeholder="Phone Type"> -->
                    <select name="phonetype"class="form-control">
                        <option value="Android">Android</option>
                        <option value="IOS" >IOS</option>
                    </select>
                </div>


                <button type="submit" name="a" value="insert" class="btn btn-primary">Register / Sign-Up</button>

                <button type="submit" name="a" value="update" class="btn btn-success">Update Infomation</button>
                <small id="emailHelp" class="form-text text-muted">Please use the same email which you used for registration</small>
          </form>
          
      </div>
		</div>
		<!--Footer-->
		<?php require "footer.php" ?>

</body>
</html>
