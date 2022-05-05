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

		$user_comments = "SELECT  * from comments where parent_user_id='$user_id' AND cm_status='Unread' order by 1 DESC";
		$run_comments = mysqli_query( $connection, $user_comments );
		$count_comments = mysqli_num_rows( $run_comments );

		$user_plants = "SELECT  * from plants where user_id='$user_id'";
		$run_plants = mysqli_query( $connection, $user_plants );
		$plants = mysqli_num_rows( $run_plants );

		// getting the number of unread messages
		$sel_msg = "SELECT * from messages where receiver='$user_id' AND status='unread' order by 1 DESC";
		$run_msg = mysqli_query( $connection, $sel_msg );

		$count_msg = mysqli_num_rows( $run_msg );

	?>

	<img src="user/user_images/<?php echo $user_image; ?>" class="img-responsive prof" alt="Profile" style="width:300px !important;height:300px !important; object-fit:cover;">
	<ul class="list-group">
		<li class="list-group-item"><?php echo "<b>".$user_name."</b>"; ?></li>
		<li class="list-group-item"><a class="druu" href="my_plants.php?u_id=<?php echo $user_id; ?>">My Plants <b> (<?php echo $plants; ?>)</b></a></li>
		<li class="list-group-item"><a class="druu" href="my_messages.php?inbox&u_id=<?php echo $user_id; ?>">Messages <b> (<?php echo $count_msg; ?> Unread)</b> </a></li>
		<li class="list-group-item"><a class="druu" href="my_posts.php?u_id=<?php echo $user_id; ?>"> My Posts <b> (<?php echo $count_comments; ?> New Comment/s) </b></a></li>
		<li class="list-group-item"><a class="druu" href="edit_profile.php?u_id=<?php echo $user_id; ?>">Edit My Account</a></li>
		<li class="list-group-item"><a class="druu" href="logout.php">Logout</a></li>
	</ul>

<a class="weatherwidget-io" href="https://forecast7.com/en/15d08120d62/pampanga/" data-label_1="PAMPANGA" data-label_2="WEATHER" data-theme="pure" >PAMPANGA WEATHER</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>

</div>

