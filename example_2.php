<?php
	try{
		$conn= new mysqli('localhost', 'root', 'root');
	}
	catch(mysqli_sql_exception $e){
		throw $e;
	}
	
	$sql= "CREATE DATABASE movies";
	if($conn->query($sql)== TRUE){
		echo "Database created successfully";
	}
	else{
		$conn->error;
	}
	
	$sql= "CREATE TABLE movie(
			m_id INT AUTO_INCREMENT PRIMARY KEY,
			m_name VARCHAR(255) NOT NULL,
			m_year INT NOT NULL,
			m_director VARCHAR(255) NOT NULL,
			m_leadactor VARCHAR(255) NOT NULL
			)
	";
	if($conn->query($sql)==TRUE){
		echo "table created successfully";
	}
	else{
		echo $conn->error;
	}
	
	$sql= "DROP DATABASE movies";
	
	if($conn->query($sql)==TRUE){
		echo "db deleted successfully";
	}
	else{
		echo $conn->error;
	}
	
	
?>