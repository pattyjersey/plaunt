<?php 

	$get_id = $_GET['post_id'];

	$get_comments = "SELECT * from comments where post_id='$get_id'";
	$run_query = mysqli_query( $connection, $get_comments );

	while ( $row = mysqli_fetch_array( $run_query ) ) {
	    
		$post_id = $row_posts['post_id'];

		$comment_user_id = $row['user_id'];
		$parent_user_id = $row['parent_user_id'];
		$comment = $row['comment'];
		$cm_status = $row['cm_status'];
		$comment_date = $row['date'];

		// getting the user who has commented
		$user = "SELECT * from users where user_id='$comment_user_id'";
		$run_user = mysqli_query( $connection, $user );
		$row_user = mysqli_fetch_array( $run_user );
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];

		// getting the person who posted
		$get_poster = "SELECT * from users where user_id='$parent_user_id'";
		$run_poster = mysqli_query( $connection, $get_poster );
		$row_poster = mysqli_fetch_array( $run_poster );
		$user_name_poster = $row_poster['user_id'];
		
		//getting the person who is logged in
		$user_email = $_SESSION['user_email'];
		$current_user = "SELECT * from users where user_email='$user_email'";
		$run_current_user = mysqli_query( $connection, $current_user );
		$current_user_row = mysqli_fetch_array( $run_current_user );
		$current_user_id = $current_user_row['user_id'];

		if ($user_name_poster == $current_user_id) {
        $update_unread = "UPDATE comments set cm_status='Read' where post_id='$get_id'";
	    $run_unread = mysqli_query( $connection, $update_unread );
	    
		// now displaying the comments
		$output   = "<div class='row single-comment'>";
		$output  .= "<div class='col-sm-2'>";
		$output  .= "<div class='thumbnail'>";
		$output  .= "<img src='user/user_images/$user_image' class='img-responsive'>";
		$output  .= "</div>";
		$output  .= "</div>";
		$output  .= "<div class='col-sm-10'>";
		$output  .= "<div class='panel panel-default'>";
		$output  .= "<div class='panel-heading'>";
		$output  .= "<strong><a href='user_profile.php?user_id=$comment_user_id'>$user_name </a></strong>";
		$output  .= "<span>commented $comment_date</span>";
		$output  .= "</div>";
		$output  .= "<div class='panel-body'>";
		$output  .= "$comment";
		$output  .= "</div>";
		$output  .= "</div>";
		$output  .= "</div>";
		$output  .= "</div>";

		echo $output;		
	}else {
	    $output   = "<div class='row single-comment'>";
		$output  .= "<div class='col-sm-2'>";
		$output  .= "<div class='thumbnail'>";
		$output  .= "<img src='user/user_images/$user_image' class='img-responsive'>";
		$output  .= "</div>";
		$output  .= "</div>";
		$output  .= "<div class='col-sm-10'>";
		$output  .= "<div class='panel panel-default'>";
		$output  .= "<div class='panel-heading'>";
		$output  .= "<strong><a href='user_profile.php?user_id=$comment_user_id'>$user_name </a></strong>";
		$output  .= "<span>commented $comment_date</span>";
		$output  .= "</div>";
		$output  .= "<div class='panel-body'>";
		$output  .= "$comment";
		$output  .= "</div>";
		$output  .= "</div>";
		$output  .= "</div>";
		$output  .= "</div>";

		echo $output;	
	}
}

?>