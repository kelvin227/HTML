<?php  

session_start();
# check if the user is logged in
if (isset($_SESSION['user_id'])) {
	
	# database connection file
	include '../db.conn.php';

	# get the logged in user's username from SESSION
	$id = $_SESSION['user_id'];
	
	
	$sql = "UPDATE profile
	        SET last_seen = NOW()
	        WHERE userid = ?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id]);

}else {
	header("Location: ../../index.php");
	exit;
}