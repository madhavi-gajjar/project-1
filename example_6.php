<?php
	$name= $email= $city= $gender= $comment= "";
	$nameErr = $emailErr = $genderErr = $cityErr = "";
	$flag= 0;
	
	
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$name= $_POST['name'];
			$email= $_POST['email'];
			$city= $_POST['city'];
			$gender= $_POST['gender'];
			$comment= $_POST['comment'];
		  if (empty($_POST["name"])) {
			$nameErr = "Name is required";
			$flag=0;
		  } else {
			$name = test_input($_POST["name"]);
		  }
		  
		  if (empty($_POST["email"])) {
			$emailErr = "Email is required";
			$flag=0;
		  } else {
			$email = test_input($_POST["email"]);
		  }
			
		  if (empty($_POST["city"])) {
			$cityErr = "Please enter city";
			$flag=0;
		  } else {
			$city = test_input($_POST["city"]);
		  }

		  $comment = test_input($_POST["comment"]);

		  if (empty($_POST["gender"])) {
			$genderErr = "Gender is required";
			$flag=0;
		  } else {
			$gender = test_input($_POST["gender"]);
		  }
		}
			
	
	function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
?>

<html>
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style>
		.error{
			color: red;
		}
		</style>
	</head>
	<h1 style="align-text:center;">Form</h1>
	<body style="padding: 20px;">
		
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
	
	<div class="form-group">
		<label for="name">Name<span class="error">* <?php echo $nameErr;?></span>: </label>
		<input type="text" class="form-control" id="name" name="name">
	</div>
	
	<div class="form-group">
		<label for="email">Email<span class="error">* <?php echo $emailErr;?></span>: </label>
		<input type="email" class="form-control" id="email" name="email">
	</div>
	
	<div class="form-group">
	<label for="gender">Gender<span class="error">* <?php echo $genderErr;?></span>: </label>
	<div class="radio">
		<label><input type="radio" name="gender" value="male">Male</label>
	</div>
	<div class="radio">
		<label><input type="radio" name="gender" value="female">Female</label>
	</div>
	<div class="radio">
		<label><input type="radio" name="gender" value="other">Other</label>
	</div>
	</div>
	
	<div class="form-group">
	<label for="city">City<span class="error">* <?php echo $cityErr;?></span>: </label>
	<select class="form-control" name= "city">
		<option value=" ">Select city</option>
		<option value= "Ahmedabad">Ahmedabad</option>
		<option value= "Bhavnagar">Bhavnagar</option>
		<option value= "Chandigadh">Chandigadh</option>
		<option value= "Delhi">Delhi</option>
		<option value= "Gandhinagar">Gandhinagar</option>
		<option value= "Indore">Indore</option>
		<option value= "Jaipur">Jaipur</option>
		<option value= "other">Other</option>
	</select>
	</div>
	
	<div class="form-group">
		<label for="comment" >Comment: </label>
		<textarea class="form-control" name="comment" rows="6" cols="40"></textarea>
	</div>
	<div class="form-group" style="margin-left: 30px;">
	<div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
	</div>
	
	<div class="form-group">
	<input type="submit" value="Submit">
	</div>
	</body>
	</form>
</html>

	<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
echo "<br>";
echo $city;
echo "<br>";
echo $comment;

echo "Errors: ";
echo $nameErr;
echo $emailErr;

?>

<?php
	try{
		$conn= new PDO('mysql: host=localhost', 'root', 'root');
	}
	catch(PDOException $e){
		die($e->getMessage());
	}
	
	try{
		$query= "CREATE DATABASE student_details";
		$conn->exec($query);
		echo "Database created";
		echo "<br>";
		
		$query= "CREATE TABLE student_details.students(
			student_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
			student_name VARCHAR(255) NOT NULL,
			student_email VARCHAR(255) NOT NULL,
			student_gender TEXT(50) NOT NULL,
			student_city VARCHAR(255) NOT NULL,
			student_comment VARCHAR(255) NULL
			)";
			$conn->exec($query);
			echo "created table";
			echo "<br>";
			
		$query= "INSERT INTO student_details.students(student_name, student_email, student_gender, student_city, student_comment)
			VALUES('.$name', '.$email', '.$gender', '.$city', '.$comment')";
			$conn->exec($query);
		echo "success";
		}
	
	catch(Exception $e){
		echo "Unsuccessfull";
	}
	
?>



