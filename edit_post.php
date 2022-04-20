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
				
				Species:
				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" name="title" class="form-control" value="<?php echo $post_title; ?>">
					</div>
				</div>
				How many times a day should it be watered:
				<div class="form-group">
					<div class="col-sm-12">
						<input type="number" name="water" class="form-control" value="<?php echo $post_water; ?>">
					</div>
				</div>
				Last watered:
				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" name="watered" class="form-control" value="<?php echo $post_watered; ?>" onfocus="(this.type='date')" onblur="(this.type='text')">
					</div>
				</div>
				Soil type:
				<div class="form-group">
					<div class="col-sm-12">
					<select name="soil" type="text" class="form-control" value="<?php echo $post_soil; ?>">
  						<option disabled selected>Soil type</option>
  						<option value="Loam">Loam</option>
  						<option value="Clay soil">Clay soil</option>
  						<option value="Sandy soil">Sandy soil</option>
  						<option value="Silty soil">Silty soil</option>
  						<option value="Other">Other</option>
					</select>
					</div>
				</div>
				Sunlight:
				<div class="form-group">
					<div class="col-sm-12">
					<select name="sun" type="text" class="form-control" value="<?php echo $post_sun; ?>">
  						<option disabled selected>Sunlight</option>
  						<option value="1">Direct Sunlight</option>
  						<option value="2">Indirect Sunlight</option>
					</select>
					</div>
				</div>
				Description:
				<div class="form-group">
					<div class="col-sm-12">
						<textarea name="content" class="form-control" cols="30" rows="10"><?php echo $post_content; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="plant" class="col-sm-12"></label>
					<div class="col-sm-12">
						<input type="file" class="form-control" name="plant" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<select name="topic" class="form-control">
							<option disabled selected value="">Select a topic</option>
							<?php getTopics(); ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="submit" name="update" class="btn pull-right andruu" value=" Update Post">
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