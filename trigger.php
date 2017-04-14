<html>
<body>
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
if ($_POST["T1"]) {
	$sql = "CREATE TABLE employees_audit (
    	audit_id INT AUTO_INCREMENT PRIMARY KEY,
    	employee_id DECIMAL(11,0) NOT NULL,
    	fname VARCHAR(50) NOT NULL,
   	changedate DATETIME DEFAULT NULL
);";
	$conn->query($sql);
	$sql = "CREATE TRIGGER before_employee_update
 	BEFORE UPDATE ON EMPLOYEE
 	FOR EACH ROW
 	INSERT INTO employees_audit
 	SET employee_id = OLD.employee_id,
 	name = OLD.name,
 	job_title = OLD.job_title,
 	changedate = NOW();";
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
if ($_POST["T2"]) {
	$sql = "CREATE TRIGGER after_payment_update
	AFTER INSERT ON PAYMENT
	FOR EACH ROW
BEGIN
	INSERT INTO FEE_PAYMENT
	SET fee_number = NEW.fee_number,
	payment_number = NEW.payment_number;
	UPDATE FEE,PAYMENT SET FEE.amount = FEE.amount - PAYMENT.payment_amount WHERE PAYMENT.fee_number = FEE.fee_number;
END";
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
$conn->close();
//echo "Connection terminated";
function customError($errno, $errstr) {
}
?>
<form action="main.php" method="get">
<input type="submit" value="Return" action="main.php">
</body>
</html>