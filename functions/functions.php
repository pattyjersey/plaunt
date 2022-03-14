<?php

// function for getting topics
function getTopics() {

	global $connection;

	$get_topics = "SELECT * from topics";
	$run_topics = mysqli_query( $connection, $get_topics );

	while ( $row = mysqli_fetch_array( $run_topics ) ) {

		$topic_id = $row['topic_id'];
		$topic_title = $row['topic_title'];

		echo "<option value='$topic_id'>$topic_title</option>";

	}

}

/* Insert user's post to database
function insertPost() {

	global $connection;
	global $user_id;

	if ( isset( $_POST['sub'] ) ) {

		$title 		= addslashes( $_POST['title'] );
		$water		= addslashes( $_POST['water'] );
		$watered	= addslashes( $_POST['watered'] );
		$soil		= addslashes( $_POST['soil'] );
		$sun		= addslashes( $_POST['sun'] );
		$content 	= addslashes( $_POST['content'] );
		$plant		= addslashes( $_POST['plant'] );
		$topic 		= $_POST['topic'];


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

}
*/

// function for displaying posts
function get_posts() {

	global $connection;

	$per_page = 5;

	if ( isset( $_GET['page'] ) ) {
		$page = $_GET['page'];
	}else {
		$page = 1;
	}

	$start_from = ( $page - 1 ) * $per_page;
	$get_posts  = "SELECT * from posts ORDER by 1 DESC LIMIT $start_from,$per_page";
	$run_posts  = mysqli_query( $connection, $get_posts );

	while ( $row_posts = mysqli_fetch_array( $run_posts ) ) {
		
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$post_title = $row_posts['post_title'];
		$water = $row_posts['post_water'];
		$watered = $row_posts['post_watered'];
		$soil = $row_posts['post_soil'];
		$sun = $row_posts['post_sun'];
		$content = $row_posts['post_content'];
		$plant = $row_posts['post_plant'];
		$post_date = $row_posts['post_date'];
		$postdate = date('F j, Y h:ia', strtotime($post_date));

		// getting the user who has posted the thread
		$user = "SELECT * from users where user_id='$user_id' AND posts='yes'";

		$run_user = mysqli_query( $connection, $user );
		$row_user = mysqli_fetch_array( $run_user );
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];

		// now displaying all at once
		$output   = "<div class='panel panel-default'>";
		$output  .= "<div class='panel-body'>";
		$output  .= "<div class='col-sm-2'>";
		$output  .= "<img src='user/user_images/$user_image' class='img-responsive' style='width:100px;height:100px;object-fit:cover;'>";
		$output  .= "</div>";
		$output  .= "<div class='col-sm-10'>";
		$output  .= "<ol class='breadcrumb'>";
		$output  .= "<li><a class='druu' href='user_profile.php?u_id=$user_id'>$user_name</a></li>";
		$output  .= "<li>$postdate</li>";
		$output  .= "</ol>";
		$output  .= "<h3>Species: $post_title</h3>";
		$output  .= "<p><b>Watered every:</b> $water times a day</p>";
		$output  .= "<p><b>Last watered:</b> $watered</p>";
		$output  .= "<p><b>Soil should be:</b> $soil</p>";
		$output  .= "<p><b>Sunlight:</b> $sun</p>";
		$output  .= "<p><b>Suggestion:</b> $content</p>";
		$output  .= "<img src='user/user_images/$plant' class='img-responsive maxwidth'> <br/>";
		$output  .= "<a href='single.php?post_id=$post_id' class='btn andruu'>Open Post</a>";
		$output  .= "</div>";
		$output  .= "</div>";
		$output  .= "</div>";

		echo $output;

	}

	include( "pagination.php" );

}

