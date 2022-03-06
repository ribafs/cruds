<?php

require_once "connection.php";

if(isset($_REQUEST['update_id']))
{
	try
	{
		$id = $_REQUEST['update_id']; //get "update_id" from index.php page through anchor tag operation and store in "$id" variable
		$select_stmt = $db->prepare('SELECT * FROM tbl_person WHERE id =:id'); //sql select query
		$select_stmt->bindParam(':id',$id);
		$select_stmt->execute(); 
		$row = $select_stmt->fetch(PDO::FETCH_ASSOC);
		extract($row);
	}
	catch(PDOException $e)
	{
		$e->getMessage();
	}
	
}

if(isset($_REQUEST['btn_update']))
{
	
	$firstname_up	= $_REQUEST['txt_firstname'];	//textbox name "txt_firstname"
	$lastname_up	= $_REQUEST['txt_lastname'];	//textbox name "txt_lastname"
		
	if(empty($firstname_up)){
		$errorMsg="Please Enter Firstname";
	}
	else if(empty($lastname_up)){
		$errorMsg="Please Enter Lastname";
	}	
	else
	{
		try
		{
			if(!isset($errorMsg))
			{
				$update_stmt=$db->prepare('UPDATE tbl_person SET firstname=:fname_up, lastname=:lname_up WHERE id=:id'); //sql update query
				$update_stmt->bindParam(':fname_up',$firstname_up);
				$update_stmt->bindParam(':lname_up',$lastname_up);	//bind all parameter
				$update_stmt->bindParam(':id',$id);
				 
				if($update_stmt->execute())
				{
					$updateMsg="Record Update Successfully.......";	//record update success message
					header("refresh:3;index.php");	//refresh 3 second and redirect to index.php page
				}
			}	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}	
	}	
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>CRUD Operations in PHP with PDO using Bootstrap</title>
		
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
		
</head>

	<body>
	
	
	<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="https://www.onlyxcodes.com/">onlyxcodes</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="https://www.onlyxcodes.com/2019/03/crud-operations-in-php-with-pdo-bootstrap.html">Back to Tutorial</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	<div class="wrapper">
	
	<div class="container">
			
		<div class="col-lg-12">
		
		<?php
		if(isset($errorMsg))
		{
			?>
            <div class="alert alert-danger">
            	<strong>WRONG ! <?php echo $errorMsg; ?></strong>
            </div>
            <?php
		}
		if(isset($updateMsg)){
		?>
			<div class="alert alert-success">
				<strong>UPDATE ! <?php echo $updateMsg; ?></strong>
			</div>
        <?php
		}
		?>   
			<center><h2>Edit Page</h2></center>
			<form method="post" class="form-horizontal">
					
				<div class="form-group">
				<label class="col-sm-3 control-label">Firstname</label>
				<div class="col-sm-6">
				<input type="text" name="txt_firstname" class="form-control" value="<?php echo $firstname; ?>">
				</div>
				</div>
					
				<div class="form-group">
				<label class="col-sm-3 control-label">lastname</label>
				<div class="col-sm-6">
				<input type="text" name="txt_lastname" class="form-control" value="<?php echo $lastname; ?>">
				</div>
				</div>
						
				<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9 m-t-15">
				<input type="submit" name="btn_update" class="btn btn-primary" value="Update">
				<a href="index.php" class="btn btn-danger">Cancel</a>
				</div>
				</div>
					
			</form>
			
		</div>
		
	</div>
			
	</div>
										
	</body>
</html>