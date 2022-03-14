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
			<div id="posts">
				<h2>My Posts</h2>
				<?php user_posts(); ?>
			</div>
		</div>


<?php 

	include( "footer.php" );

} ?>