// function for displaying single post
function single_post() {

	global $connection;

	if ( isset( $_GET['post_id'] ) ) {

		$get_id = $_GET['post_id'];

		$get_posts  = "SELECT * from posts where post_id='$get_id'";
		$run_posts  = mysqli_query( $connection, $get_posts );

		$row_posts = mysqli_fetch_array( $run_posts );
			
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$post_title = $row_posts['post_title'];
		$water = $row_posts['post_water'];
		$watered = $row_posts['post_watered'];
		$soil = $row_posts['post_soil'];
		$sun = $row_posts['post_sun'];
		$content = $row_posts['post_content'];
		$plant = $row_posts['post_plant'];
		$post_date = $row_posts['post_date'];
		$postdate = date('F j, Y h:ia', strtotime($post_date));

		// getting the user who has posted the thread
		$user = "SELECT * from users where user_id='$user_id' AND posts='yes'";

		$run_user = mysqli_query( $connection, $user );
		$row_user = mysqli_fetch_array( $run_user );
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];

		// now displaying the post
		$output   = "<div class='panel panel-default'>";
		$output  .= "<div class='panel-body'>";
		$output  .= "<div class='col-sm-2'>";
		$output  .= "<img src='user/user_images/$user_image' class='img-responsive'>";
		$output  .= "</div>";
		$output  .= "<div class='col-sm-10'>";
		$output  .= "<ol class='breadcrumb'>";
		$output  .= "<li><a class='druu' href='user_profile.php?u_id=$user_id'>$user_name</a></li>";
		$output  .= "<li>$postdate</li>";
		$output  .= "</ol>";
		$output  .= "<h3>Species:</b> $post_title</h3>";
		$output  .= "<p><b>Watered every:</b> $water times a day</p>";
		$output  .= "<p><b>Last watered:</b> $watered</p>";
		$output  .= "<p><b>Soil should be:</b> $soil</p>";
		$output  .= "<p><b>Sunlight:</b> $sun</p>";
		$output  .= "<p><b>Suggestion:</b> $content</p>";
		$output  .= "<img src='user/user_images/$plant' class='img-responsive maxwidth'>";
		$output  .= "</div>";
		$output  .= "</div>";
		$output  .= "</div>";

		echo $output;
		
		if ( isset( $_POST['reply'] ) ) {

			$comment = $_POST['comment'];
			$user_email = $_SESSION['user_email'];

			$current_user = "SELECT * from users where user_email='$user_email'";
			$run_current_user = mysqli_query( $connection, $current_user );
			$current_user_row = mysqli_fetch_array( $run_current_user );
			$current_user_id = $current_user_row['user_id'];

			$insert = "INSERT into comments (post_id, user_id,comment,date) values('$post_id','$current_user_id','$comment',NOW())";
			$run = mysqli_query( $connection, $insert );

			echo "<h2>Your reply was added!</h2>";
		}
		
		include( "comments.php" );
		
		$output   = "<form action='' method='post' class='form-horizontal'>";
		$output  .= "<div class='form-group'>";
		$output  .= "<div class='col-sm-12'>";
		$output  .= "<textarea name='comment' class='form-control' cols='30' rows='10' placeholder='Write your reply...' required></textarea>";
		$output  .= "</div>";
		$output  .= "</div>";
		$output  .= "<div class='form-group'>";
		$output  .= "<div class='col-sm-12'>";
		$output  .= "<input type='submit' name='reply' class='btn pull-right andruu' value='Reply'>";
		$output  .= "</div>";
		$output  .= "</div>";
		$output  .= "</form>";						

		echo $output;

	}

}


// function for getting the posts based on category
function get_cats() {

	global $connection;

	$per_page = 3;

	if ( isset( $_GET['page'] ) ) {
		$page = $_GET['page'];
	}else {
		$page = 1;
	}

	$start_from = ( $page - 1 ) * $per_page;

	if ( isset( $_GET['topic'] ) ) {
		$topic_id = $_GET['topic'];
	}

	$get_posts  = "SELECT * from posts where topic_id='$topic_id' ORDER by 1 DESC";
	$run_posts  = mysqli_query( $connection, $get_posts );

	while ( $row_posts = mysqli_fetch_array( $run_posts ) ) {
		
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$post_title = $row_posts['post_title'];
		$water = $row_posts['post_water'];
		$watered = $row_posts['post_watered'];
		$soil = $row_posts['post_soil'];
		$sun = $row_posts['post_sun'];
		$content = $row_posts['post_content'];
		$plant = $row_posts['post_plant'];
		$post_date = $row_posts['post_date'];
		$postdate = date('F j, Y h:ia', strtotime($post_date));

		// getting the user who has posted the thread
		$user = "SELECT * from users where user_id='$user_id' AND posts='yes'";

		$run_user = mysqli_query( $connection, $user );
		$row_user = mysqli_fetch_array( $run_user );
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];

		// now displaying all at once
		$output   = "<div class='panel panel-default'>";
		$output  .= "<div class='panel-body'>";
		$output  .= "<div class='col-sm-2'>";
		$output  .= "<img src='user/user_images/$user_image' class='img-responsive'>";
		$output  .= "</div>";
		$output  .= "<div class='col-sm-10'>";
		$output  .= "<ol class='breadcrumb'>";
		$output  .= "<li><a class='druu' href='user_profile.php?user_id=$user_id'>$user_name</a></li>";
		$output  .= "<li>$postdate</li>";
		$output  .= "</ol>";
		$output  .= "<h3>Species: $post_title</h3>";
		$output  .= "<p>Watered every: $water times a day</p>";
		$output  .= "<p>Last watered: $watered</p>";
		$output  .= "<p>Soil should be: $soil</p>";
		$output  .= "<p>Sunlight: $sun</p>";
		$output  .= "<p>Suggestion: $content</p>";
		$output .= "<img src='user/user_images/$plant' class='img-responsive'> <br/>";
		$output  .= "<a href='single.php?post_id=$post_id' class='btn btn-success andruu'>Open Post</a>";
		$output  .= "</div>";
		$output  .= "</div>";
		$output  .= "</div>";

		echo $output;

	}

}

