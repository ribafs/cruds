<?php include_once("header.php");  ?>
<div class="container" style="margin-top:50px">
<div class="row">
<div class="widget ">
 <div id="formcontrols" class="tab-pane active">
 
 <div class="alert" id="error-msg">

 </div>
 
  <div class="alert alert-success" id="success-msg">

  </div>
                                                
                                                
                                            
                                            
								<form class="form-horizontal" id="add-student-form" method="post">
									<fieldset>
										
										<div class="control-group">											
											<label for="username" class="control-label">Username</label>
											<div class="controls">
												<input type="text" placeholder="Username" name="user_name"   required id="username" class="span6">
												<p class="help-block">Your username is for logging in and cannot be changed.</p>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label for="firstname" class="control-label">First Name</label>
											<div class="controls">
												<input type="text" placeholder="First Name" name="last_name"  required id="firstname" class="span6">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label for="lastname" class="control-label">Last Name</label>
											<div class="controls">
												<input type="text" name="first_name" placeholder="Last Name" required id="lastname" class="span6">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label for="email" class="control-label">Email Address</label>
											<div class="controls">
												<input type="email" name="email" placeholder="Email" id="email" class="span4">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<br><br>
										
										<div class="control-group">											
											<label for="password1" class="control-label">Password</label>
											<div class="controls">
												<input type="password" name="password"  id="password" class="span4">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label for="password2" class="control-label">Confirm</label>
											<div class="controls">
												<input type="password" name="cpassword"  id="cpassword" class="span4">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
	
										 <br>
										
											
										<div class="form-actions">
											<button class="btn btn-primary" type="button" id="addStudent">Save</button> 
											<button class="btn">Cancel</button>
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
								</div>
          </div>
          </div>
          </div>
          
         
          <?php include_once("footer.php");  ?>