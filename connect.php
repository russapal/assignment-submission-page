<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$roll_no = $_POST['number'];
	$college_email = $_POST['email'];
	$assignment_link = $_POST['url'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(firstName, lastName, gender, roll_no, college_email, assignment_link) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $gender, $number, $email, $url);
		$execval = $stmt->execute();
		echo $execval;
		echo "Assignment Submitted Successfully";
		$stmt->close();
		$conn->close();
	}
?>