// get the search result
function GetResults() {

	global $connection;

	if ( isset( $_GET['user_query'] ) ) {
		$search_term = $_GET['user_query'];
	}

	$get_posts  = "SELECT * from posts where post_title like '%$search_term%' ORDER by 1 DESC";
	$run_posts  = mysqli_query( $connection, $get_posts );

	$count_result = mysqli_num_rows( $run_posts );

	if ( $count_result == 0 ) {
		echo "<div class='alert alert-danger' role='alert'>Sorry, we do not have results for this keyword!</div>";
		exit();
	}

	while ( $row_posts = mysqli_fetch_array( $run_posts ) ) {
		
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$post_title = $row_posts['post_title'];
		$water = $row_posts['post_water'];
		$watered = $row_posts['post_watered'];
		$soil = $row_posts['post_soil'];
		$sun = $row_posts['post_sun'];
		$content = $row_posts['post_content'];
		$plant = $row_posts['post_plant'];
		$post_date = $row_posts['post_date'];
		$postdate = date('F j, Y h:ia', strtotime($post_date));

		// getting the user who has posted the thread
		$user = "SELECT * from users where user_id='$user_id' AND posts='yes'";

		$run_user = mysqli_query( $connection, $user );
		$row_user = mysqli_fetch_array( $run_user );
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];

		// now displaying all at once
		$output   = "<div class='panel panel-default'>";
		$output  .= "<div class='panel-body'>";
		$output  .= "<div class='col-sm-2'>";
		$output  .= "<img src='user/user_images/$user_image' class='img-responsive'>";
		$output  .= "</div>";
		$output  .= "<div class='col-sm-10'>";
		$output  .= "<ol class='breadcrumb'>";
		$output  .= "<li><a class='druu' href='user_profile.php?user_id=$user_id'>$user_name</a></li>";
		$output  .= "<li>$postdate</li>";
		$output  .= "</ol>";
		$output  .= "<h3>Species: $post_title</h3>";
		$output  .= "<p>Watered every: $water times a day</p>";
		$output  .= "<p>Last watered: $watered</p>";
		$output  .= "<p>Soil should be: $soil</p>";
		$output  .= "<p>Sunlight: $sun</p>";
		$output  .= "<p>Suggestion: $content</p>";
		$output .= "<img src='user/user_images/$plant' class='img-responsive'> <br/>";
		$output  .= "<a href='single.php?post_id=$post_id' class='btn btn-success andruu'>Open Post</a>";
		$output  .= "</div>";
		$output  .= "</div>";
		$output  .= "</div>";

		echo $output;

	}

}


