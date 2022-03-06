<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Read One Record - PHP CRUD Tutorial</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
</head>
<body>
 
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Read Product</h1>
        </div>
         
		<?php
		// get passed parameter value, in this case, the record ID
		// isset() is a PHP function used to verify if a value is there or not
		$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
		 
		//include database connection
		include '../config/database.php';
		 
		// read current record's data
		try {
			// prepare select query
			$query = "SELECT id, name, description, price, image FROM products WHERE id = ? LIMIT 0,1";
			$stmt = $con->prepare( $query );
		 
			// this is the first question mark
			$stmt->bindParam(1, $id);
		 
			// execute our query
			$stmt->execute();
		 
			// store retrieved row to a variable
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
		 
			// values to fill up our form
			$name = $row['name'];
			$description = $row['description'];
			$price = $row['price'];
			$image = $row['image'];
		}
		 
		// show error
		catch(PDOException $exception){
			die('ERROR: ' . $exception->getMessage());
		}
		?>
 
		<!--we have our html table here where the record will be displayed-->
		<table class='table table-hover table-responsive table-bordered'>
			<tr>
				<td>Name</td>
				<td><?php echo htmlspecialchars($name, ENT_QUOTES);  ?></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><?php echo htmlspecialchars($description, ENT_QUOTES);  ?></td>
			</tr>
			<tr>
				<td>Price</td>
				<td><?php echo htmlspecialchars($price, ENT_QUOTES);  ?></td>
			</tr>
			<tr>
				<td>Image</td>
				<td>
				<?php echo $image ? "<img src='uploads/{$image}' style='width:300px;' />" : "No image found.";  ?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
				    <a href='index.php' class='btn btn-success'>Back to read products</a>
				</td>
			</tr>
		</table>
 
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>
