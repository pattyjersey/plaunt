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

				if ( isset( $_GET['plant_id'] ) ) {

					$get_id = $_GET['plant_id'];

					$get_plant = "SELECT *  from plants where plant_id='$get_id'";
					$run_plant = mysqli_query( $connection, $get_plant );
					$row = mysqli_fetch_array( $run_plant );

					$plant_title = $row['plant_title'];
					$plant_water = $row['plant_water'];
					$plant_watered = $row['plant_watered'];
					$plant_soil = $row['plant_soil'];
					$plant_sun = $row['plant_sun'];
					$plant_content = $row['plant_content'];
					$plant_plant = $row['plant_plant'];
				}

			?>
			<form method="post" class="form-horizontal" enctype="multipart/form-data"> 
				<h2>Edit your plant</h2>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" name="title" class="form-control" value="<?php echo $plant_title; ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="number" name="water" class="form-control" value="<?php echo $plant_water; ?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" name="watered" class="form-control" value="<?php echo $plant_watered; ?>" onfocus="(this.type='date')" onblur="(this.type='text')">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
					<select name="soil" type="text" class="form-control" value="<?php echo $plant_soil; ?>">
  						<option disabled selected>Soil type</option>
  						<option value="1">Damp</option>
  						<option value="2">Not damp</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
					<select name="sun" type="text" class="form-control" value="<?php echo $plant_sun; ?>">
  						<option disabled selected>Sunlight</option>
  						<option value="1">Direct Sunlight</option>
  						<option value="2">Indirect Sunlight</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<textarea name="content" class="form-control" cols="30" rows="10"><?php echo $plant_content; ?></textarea>
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
						<input type="submit" name="update" class="btn pull-right andruu" value="Update Plant">
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
					$plant = $plant_id.$plant;

					$image_tmp = $_FILES['plant']['tmp_name'];

					move_uploaded_file( $image_tmp, "user/user_images/$plant" );

					//$file_tmp = $_FILES['plant']['tmp_name'];
					//$file_name = $_FILES['plant']['name'];
					//$file_destination = 'user/user_images/' . $file_name;
					//move_uploaded_file($file_tmp, $file_destination);


					$update_plant = "UPDATE plants set plant_title='$title', plant_water='$water', plant_watered='$watered', plant_soil='$soil', plant_sun='$sun', plant_content='$content', plant_plant='$plant' where plant_id='$get_id'";
					$run_update = mysqli_query( $connection, $update_plant );

					if ( $run_update ) {

						echo "<script>alert('Plant has been updated!')</script>";
						echo "<script>history.go(-2)</script>";

					}

				}

			?>
		</div>


<?php 

	include( "footer.php" );

} ?>