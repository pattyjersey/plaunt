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
	<?php 

		$user 		= $_SESSION['user_email'];
		$get_user   = "SELECT * from users where user_email='$user'";
		$run_user   = mysqli_query( $connection, $get_user );
		$row 		= mysqli_fetch_array( $run_user );

		$user_id 	    = $row['user_id'];
		$user_name 		= $row['user_name'];
		$user_pass		= $row['user_pass'];
		$user_email		= $row['user_email'];
		$user_gender	= $row['user_gender'];
		$user_birthday	= $row['user_b_day'];
		$user_image 	= $row['user_image'];
		$register_date  = $row['register_date'];
		$last_login 	= $row['last_login'];

		// getting the number of total members
		$sel_mem = "SELECT * from users";
		$run_mem = mysqli_query( $connection, $sel_mem );

		$count_mem = mysqli_num_rows( $run_mem );

	?>

		<div class="col-sm-9">
	        <h2>All Registered Members</h2>
	        <h5>There are currently <b><?php echo $count_mem; ?></b> members of our community.</h5><br>
		    	<div class="collapse navbar-collapse navbar-ex1-collapse dru">
					<form method="get" action="userresults.php" id="form1" class="navbar-form-control" role="search">
						  <div class="form-group">
						      <input type="text" name="user_query" class="form-control andreww" placeholder="Find a Member">
						  </div>
					 <input type="submit" name="search" class="btn btn-default pull-right druu" value="Search">
				    </form> <br><br>
                </div>
                
			<div class="row">
				<?php 

					$get_members = "SELECT * from users";
					$run_members = mysqli_query( $connection, $get_members );

					while ( $row = mysqli_fetch_array( $run_members ) ) {

						$user_id = $row['user_id'];
						$user_name = $row['user_name'];
						$user_image = $row['user_image'];

						$output  = "<div class='col-xs-6 col-sm-4 user-thumb'>";
						$output .= "<a href='user_profile.php?u_id=$user_id'>";
						$output .= "<img class='img-responsive' src='user/user_images/$user_image' title='$user_name'>";
						$output .= "</a>";
						$output .= "<br>";
						$output  .= "<ol class='breadcrumb align'>";
		                $output  .= "<li><a class='druu' href='user_profile.php?u_id=$user_id'>$user_name</a></li>";
		                $output  .= "</ol>";
						$output .= "</div>";

						echo $output;

					}
				?>
			</div>
		</div>


<?php 

	include( "footer.php" );

} ?>