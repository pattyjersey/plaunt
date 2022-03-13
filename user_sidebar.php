<div class="col-sm-3 user-prof">
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

		$user_posts = "SELECT  * from posts where user_id='$user_id'";
		$run_posts = mysqli_query( $connection, $user_posts );
		$posts = mysqli_num_rows( $run_posts );

		// getting the number of unread messages
		$sel_msg = "SELECT * from messages where receiver='$user_id' AND status='unread' order by 1 DESC";
		$run_msg = mysqli_query( $connection, $sel_msg );

		$count_msg = mysqli_num_rows( $run_msg );

	?>

	<img src="user/user_images/<?php echo $user_image; ?>" class="img-responsive prof" alt="Profile" style="width:300px !important;height:300px !important; object-fit:cover;">
	<ul class="list-group">
		<li class="list-group-item"><?php echo "<b>".$user_name."</b>"; ?></li>
		<li class="list-group-item"><a class="druu" href="my_messages.php?inbox&u_id=<?php echo $user_id; ?>">Messages (<?php echo $count_msg; ?>)</a></li>
		<li class="list-group-item"><a class="druu" href="my_posts.php?u_id=<?php echo $user_id; ?>">Posts (<?php echo $posts; ?>)</a></li>
		<li class="list-group-item"><a class="druu" href="edit_profile.php?u_id=<?php echo $user_id; ?>">Edit My Account</a></li>
		<li class="list-group-item"><a class="druu" href="logout.php">Logout</a></li>
	</ul>

</div>