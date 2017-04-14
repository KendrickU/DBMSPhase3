<html>
<body>
Table of contents:<br>
	Queries<br>
	Creating Triggers<br>
	Testing Triggers<br><br>

Queries: X and Z are variables that can be filled out in each statement.<br><br>


Query 1: SELECT fee_number, department_name FROM owes WHERE DEPARTMENT_NAME = X
<form action ="connection.php" method="post">
Department Name: <input type="text" name="department"<br>
<input type="submit" name="Q1">
</form>
Query 2: SELECT * FROM FEE WHERE amount BETWEEN X AND Z ORDER BY amount
<form action ="connection.php" method="post">
Between (ex: 30 AND 300): <input type="text" name="between"<br>
<input type="submit" name="Q2">
</form>
Query 3: SELECT * FROM SERVICE_TAG_ITEM WHERE NOT device_type = X; 
<form action ="connection.php" method="post">
Device_type: <input type="text" name="device_type"<br>
<input type="submit" name="Q3">
</form>
Query 4: SELECT employee_id FROM WORKS_FOR WHERE department_name = X;
<form action ="connection.php" method="post">
Department Name: <input type="text" name="department"<br>
<input type="submit" name="Q4">
</form>
Query 5: SELECT * FROM WARRANTY WHERE WARRANTY.start_date < STR_TO_DATE(X, '%m/%d/%Y');
<form action ="connection.php" method="post">
Date (ex: 02/02/2016): <input type="text" name="date"<br>
<input type="submit" name="Q5">
</form>
<br>
Triggers
<br>
Create the following trigger?<br>
"CREATE TRIGGER before_employee_update<br>
    	BEFORE UPDATE ON EMPLOYEE<br>
   	FOR EACH ROW<br>
BEGIN<br>
    	INSERT INTO employees_audit<br>
    	SET employee_id = OLD.employeeNumber,<br>
name = OLD.name,<br>
	job_title = OLD.job_title,<br>
        		changedate = NOW();<br>
END"<br>
<form action="trigger.php" method="post">
<input type="submit" name="T1" value="Create">
</form>
<br>
Create the following trigger?<br>
"CREATE TRIGGER after_payment_update<br>
	AFTER INSERT ON PAYMENT<br>
	FOR EACH ROW<br>
BEGIN<br>
	INSERT INTO FEE_PAYMENT<br>
	SET fee_number = NEW.fee_number,<br>
	payment_number = NEW.payment_number;><br>
UPDATE FEE,PAYMENT SET FEE.amount = FEE.amount - PAYMENT.payment_amount WHERE PAYMENT.fee_number = FEE.fee_number;<br>
END"<br>
<form action="trigger.php" method="post">
<input type="submit" name="T2" value="Create">
</form>
<br><br>
Testing Triggers<br>
<form action="test_trigger.php" method="post">
<input type="submit" name="T1" value="Test Trigger 1">
<br><br>
</form>
<form action="test_trigger.php" method="post">
<input type="submit" name="T2" value="Test Trigger 2">
<br><br>
</form>
</body>
</html>