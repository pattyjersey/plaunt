<?php 

	include ( "../includes/connection.php" );

	if ( isset( $_GET['plant_id'] ) ) {

		echo $plant_id = $_GET['plant_id'];

		$delete_plant = "DELETE from plants where plant_id='$plant_id'";
		$run_delete = mysqli_query( $connection, $delete_plant );

		if ( $run_delete ) {

			echo "<script>alert('A plant has been deleted!')</script>";
			echo "<script>window.open('../home.php','_self')</script>";

		}

	}

?>