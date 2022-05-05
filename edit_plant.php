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
					$plant_required = $row['plant_required'];
					$plant_temperature = $row['plant_temperature'];
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
						<select name="number" name="water" class="form-control" value="<?php echo $plant_water; ?>">
  								<option disabled selected>How many times a day should it be watered</option>
                        <option disabled selected>How many times a day should it be watered</option>
  								<option value="(1) Once">(1) Once</option>
  								<option value="(2) Twice">(2) Twice</option>
  								<option value="(3) Thric">(3) Thrice</option>
  								<option value="More than 5">More than 5</option>
   								<option value="Weekly">Weekly</option>
  								<option value="Others">Others</option>
  								<option value="Not sure">Not sure</option>
							</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" name="watered" class="form-control" value="<?php echo $plant_watered; ?>" onfocus="(this.type='date')" min="2022-05-01" max="2022-05-31" onblur="(this.type='text')">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
					<select name="soil" type="text" class="form-control" value="<?php echo $plant_soil; ?>">
  						<option disabled selected>Soil type</option>
  								<option value="Loam">Loam</option>
  								<option value="Clay soil">Clay soil</option>
  								<option value="Sandy soil">Sandy soil</option>
  								<option value="Silty soil">Silty soil</option>
  								<option value="Others">Others</option>
   								<option value="Not sure">Not sure</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
					<select name="sun" type="text" class="form-control" value="<?php echo $plant_sun; ?>">
  						<option disabled selected>Sunlight</option>
   								<option value="Direct Sunlight">Direct Sunlight</option>
  								<option value="Indirect Sunlight">Indirect Sunlight</option>
  								<option value="Others">Others</option>
   								<option value="Not sure">Not sure</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
					<select name="requiredtime" type="text" class="form-control" value="<?php echo $plant_required; ?>">
                    <option disabled selected>Time for corresponding sunlight</option>
  								<option value="All day">All day</option>
  								<option value="Morning">Morning</option>
  								<option value="Afternoon">Afternoon</option>
  								<option value="Night">Night</option>
  								<option value="Others">Others</option>
   								<option value="Not sure">Not sure</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
					<select name="temperature" type="text" class="form-control" value="<?php echo $plant_temperature; ?>">
                    <option disabled selected>Appropriate Temperature</option>
  								<option value="(15 - 24°) Indoor Plants">(15 - 24°) Indoor Plants</option>
  								<option value="(24 - 45°C) Indoor and Outdoor Plants">(24 - 45°C) Indoor and Outdoor Plants</option>
  								<option value="Others">Others</option>
   								<option value="Not sure">Not sure</option>
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
						<input type="submit" name="sub" class="btn pull-left andruu" value="Share Publicly"> 
					</div>
			</form>

			<?php 

				if ( isset( $_POST['update'] ) ) {

					$title = $_POST['title'];
					$water = $_POST['water'];
					$watered = $_POST['watered'];
					$soil = $_POST['soil'];
					$sun = $_POST['sun'];
					$temperature = $_POST['temperature'];
					$requiredtime = $_POST['requiredtime'];
					$content = $_POST['content'];
					$plant = $_FILES['plant']['name'];
					$plant = $plant_id.$plant;

					$image_tmp = $_FILES['plant']['tmp_name'];

					move_uploaded_file( $image_tmp, "user/user_images/$plant" );

					//$file_tmp = $_FILES['plant']['tmp_name'];
					//$file_name = $_FILES['plant']['name'];
					//$file_destination = 'user/user_images/' . $file_name;
					//move_uploaded_file($file_tmp, $file_destination);


					$update_plant = "UPDATE plants set plant_title='$title', plant_water='$water', plant_watered='$watered', plant_soil='$soil', plant_sun='$sun', plant_temperature='$temperature', plant_required='$requiredtime', plant_content='$content', plant_plant='$plant' where plant_id='$get_id'";
					$run_update = mysqli_query( $connection, $update_plant );

					if ( $run_update ) {

						echo "<script>alert('Plant has been updated!')</script>";
						echo "<script>history.go(-2)</script>";

					}

				}

			?>
<?php 
				global $connection;
				global $user_id;
			
				if ( isset( $_POST['sub'] ) ) {
			
								$title 		= addslashes( $_POST['title'] );
								$water		= addslashes( $_POST['water'] );
								$sun		= addslashes( $_POST['sun'] );
								$soil		= addslashes( $_POST['soil'] );
								$watered	= addslashes( $_POST['watered'] );
								$requiredtime		= addslashes( $_POST['requiredtime'] );
								$temperature		= addslashes( $_POST['temperature'] );
								$content 	= addslashes( $_POST['content'] );
								$topic 		= $_POST['topic'];

					$plant = $_FILES['plant']['name'];

					$image_tmp = $_FILES['plant']['tmp_name'];

					move_uploaded_file( $image_tmp, "user/user_images/$plant" );
			
					if ( $content == '' ) {
			
						echo "<h2>Please enter plant description.</h2>";
						exit();
			
					}else {
						
						$insert 	= "INSERT into posts(user_id, topic_id, post_title, post_water, post_sun, post_soil, post_watered, post_required, post_temperature, post_content, post_plant, post_date) values('$user_id','6','$title','$water', '$sun', '$soil', '$watered', '$requiredtime', '$temperature', '$content','$plant',NOW())";
						$run 		= mysqli_query( $connection, $insert );
						
					    $update_plant = "UPDATE plants set plant_title='$title', plant_water='$water', plant_watered='$watered', plant_soil='$soil', plant_sun='$sun', plant_temperature='$temperature', plant_required='$requiredtime', plant_content='$content', plant_plant='$plant' where plant_id='$get_id'";
				    	$run_updates = mysqli_query( $connection, $update_plant );
			
						if ( $run && $run_updates ) {
			
							echo "<h3>Posted for public viewing!</h3>";
			
							$update = "UPDATE users set posts='Yes' where user_id='$user_id'";
							$run_update = mysqli_query( $connection, $update );
			
						}
			
					}
			
				}
			
		?>
		
		</div>


<?php 

	include( "footer.php" );

} ?>