<?php
$serverName='localhost';
$username='root';
$passwarod='';
$databse='dbdilip';

$connection=mysqli_connect($serverName,$username,$passwarod,$databse);

$sqlcode="INSERT INTO employees (employee_id, first_name, last_name, birth_date, email, phone_number, hire_date, job_title, department, salary)
     VALUES (4, 'John', 'Doe', '1985-05-15', 'john.doe@example.com', '123-456-7890', '2020-01-15', 'Software Engineer', 'Engineering', 75000.00)";
     



$done=mysqli_query($connection,$sqlcode);










?>