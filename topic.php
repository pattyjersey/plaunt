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
			<form action="home.php?id=<?php echo $user_id; ?>" method="post" class="form-horizontal">
				<h2>What's your question today? let's discuss!</h2>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" name="title" class="form-control" placeholder="Species" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="number" name="water" class="form-control" placeholder="How many times a day should it be watered" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" name="watered" class="form-control" placeholder="Last watered" onfocus="(this.type='date')" onblur="(this.type='text')" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
					<select name="soil" type="text" class="form-control" required>
  						<option selected>Soil type</option>
  						<option value="1">Damp</option>
  						<option value="2">Not Damp</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
					<select name="sun" type="text" class="form-control" required>
  						<option selected>Sunlight</option>
  						<option value="1">Direct Sunlight</option>
  						<option value="2">Indirect Sunlight</option>
					</select>
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
							<option value="">Select a topic</option>
							<?php getTopics(); ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="submit" name="sub" class="btn btn-success pull-right" value="Post">
					</div>
				</div>
			</form>
			<?php 
							global $connection;
							global $user_id;
						
							if ( isset( $_POST['sub'] ) ) {
						
								$title 		= addslashes( $_POST['title'] );
								$water		= addslashes( $_POST['water'] );
								$watered	= addslashes( $_POST['watered'] );
								$soil		= addslashes( $_POST['soil'] );
								$sun		= addslashes( $_POST['sun'] );
								$content 	= addslashes( $_POST['content'] );
								$topic 		= $_POST['topic'];
			
								$plant = $_FILES['plant']['name'];
			
								$image_tmp = $_FILES['plant']['tmp_name'];
			
								move_uploaded_file( $image_tmp, "user/user_images/$plant" );
						
								if ( $content == '' ) {
						
									echo "<h2>Please enter plant description.</h2>";
									exit();
						
								}else {
									
									$insert 	= "INSERT into posts(user_id,topic_id,post_title, post_water, post_watered, post_soil, post_sun, post_content, post_plant, post_date) values('$user_id','$topic','$title','$water', '$watered', '$soil', '$sun', '$content','$plant',NOW())";
						
						
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
				<h3>All post in '<?php echo $topic_name; ?>' category.</h3>
				<?php get_cats(); ?>
			</div>
		</div>


<?php 

	include( "footer.php" );

} ?>