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
		<div class="col-sm-9 homedruu">
			<form action="my_plants.php?u_id=<?php echo $user_id; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
				<h2>Add Your Plants</h2>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" name="title" class="form-control" placeholder="Species" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-sm-13">
							<input type="number" name="water" class="form-control" placeholder="How many times a day should it be watered" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-13">
							<input type="text" name="watered" class="form-control" placeholder="Last watered" onfocus="(this.type='date')" onblur="(this.type='text')" required>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-sm-13">
							<select type="text" name="soil" class="form-control" required>
  								<option disabled selected>Soil type</option>
  								<option value="Damp">Damp</option>
  								<option value="Not Damp">Not Damp</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-13">
							<select type="text" name="sun" class="form-control" required>
  								<option disabled selected>Sunlight</option>
  								<option value="Direct Sunlight">Direct Sunlight</option>
  								<option value="Indirect Sunlight">Indirect Sunlight</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<textarea name="content" class="form-control" cols="30" rows="10" placeholder="Write description..." required></textarea>
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
						<input type="submit" name="subplant" class="btn pull-right andruu" value="Post">
					</div>
				</div>	
			</form>

			<?php 
				global $connection;
				global $user_id;
			
				if ( isset( $_POST['subplant'] ) ) {
			
					$title 		= addslashes( $_POST['title'] );
					$water		= addslashes( $_POST['water'] );
					$watered	= addslashes( $_POST['watered'] );
					$soil		= addslashes( $_POST['soil'] );
					$sun		= addslashes( $_POST['sun'] );
					$content 	= addslashes( $_POST['content'] );

					$plant = $_FILES['plant']['name'];

					$image_tmp = $_FILES['plant']['tmp_name'];

					move_uploaded_file( $image_tmp, "user/user_images/$plant" );
			
					if ( $content == '' ) {
			
						echo "<h2>Please enter plant description.</h2>";
						exit();
			
					}else {
						
						$insert 	= "INSERT into plants(user_id,plant_title, plant_water, plant_watered, plant_soil, plant_sun, plant_content, plant_plant, plant_date) values('$user_id','$title','$water', '$watered', '$soil', '$sun', '$content','$plant',NOW())";
			
			
						$run 		= mysqli_query( $connection, $insert );
			
						if ( $run ) {
			
							$update = "UPDATE users set posts='Yes' where user_id='$user_id'";
							$run_update = mysqli_query( $connection, $update );
			
						}
			
					}
			
				}
			
		?>
            <br>
			<div id="plants">
				<h3>My Plants</h3>
				<?php user_plants(); ?>
			</div>
	</div>


<?php 

	include( "footer.php" );

} ?>