<html>
<?php
//set_error_handler("customError");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Checkout";
$department = "";



$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connection successful!<br>";
// Query 1
if ($_POST["T1"]) {
	echo "Contents of employees_audit before employee update<br>";
	$sql = "SELECT * FROM employees_audit";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
   		while($row = $result->fetch_assoc()) {
        	echo " audit_id: " . $row["audit_id"] . " employee_id: " . $row["employee_id"] . " fname: " . $row["fname"] . " changedate: " . $row["changedate"] . "<br>";
    	}
	} 
	else {
    	echo "0 results<br>";
	}
	echo "After execution of statement UPDATE EMPLOYEE SET employee_id = 1 WHERE employee_id = 0<br>";
	$sql = "UPDATE employee SET EMPLOYEE_ID = 1 WHERE EMPLOYEE_ID = 0";
	$result = $conn->query($sql);
	$sql = "SELECT * FROM employees_audit";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
   		while($row = $result->fetch_assoc()) {
        	echo " audit_id: " . $row["audit_id"] . " employee_id: " . $row["employee_id"] . " fname: " . $row["fname"] . " changedate: " . $row["changedate"] . "<br>";
    	}
	} 
	else {
    	echo "0 results<br>";
	}
}
if ($_POST["T2"]) {
	echo "Contents of fee_payment before insert into payment";
	$sql = "SELECT * FROM fee_payment";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
   		while($row = $result->fetch_assoc()) {
        	echo "Payment_number: " . $row["PAYMENT_NUMBER"] . " FEE_NUMBER: " . $row["FEE_NUMBER"] . "<br>";
    	}
	} 
	else {
    	echo "0 results<br>";
	}
	echo "Inserting into Payment with statement 'INSERT into PAYMENT ( payment_date, payment_amount, payment_number, fee_number) VALUES (STR_TO_DATE('03/12/2015', '%m/%d/%Y'), 15.00, 1111114111, 444444)'<br>";
	$sql = "INSERT into PAYMENT ( payment_date, payment_amount, payment_number, fee_number) VALUES (STR_TO_DATE('03/12/2015', '%m/%d/%Y'), 15.00, 1111114111, 444444)";
	$result = $conn->query($sql);
	$sql = "SELECT * FROM fee_payment";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
   		while($row = $result->fetch_assoc()) {
        	echo "Payment_number: " . $row["PAYMENT_NUMBER"] . " FEE_NUMBER: " . $row["FEE_NUMBER"] . "<br>";
    	}
	} 
	else {
    	echo "0 results<br>";
	}
}

//function customError($errno, $errstr) {
//}
?>
<form action="main.php" method="get">
<input type="submit" value="Return" action="main.php">