// function for displaying individual user posts 
function user_posts() {

	global $connection;

	if ( isset( $_GET['u_id'] ) ) {
		$u_id = $_GET['u_id'];
	}

	$get_posts  = "SELECT * from posts where user_id='$u_id' ORDER by 1 DESC";
	$run_posts  = mysqli_query( $connection, $get_posts );

	while ( $row_posts = mysqli_fetch_array( $run_posts ) ) {
		
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$post_title = $row_posts['post_title'];
		$water = $row_posts['post_water'];
		$watered = $row_posts['post_watered'];
		$soil = $row_posts['post_soil'];
		$sun = $row_posts['post_sun'];
		$content = $row_posts['post_content'];
		$plant = $row_posts['post_plant'];
		$post_date = $row_posts['post_date'];
		$postdate = date('F j, Y h:ia', strtotime($post_date));

		// getting the user who has posted the thread
		$user = "SELECT * from users where user_id='$user_id' AND posts='yes'";

		$run_user = mysqli_query( $connection, $user );
		$row_user = mysqli_fetch_array( $run_user );
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];

		// now displaying all at once
		$output   = "<div class='panel panel-default'>";
		$output  .= "<div class='panel-body'>";
		$output  .= "<div class='col-sm-2'>";
		$output  .= "<img src='user/user_images/$user_image' class='img-responsive'  style='width:100px;height:100px;object-fit:cover;'>";
		$output  .= "</div>";
		$output  .= "<div class='col-sm-10'>";
		$output  .= "<ol class='breadcrumb'>";
		$output  .= "<li><a class='druu' href='user_profile.php?u_id=$user_id'>$user_name</a></li>";
		$output  .= "<li>$postdate</li>";
		$output  .= "</ol>";
		$output  .= "<h3>Species: $post_title</h3>";
		$output  .= "<p>Watered every: $water times a day</p>";
		$output  .= "<p>Last watered: $watered</p>";
		$output  .= "<p>Soil should be: $soil</p>";
		$output  .= "<p>Sunlight: $sun</p>";
		$output  .= "<p>Suggestion: $content</p>";
		$output .= "<img src='user/user_images/$plant' class='img-responsive'> <br/>";
		$output  .= "<div class='btn-group'>";
		$output  .= "<a href='single.php?post_id=$post_id' class='btn andruu'>View</a>";
		$output  .= "<a href='edit_post.php?post_id=$post_id' class='btn andruu'>Edit</a>";
		$output  .= "<a href='functions/delete_post.php?post_id=$post_id' class='btn andruu'>Delete</a>";
		$output  .= "</div>";
		$output  .= "</div>";
		$output  .= "</div>";
		$output  .= "</div>";

		echo $output;

	}

}
// try drew get user posts
function get_user_posts() {

	global $connection;

	if ( isset( $_GET['u_id'] ) ) {
		$u_id = $_GET['u_id'];
	}

	$get_posts  = "SELECT * from posts where user_id='$u_id' ORDER by 1 DESC";
	$run_posts  = mysqli_query( $connection, $get_posts );

	while ( $row_posts = mysqli_fetch_array( $run_posts ) ) {
		
		$post_id = $row_posts['post_id'];
		$user_id = $row_posts['user_id'];
		$post_title = $row_posts['post_title'];
		$water = $row_posts['post_water'];
		$watered = $row_posts['post_watered'];
		$soil = $row_posts['post_soil'];
		$sun = $row_posts['post_sun'];
		$content = $row_posts['post_content'];
		$plant = $row_posts['post_plant'];
		$post_date = $row_posts['post_date'];

		// getting the user who has posted the thread
		$user = "SELECT * from users where user_id='$user_id' AND posts='yes'";

		$run_user = mysqli_query( $connection, $user );
		$row_user = mysqli_fetch_array( $run_user );
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];

		// now displaying all at once
		$output   = "<div class='panel panel-default'>";
		$output  .= "<div class='panel-body'>";
		$output  .= "<div class='col-sm-2'>";
		$output  .= "<img src='user/user_images/$user_image' class='img-responsive'>";
		$output  .= "</div>";
		$output  .= "<div class='col-sm-10'>";
		$output  .= "<ol class='breadcrumb'>";
		$output  .= "<li><a href='user_profile.php?u_id=$user_id'>$user_name</a></li>";
		$output  .= "<li>$post_date</li>";
		$output  .= "</ol>";
		$output  .= "<h3>Species: $post_title</h3>";
		$output  .= "<p><b>Watered every: </b>$water times a day</p>";
		$output  .= "<p><b>Last watered:</b> $watered</p>";
		$output  .= "<p><b>Soil should be:</b> $soil</p>";
		$output  .= "<p><b>Sunlight:</b> $sun</p>";
		$output  .= "<p><b>Suggestion:</b> $content</p>";
		$output .= "<img src='user/user_images/$plant' class='img-responsive maxwidth'> <br/>";
		$output  .= "<a href='single.php?post_id=$post_id' class='btn andruu'>View</a>";
		$output  .= "<div class='btn-group'>";
		$output  .= "</div>";
		$output  .= "</div>";
		$output  .= "</div>";
		$output  .= "</div>";

		echo $output;

	}

}


