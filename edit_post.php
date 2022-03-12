<?php 

	session_start(); 
	include ( "includes/connection.php" );
	include ( "functions/functions.php" );

	if ( !isset( $_SESSION['user_email'] ) ) {
		header( "location: index.php" );
	}else {

		include ( "header.php" );
		include ( "user_sidebar.php" );
?>

					
		<div class="col-sm-9">
			<?php 

				if ( isset( $_GET['post_id'] ) ) {

					$get_id = $_GET['post_id'];

					$get_post = "SELECT *  from posts where post_id='$get_id'";
					$run_post = mysqli_query( $connection, $get_post );
					$row = mysqli_fetch_array( $run_post );

					$post_title = $row['post_title'];
					$post_water = $row['post_water'];
					$post_watered = $row['post_watered'];
					$post_soil = $row['post_soil'];
					$post_sun = $row['post_sun'];
					$post_content = $row['post_content'];
					$post_plant = $row['post_plant'];
				}

			?>
			<form method="post" class="form-horizontal" enctype="multipart/form-data"> 
				<h2>Edit your post</h2>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" name="title" class="form-control" value="<?php echo $post_title; ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="date" name="water" class="form-control" value="<?php echo $post_water; ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" name="watered" class="form-control" value="<?php echo $post_watered; ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
					<select name="soil" type="text" class="form-control" value="<?php echo $post_soil; ?>">
  						<option selected>Soil type</option>
  						<option value="Damp">Damp</option>
  						<option value="Not Damp">Not damp</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
					<select name="sun" type="text" class="form-control" value="<?php echo $post_sun; ?>">
  						<option selected>Sunlight</option>
  						<option value="Direct Sunlight">Direct Sunlight</option>
  						<option value="Indirect Sunlight">Indirect Sunlight</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<textarea name="content" class="form-control" cols="30" rows="10"><?php echo $post_content; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
					<label for="plant" class="col-sm-2"></label>
						<input type="file" class="form-control" name="plant" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<select name="topic" class="form-control">
							<option value="">Select a topic</option>
							<?php getTopics(); ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="submit" name="update" class="btn btn-success pull-right" value="Update Post">
					</div>
				</div>
			</form>

			<?php 

				if ( isset( $_POST['update'] ) ) {

					$title = $_POST['title'];
					$water = $_POST['water'];
					$watered = $_POST['watered'];
					$soil = $_POST['soil'];
					$sun = $_POST['sun'];
					$content = $_POST['content'];
					$plant = $_FILES['plant']['name'];
					$plant = $post_id.$plant;
					$topic_id = $_POST['topic'];

					$image_tmp = $_FILES['plant']['tmp_name'];

					move_uploaded_file( $image_tmp, "user/user_images/$plant" );

					//$file_tmp = $_FILES['plant']['tmp_name'];
					//$file_name = $_FILES['plant']['name'];
					//$file_destination = 'user/user_images/' . $file_name;
					//move_uploaded_file($file_tmp, $file_destination);


					$update_post = "UPDATE posts set post_title='$title', post_water='$water', post_watered='$watered', post_soil='$soil', post_sun='$sun', post_content='$content', post_plant='$plant', topic_id='$topic_id' where post_id='$get_id'";
					$run_update = mysqli_query( $connection, $update_post );

					if ( $run_update ) {

						echo "<script>alert('Post has been updated!')</script>";
						echo "<script>window.open('home.php','_self')</script>";

					}

				}

			?>
		</div>


<?php 

	include( "footer.php" );

} ?>