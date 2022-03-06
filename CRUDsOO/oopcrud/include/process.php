<?php
	$db_con = new PDO('mysql:host=localhost;dbname=php_clicks', 'root', '');
	$error  = array();
	$res    = array();
	$success = "";
	if(isset($_REQUEST['action']) && $_REQUEST['action'] == "addStudent")
	{
		if(empty($_POST['first_name']))
		{
			$error[] = "First Name field is required";	
		}
		if(empty($_POST['last_name']))
		{
			$error[] = "Last Name field is required";	
		}
		if(empty($_POST['email']))
		{
			$error[] = "Email field is required";	
		}
		if(empty($_POST['user_name']))
		{
			$error[] = "User Name field is required";	
		}
		if(empty($_POST['password']))
		{
			$error[] = "Password field is required";	
		}
		if($_POST['password'] != $_POST['cpassword'] )
		{
			$error[] = "Password field and confrim password field is not matched";	
		}
		
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false && $_POST['email']!= "" ) {
     
        } else {
          $error[] = "Enter Valid Email address";
         }
		 
		if(!preg_match('/^[a-zA-Z0-9]{5,}$/', $_POST['user_name'])) { 
		   $error[] = "Enter Valid Username";
         } 


		if(count($error)>0)
		{
			$resp['msg']    = $error;
			$resp['status'] = false;	
			echo json_encode($resp);
			exit;
		}
		$pass = md5($_POST['password']);

		  $sqlQuery = "INSERT INTO 	student(first_name,last_name , email , password , user_name)
		  VALUES(:first_name,:last_name,:email,:password,:user_name)";		   
		  $run = $db_con->prepare($sqlQuery);
		  $run->bindParam(':first_name', $_POST['first_name'], PDO::PARAM_STR);  
		  $run->bindParam(':last_name', $_POST['last_name'], PDO::PARAM_STR); 
		  $run->bindParam(':email', $_POST['email'], PDO::PARAM_STR); 
		  $run->bindParam(':password',$pass, PDO::PARAM_STR); 
		  $run->bindParam(':user_name', $_POST['user_name'], PDO::PARAM_STR);  
		  $run->execute(); 	
		  
		  $resp['msg']    = "Student added successfully";
		  $resp['status'] = true;	
		   echo json_encode($resp);
			exit;	 
		 
		
	}
	else if(isset($_REQUEST['action']) && $_REQUEST['action'] == "editStudent")
	{
		
		if(empty($_POST['first_name']))
		{
			$error[] = "First Name field is required";	
		}
		if(empty($_POST['last_name']))
		{
			$error[] = "Last Name field is required";	
		}
		if(empty($_POST['email']))
		{
			$error[] = "Email field is required";	
		}
		if(empty($_POST['user_name']))
		{
			$error[] = "User Name field is required";	
		}
		
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false && $_POST['email']!="" ) {
     
        } else {
          $error[] = "Enter Valid Email address";
         }
		 
		if(!preg_match('/^[a-zA-Z0-9]{5,}$/', $_POST['user_name']) && $_POST['user_name']!="" ) { 
		   $error[] = "Enter Valid Username";
         } 


		if(count($error)>0)
		{
			$resp['msg']    = $error;
			$resp['status'] = false;	
			echo json_encode($resp);
			exit;
		}
		
		  $sqlQuery = "UPDATE student SET first_name = :first_name, 
            last_name  = :last_name, 
            email  = :email,  
            password  = :password,  
            user_name = :user_name
            WHERE student_id = :student_id";
		  $run = $db_con->prepare($sqlQuery);
		  $run->bindParam(':first_name', $_POST['first_name'], PDO::PARAM_STR);  
		  $run->bindParam(':last_name', $_POST['last_name'], PDO::PARAM_STR); 
		  $run->bindParam(':email', $_POST['email'], PDO::PARAM_STR); 
		  $run->bindParam(':password', $_POST['password'], PDO::PARAM_STR); 
		  $run->bindParam(':user_name', $_POST['user_name'], PDO::PARAM_STR);
		  $run->bindParam(':student_id', $_POST['student_id'], PDO::PARAM_INT);
		  $run->execute(); 
		  $resp['msg']    = "Student updated successfully";
		  $resp['status'] = true;	
		  echo json_encode($resp);
		   exit; 	
	}
	else if(isset($_REQUEST['action']) && $_REQUEST['action'] == "deleteStudent")
	{
		  $sqlQuery = "DELETE FROM student WHERE student_id =  :student_id";
	      $run = $db_con->prepare($sqlQuery);
	      $run->bindParam(':student_id', $_POST['student_id'], PDO::PARAM_INT);   
	      $run->execute();
		  $resp['status'] = true;
		  $resp['msg'] = "Record deleted successfully";
		  echo json_encode($resp);
		  
	}
	else if(isset($_REQUEST['action']) && $_REQUEST['action'] == "listStudent")
	{
	    $statement = $db_con->prepare("select * from student where student_id > :student_id");
        $statement->execute(array(':student_id' => 0));
		$row = $statement->fetchAll(PDO::FETCH_ASSOC);
		echo "<pre>";
		print_r($row);
		echo "</pre>";
	}

?>