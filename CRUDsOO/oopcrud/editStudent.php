<?php include_once("header.php");
	  include_once("include/config.php");
	   $fetch_student_info = $db_con->prepare("select * from student where student_id = :student_id");
       $fetch_student_info->execute(array(':student_id' => $_GET['student_id']));
	   $list = $fetch_student_info->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container" style="margin-top:50px">
<div class="row">
<div class="widget ">
 <div id="formcontrols" class="tab-pane active">
 
  <div class="alert" id="error-msg">

 </div>
 
  <div class="alert alert-success" id="success-msg">

  </div>
  
								<form class="form-horizontal" id="edit-student-form" method="post">
									<fieldset>
										<input type="hidden" name="student_id" value="<?php echo $list[0]['student_id']; ?>">
										<div class="control-group">											
											<label for="username" class="control-label">Username</label>
											<div class="controls">
												<input type="text" value="<?php echo $list[0]['user_name']; ?>" placeholder="Username" name="user_name"   required id="username" class="span6">
												<p class="help-block">Your username is for logging in and cannot be changed.</p>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label for="firstname" class="control-label">First Name</label>
											<div class="controls">
												<input type="text" value="<?php echo $list[0]['first_name']; ?>"  placeholder="First Name" name="first_name"  required id="firstname" class="span6">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label for="lastname" class="control-label">Last Name</label>
											<div class="controls">
												<input type="text" value="<?php echo $list[0]['last_name']; ?>" name="last_name" placeholder="Last Name" required id="lastname" class="span6">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label for="email" class="control-label">Email Address</label>
											<div class="controls">
												<input type="email" value="<?php echo $list[0]['email']; ?>" name="email" placeholder="Email" id="email" class="span4">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										
										
										
	
										 <br>
										
											
										<div class="form-actions">
											<button class="btn btn-primary" type="button" id="editStudent">Save</button> 
											<button class="btn">Cancel</button>
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
								</div>
          </div>
          </div>
          </div>
          
         
          <?php include_once("footer.php");  ?>