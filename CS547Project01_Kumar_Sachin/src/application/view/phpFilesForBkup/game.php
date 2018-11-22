<!DOCTYPE html>
<html lang="en">
<head>
<title>Game</title>


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
		<?php 
		// print_r($viewData);
		// foreach ($viewData as $row)
        // {
		// 	print_r($row->getTitle());
		// }
		 ?>

<div>
					<table class="table table-hover">
						  <thead>
						    <tr>
						      <th scope="col">Game Title</th>
						      <th scope="col">Description</th>
						      <th scope="col">Genre</th>
						      <th scope="col">Artist</th>
							  <th scope="col">Cost</th>
							  <!-- <th scope="col">Release Date</th> -->
							  <th scope="col">Rating</th>
							  <th scope="col">Update</th>
							  <th scope="col">Delete</th>

						    </tr>
						  </thead>
						  <tbody>
						  <?php foreach ($viewData as $row)  { ?>
						    <tr>
							  <form method="post" action="?c=game&a=update">
								<td> <input type="text" name="title" value=<?php print_r($row->getTitle()); ?>>   </td>
								<td> <input type="text" name="description" value=<?php print_r($row->getDescription()); ?>>   </td>
								<td> <input type="text" name="genre" value=<?php print_r($row->getGenre()); ?>>   </td>
								<td> <input type="text" name="artist" value=<?php print_r($row->getArtist()); ?>>   </td>
								<td> <input type="text" name="cost" value=<?php print_r($row->getCost()); ?>>   </td>
								<!-- <td> <?php print_r($row->getReleaseDate()); ?>  </td> -->
								<td> <input type="text" name="rating" value=<?php print_r($row->getRating()); ?>>   </td>
								<!-- <td><button type="button" class="btn btn-primary">Update</button></td> -->
								<input type="hidden" name="release_date" value="<?php echo ($row->getReleaseDate()) ?>" />
								<input type="hidden" name="created_date" value="<?php echo ($row->getCreatedDate()) ?>" />

								<td><input type="hidden" name="gameid" value="<?php echo ($row->getId()) ?>" />
									<input type="submit" class="btn btn-primary" value="Update" onclick='alert("About to update this game");'></td>
							  </form>

							    <td>
								<!-- <td><button type="button" class="btn btn-danger" href="?c=game&a=delete" onclick="location.href'?c=game&a=delete'">Delete</button></td></th> -->
									<form method="post" action="?c=game&a=delete">
										<input type="hidden" name="gameid" value="<?php echo ($row->getId()) ?>" />
										<input type="submit" class="btn btn-danger" value="Delete" onclick='alert("About to delete this game");'>
									</form>
								</td>
								


							</tr>

							<?php } ?>
						  </tbody>
					</table>

					<ul class="pagination justify-content-center">
						<li class="page-item disabled">
							<a class="page-link" href="#" tabindex="-1">Previous</a>
									</li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									<li class="page-item"><a class="page-link" href="#">3</a></li>
									<li class="page-item">
							<a class="page-link" href="#">Next</a>
						</li>
					</ul>

		  </div>


			<hr/>
			<div>



			<form method="post" action="?c=game&a=insert" >

						<div class="form-group">
									<label for="gametitle">Game Title</label>
									<input type="text" class="form-control" id="title" name="title" placeholder="Game title">
						</div>

						<div class="form-group">
								<label for="description">Description</label>
								<input type="text" class="form-control" id="description" name="description" placeholder="Description">
						</div>

						<div class="form-group">
								<label for="genere">Genre</label>
								<input type="text" class="form-control" id="genre" name="genre" placeholder="Genre">
						</div>

						<div class="form-group">
								<label for="genere">Artist</label>
								<input type="text" class="form-control" id="artist" name="artist" placeholder="Artist">
						</div>

						<div class="form-group">
								<label for="genere">Cost</label>
								<input type="text" class="form-control" id="cost" name="cost" placeholder="Cost">
						</div>

						<div class="form-group">
									<label for="release_date">Release Date</label>
									<div class="input-group date">
											<input type="text" class="form-control" id="release_date" name="release_date" placeholder="Release Date">
											<div class="input-group-addon">
													<span class="glyphicon glyphicon-th"></span>
											</div>
									</div>

									 <script type="text/javascript">
												 $(document).ready(function() {
															$('#release_date').datepicker();
													});
									 </script>
						</div>

						<div class="form-group">
								<label for="Rating">Rating</label>
								<input type="text" class="form-control" id="rating" name="rating" placeholder="Rating">
						</div>

						<button type="submit" class="btn btn-primary">Submit</button>
			</form>
			</div>
			<hr/>
			

		</div>

		<!--Footer-->
		<?php require "footer.php" ?>

</body>
</html>
