<?php
	try{
		$statement= new mysqli('localhost','root', 'root');
		//$statement->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //exception mode
		
	}
	catch(Exception $e){
		die("couldnt connect");
	}
	try{
		$query= "CREATE TABLE movies.movie(
			m_id INT AUTO_INCREMENT PRIMARY KEY,
			m_name VARCHAR(255) NOT NULL,
			m_year INT NOT NULL,
			m_director VARCHAR(255) NOT NULL,
			m_leadactor VARCHAR(255) NOT NULL
			)";
		
		echo "Table movie created in db movies";
		echo "<br>";
		$query= "INSERT INTO movies.movie(m_name, m_year, m_director, m_leadactor )
			VALUES('Alice in Wonderland', 2010, 'Tim Burton', 'xyz')";

			echo "entry created in db movies";
			echo "<br>";
		$query= "INSERT INTO movies.movie(m_name, m_year, m_director, m_leadactor )
			VALUES('Tangled', 2011, 'Bryon Howard','pqr'),
					('Cinderella', 2015, 'Kenneth Branagh', 'abc')";
			
			echo "2 entries created in db movies";
			echo "<br>";
		$query= "SELECT * FROM 	movie.movies  ORDER BY m_year";
	   $result= $statement->query($query);
	   $result= msqli_query($query, $statement)
		
		$query="ALTER TABLE movies.movie ADD COLUMN(
			m_running_time INT NULL,  
			m_cost INT NULL)";
		
		
		$query= "UPDATE movies.movie SET
			m_running_time= 90,
			m_cost= NULL;
			
			WHERE 
			m_id=1";
			
			echo "success";
			 
	}
	catch(Exception $e){
		die($e->getMessage());
	}
	
	
	?>
	
	<html>
	<head>
		
	
	</head>
		<body>
			<h2>Movies</h2>
			<table style="border: 2px solid red; padding: 10px;">  
				<tr>
				<th>Index</th>
				<th>Movie name</th>
				<th>Year of<br> release</th>
				<th>Director</th>
				<th>Lead actor</th>
			</table>
		</body>
	</html>
	
	<?php
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			extract($row);
			echo "<tr>";
			echo "<td>" .$m_id. "</td>";
			echo "<td>" .$m_name. "</td>";
			echo "<td>" .$m_year. "</td>";
			echo "<td>" .$m_director. "</td>";
			echo "<td>" .$m_leadactor. "</td>";
			echo "</tr>";
		}
	?>
	