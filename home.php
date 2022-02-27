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
				<h2>Anything sprouting today? Let's discuss!</h2>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="text" name="title" class="form-control" placeholder="Species" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-sm-13">
							<input type="number" name="water" class="form-control" placeholder="How often should it be watered" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-13">
							<input type="text" name="watered" class="form-control" placeholder="Last watered" required>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div class="col-sm-13">
							<select type="text" name="soil" class="form-control" required>
  								<option selected>Soil type</option>
  								<option value="Damp">Damp</option>
  								<option value="Not Damp">Not Damp</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-13">
							<select type="text" name="sun" class="form-control" required>
  								<option selected>Sunlight</option>
  								<option value="Direct Sunlight">direct Sunlight</option>
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
						<select name="topic" class="form-control">
							<option value="">Select a topic</option>
							<?php getTopics(); ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="submit" name="sub" class="btn btn-success drew pull-right" value="Post">
					</div>
				</div>			
			</form>



			<?php insertPost(); ?>
			<div id="posts">
				<h3>Most recent discussions.</h3>
				<?php get_posts(); ?>
			</div>
	</div>

<?php 

	include( "footer.php" );

} ?>