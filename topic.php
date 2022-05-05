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
		<form action="home.php?id=<?php echo $user_id; ?>" method="post" class="form-horizontal">
				<h3>Anything sprouting today? Let's discuss!</h3>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" name="title" class="form-control" placeholder="Species" required>
					</div>
				</div>
                <div class="col-md-6">
					<div class="form-group">
						<div class="col-sm-13">
							<select type="text" name="water" class="form-control" placeholder="How many times a day should it be watered" required>
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
						<div class="col-sm-13">
							<select type="text" name="sun" class="form-control" required>
  								<option disabled selected>Sunlight</option>
  								<option value="Direct Sunlight">Direct Sunlight</option>
  								<option value="Indirect Sunlight">Indirect Sunlight</option>
  								<option value="Others">Others</option>
   								<option value="Not sure">Not sure</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-13">
							<select type="text" name="soil" class="form-control" required>
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
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-sm-13">
							<input type="text" name="watered" class="form-control" placeholder="Last watered" onfocus="(this.type='date')"  min="2022-04-01" max="2022-05-31" onblur="(this.type='text')" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-13">
							<select type="text" name="requiredtime" class="form-control" required>
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
					<div class="col-sm-13">
						<select type="text" name="temperature" class="form-control" required>
                    <option disabled selected>Appropriate Temperature</option>
  								<option value="(15 - 24°) Indoor Plants">(15 - 24°) Indoor Plants</option>
  								<option value="(24 - 45°C) Indoor and Outdoor Plants">(24 - 45°C) Indoor and Outdoor Plants</option>
  								<option value="Others">Others</option>
   								<option value="Not sure">Not sure</option>
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
						<select name="topic" class="form-control">
							<option disabled selected value="">Select a topic</option>
							<?php getTopics(); ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="submit" name="sub" class="btn pull-right andruu" value="Post">
					</div>
				</div>	
			</form>
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
									
					        	$insert 	= "INSERT into posts(user_id, topic_id, post_title, post_water, post_sun, post_soil, post_watered, post_required, post_temperature, post_content, post_plant, post_date) values('$user_id','$topic','$title','$water', '$sun', '$soil', '$watered', '$requiredtime', '$temperature', '$content','$plant',NOW())";
						
									$run 		= mysqli_query( $connection, $insert );
						
									if ( $run ) {
						
										echo "<h3>Posted to timeline, looks great.</h3>";
						
										$update = "UPDATE users set posts='Yes' where user_id='$user_id'";
										$run_update = mysqli_query( $connection, $update );
						
									}
						
								}
						
							}
			?>
			<div id="posts">
				<?php 
					if (isset($_POST['upload'])) {
  
					$plant  = $_FILES['plant']['name'];
					$plant = $user_id.$plant;

					
					$image_tmp = $_FILES['plant']['tmp_name'];

					move_uploaded_file( $image_tmp, "user/user_images/$plant" );

					$insert = "INSERT into posts(plant) values('$plant')";
					$run = mysqli_query( $connection, $insert );
					}

					if ( isset( $_GET['topic'] ) ) {

						$topic_id = $_GET['topic'];

						$query = "SELECT * from topics where topic_id='$topic_id'";
						$run_query = mysqli_query( $connection, $query );
						$row = mysqli_fetch_array( $run_query );

						$topic_name = $row['topic_title'];

					}

				?>
				<h3>All posts in '<?php echo $topic_name; ?>'</h3>
				<?php get_cats(); ?>
			</div>
		</div>


<?php 

	include( "footer.php" );

} ?>