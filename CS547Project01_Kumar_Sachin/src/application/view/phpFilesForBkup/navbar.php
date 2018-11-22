	<nav class="navbar navbar-default">
		  <div class="container">
			<div class="navbar-header">

			<a href="?c=home&a=load">
					<img alt="Logo" src="assets/images/name.png" width="250" height="60">
			</a>

			</div>
				<ul class="nav navbar-nav">
				  <li><a href="?c=home&a=load">Home</a></li>
				  <li><a href="?c=about&a=load">About</a></li>
				  <li><a href="?c=game&a=load">Game</a></li>
				  <li><a href="?c=nextGameRelease&a=load">Next Game Release Information</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">

				<?php
				if ($isAuthenticated == "true"){
				?>

					<li><a href="?c=login&a=logout">Log Out</a></li>
				<?php
				}else{
				?>
					<li><a href="?c=login&a=load">Login</a></li>
				<?php
				}
				?>
					<li><a href="?c=register&a=load">Register</a></li>
		 		</ul>

			<div>

			<script type="text/javascript">
				$("a").click(function(){
						$("a").css("background-color","");
						$(this).css("background-color","gray");
				});

			</script>
		</nav>
