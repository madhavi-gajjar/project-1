<?php
	class student{
		public  $about;
		
		public  $passed;
			
	}
	
	try{
	$pdo= new PDO('mysql: host=localhost; dbname=learning', 'root','root' );
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
	
	$statement= $pdo->prepare('select * from students');
	
	$statement->execute();
	
	$stud= $statement->fetchAll(PDO::FETCH_CLASS, 'student');
?>