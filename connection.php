
<html>
<?php
set_error_handler("customError");
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
if ($_POST["Q1"]) {
	$sql = "SELECT fee_number, department_name FROM owes WHERE DEPARTMENT_NAME = \"".$_POST["department"]."\"";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
   		while($row = $result->fetch_assoc()) {
        	echo "fee_number: " . $row["fee_number"]. " department_name: " . $row["department_name"] . "<br>";
    	}
	} 
	else {
    	echo "0 results<br>";
	}
}
// Query 2
if ($_POST["Q2"]) {
	$sql = "SELECT * FROM FEE WHERE amount BETWEEN ".$_POST["between"]." ORDER BY amount";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
   		while($row = $result->fetch_assoc()) {
        	echo "fee_number: " . $row["FEE_NUMBER"] . " amount: " . $row["AMOUNT"] . "<br>";
    	}
	} 
	else {
    	echo "0 results<br>";
	}
}
// Query 3
if ($_POST["Q3"]) {
	$sql = "SELECT * FROM SERVICE_TAG_ITEM WHERE NOT device_type = \"". $_POST["device_type"]."\"";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
   		while($row = $result->fetch_assoc()) {
        	echo "device_type: " . $row["DEVICE_TYPE"] . " model_number: " . $row["MODEL_NUMBER"] . " brand: " . $row["BRAND"] . " motherboard: " . $row["MOTHERBOARD"] . " cpu: ". $row["CPU"] . " ram: " . $row["RAM"] . " cost: " . $row["COST"] . " serial_number: " . $row["SERIAL_NUMBER"] . "<br>";
    	}
	} 
	else {
    	echo "0 results<br>";
	}
}
// Query 4
if ($_POST["Q4"]) {
	$sql = "SELECT employee_id FROM WORKS_FOR WHERE department_name = \"". $_POST["department"]."\"";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
   		while($row = $result->fetch_assoc()) {
        	echo "Employee_id: " . $row["employee_id"] ."<br>";
    	}
	} 
	else {
    	echo "0 results<br>";
	}
}
// Query 5
if ($_POST["Q5"]) {
	$sql = "SELECT * FROM WARRANTY WHERE WARRANTY.start_date < STR_TO_DATE(\"".$_POST["date"]. "\", '%m/%d/%Y')";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
   		while($row = $result->fetch_assoc()) {
        	echo "Start_Date: " . $row["START_DATE"] . " END_DATE: ". $row["END_DATE"] . " WARRANTY_TYPE: " . $row["WARRANTY_ID"] . " SERIAL_NUMBER: " . $row["SERIAL_NUMBER"] . "<br>";
    	}
	} 
	else {
    	echo "0 results<br>";
	}
}

$conn->close();
//echo "Connection terminated";
function customError($errno, $errstr) {
}
?>
<form action="main.php" method="get">
<input type="submit" value="Return" action="main.php">
</form>
</html>


