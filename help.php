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
			<h2>How this works?</h2>
			<br>
			<p><h3>Home Page</h3>Helps you browse different kinds of plants from a different owners. You can also
			share your own plant to other users. Home page includes three sections. First is the show and tell
			where you can show your plant and provide information about it that can help other users who has the same plant as you. </p>
			<img src="assets/images/show1.PNG" alt="logo" class="help_picture">
			
			<br>
			<p><h3>Members</h3>Helps you browse different kinds of plants from a different owners. You can also
			share your own plant to other users. Home page includes three sections. First is the show and tell
			where you can show your plant and provide information about it that can help other users who has the same plant as you. </p>
			<img src="assets/images/members.PNG" alt="logo" class="help_picture">
			
			<br>
			<p><h3>Search Bar</h3>Helps you browse different kinds of plants from a different owners. You can also
			share your own plant to other users. Home page includes three sections. First is the show and tell
			where you can show your plant and provide information about it that can help other users who has the same plant as you. </p>
			<img src="assets/images/search.PNG" alt="logo" class="help_picture">
			
			<br>
			<p><h3>Side Bar</h3>Helps you browse different kinds of plants from a different owners. You can also
			share your own plant to other users. Home page includes three sections. First is the show and tell
			where you can show your plant and provide information about it that can help other users who has the same plant as you. </p>
			<img src="assets/images/sidepanel.PNG" alt="logo" class="help_picture">
            <br>
            <br>
            
            <p><h3>For more inquiries please contact us here</h3>
            <br>
            <div class="info-box">
            <i class="bx bx-envelope">&#9993;</i>
            <h4 class="druu">Email</h4>
            <p class="mailhelp">plaunt2022@gmail.com</p></p>
            </div>
            <br>
            <div class="info-box">
            <i class="bx bx-envelope">&#9990;</i>
            <h4 class="druu">Call Us</h4>
            <p class="mailhelp">+63 997 130 2593</p></p>
            </div>
			
		</div>


<?php 

	include( "footer.php" );

} ?>