function user_profile() {

	if ( isset( $_GET['u_id'] ) ) {

		global $connection;

		$user_id = $_GET['u_id'];

		$select = "SELECT * from users where user_id='$user_id'";
		$run = mysqli_query( $connection, $select );
		$row = mysqli_fetch_array( $run );

		$id = $row['user_id'];
		$image = $row['user_image'];
		$name = $row['user_name'];
		$country = $row['user_country'];
		$gender = $row['user_gender'];
		$last_login = $row['last_login'];
		$register_date = $row['register_date'];

		if ( $gender == 'Male' ) {
			$msg = "Message";
		}else {
			$msg = "Message";
		}

		$output  = "";
		$output .= "<div class='panel panel-primary' style='border-color:#819e7e'>";
		$output .= "<div class='panel-heading' style='background-color:#819e7e;'><strong>Profile</strong></div>";
		$output .= "<div class='panel-body'>";
		$output .= "<div class='row'>";
		$output .= "<div class='col-sm-8'>";
		$output .= "<ul class='user-details'>";
		$output .= "<li><span>Name: </span>$name</li>";
		$output .= "<li><span>Gender: </span>$gender</li>";
		$output .= "<li><span>Last Login: </span>$last_login</li>";
		$output .= "<li><span>Member Since: </span>$register_date</li>";
		$output .= "</ul>";
		$output .= "<a href='messages.php?u_id=$id' class='btn btn-success andruu'>$msg</a>";
		$output .= "</div>";
		$output .= "<div class='col-sm-4'>";
		$output .= "<img src='user/user_images/$image' class='img-responsive'>";
		$output .= "</div>";
		$output .= "</div>";
		$output .= "</div>";
		$output .= "</div>";

		echo $output;

	}
	get_user_posts();

	new_members();


}

function user_plants() {

	global $connection;

	if ( isset( $_GET['u_id'] ) ) {
		$u_id = $_GET['u_id'];
	}

	$get_plants  = "SELECT * from plants where user_id='$u_id' ORDER by 1 DESC";
	$run_plants  = mysqli_query( $connection, $get_plants );

	while ( $row_posts = mysqli_fetch_array( $run_plants ) ) {
		
		$plant_id = $row_posts['plant_id'];
		$user_id = $row_posts['user_id'];
		$post_title = $row_posts['plant_title'];
		$water = $row_posts['plant_water'];
		$watered = $row_posts['plant_watered'];
		$soil = $row_posts['plant_soil'];
		$sun = $row_posts['plant_sun'];
		$content = $row_posts['plant_content'];
		$plant = $row_posts['plant_plant'];
		$plant_date = $row_posts['plant_date'];
		$plantdate = date('F j, Y h:ia', strtotime($plant_date));

		// getting the user who has posted the thread
		$user = "SELECT * from users where user_id='$user_id' AND posts='yes'";

		$run_user = mysqli_query( $connection, $user );
		$row_user = mysqli_fetch_array( $run_user );
		$user_name = $row_user['user_name'];
		$user_image = $row_user['user_image'];

		// now displaying all at once
		$output   = "<div class='panel panel-default'>";
		$output  .= "<div class='panel-body'>";
		$output  .= "<div class='col-sm-2'>";
		$output  .= "<img src='user/user_images/$user_image' class='img-responsive'  style='width:100px;height:100px;object-fit:cover;'>";
		$output  .= "</div>";
		$output  .= "<div class='col-sm-10'>";
		$output  .= "<ol class='breadcrumb'>";
		$output  .= "<li><a class='druu' href='user_profile.php?u_id=$user_id'>$user_name</a></li>";
		$output  .= "<li>$plantdate</li>";
		$output  .= "</ol>";
		$output  .= "<h3>Species: $post_title</h3>";
		$output  .= "<p>Watered every: $water times a day</p>";
		$output  .= "<p>Last watered: $watered</p>";
		$output  .= "<p>Soil should be: $soil</p>";
		$output  .= "<p>Sunlight: $sun</p>";
		$output  .= "<p>Description: $content</p>";
		$output .= "<img src='user/user_images/$plant' class='img-responsive'> <br/>";
		$output  .= "<div class='btn-group'>";
		$output  .= "<a href='edit_plant.php?plant_id=$plant_id' class='btn andruu'>Edit</a>";
		$output  .= "<a href='functions/delete_plant.php?plant_id=$plant_id' class='btn andruu'>Delete</a>";
		$output  .= "</div>";
		$output  .= "</div>";
		$output  .= "</div>";
		$output  .= "</div>";

		echo $output;

	}

}

function new_members() {

	global $connection;

	// select new members
	$user = "SELECT * from users LIMIT 0,20";
	$run_user = mysqli_query( $connection, $user );

	$output  = "<h2>Other Members</h2>";
	$output .= "<ul class='new-members'>";

	while ( $row = mysqli_fetch_array( $run_user ) ) {

		$user_id = $row['user_id'];
		$user_name = $row['user_name'];
		$user_image = $row['user_image'];

		$output .= "<li><a href='user_profile.php?u_id=$user_id'><img src='user/user_images/$user_image' ></a></li>";

	}

	$output .= "</ul>";

	echo $output;

}





?>