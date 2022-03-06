<?php include_once("header.php"); 
	  include_once("include/config.php");
	   $statement = $db_con->prepare("select * from student where student_id > :student_id");
       $statement->execute(array(':student_id' => 0));
	   $list = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container" style="margin-top:50px">
<div class="row">
   <div class="alert" id="error-msg">

 </div>
 
  <div class="alert alert-success" id="success-msg">

  </div>
  <br>
  <br>
 <a class="btn btn-primary" href="addStudent.php" style="float:right">Add Student</a>

<div class="widget widget-table action-table">


            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>A Table Example</h3>
             
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> First Name </th>
                    <th> Last Name</th>
                    <th> Username</th>
                    <th> Email</th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
                
                <?php
				foreach($list as $col)
				{
				  ?>
                  <tr id="row_num_<?php echo $col['student_id'];   ?>">
                    <td> <?php echo $col['first_name'];  ?> </td>
                    <td> <?php echo $col['last_name'];  ?> </td>
                     <td> <?php echo $col['user_name'];  ?> </td>
                      <td> <?php echo $col['email'];  ?> </td>
                    <td class="td-actions"><a class="btn btn-small btn-success" href="editStudent.php?student_id=<?php echo $col['student_id'];   ?>"><i class="icon-large icon-edit"> </i></a><a class="btn btn-danger btn-small" onClick="getStudentId(<?php echo $col['student_id'];   ?>)"   href="javascript:void(0)"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
             
                  
                  <?php } ?>
                   
                
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>
          </div>
          </div>
          
         
      
												
											
													 <!-- Button to trigger modal -->
                                                   
                                                     
                                                    <!-- Modal -->
                                                    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        <h3 id="myModalLabel">Alert</h3>
                                                      </div>
                                                      <div class="modal-body">
                                                        <p>Are you sure you want to delete record</p>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                                                        <button class="btn btn-primary" onClick="deleteStudent()">Delete</button>
                                                      </div>
                                                    </div>
											
											
          <?php include_once("footer.php");  ?>