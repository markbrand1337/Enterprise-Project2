<?php
include_once("controller/c_classroom.php");
$cuser = new c_User();
$data = $cuser->getStudentList();
$userlist = $data['UserList'];
if(isset($_GET['id']) 
	&&filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1) ) 
	){
				//class id
				$id=$_GET['id'];
			$data = $cuser->getAllStudentNotFromClass($id);
		$userlist = $data['UserList'];
			
}





$cclass = new c_Classroom();
$data1 = $cclass->getList();
$classroomlist = $data1['ClassroomList'];

if(isset($_POST['submit']))
{


if(isset($_POST['classroom_id']))$classroom_id=$_POST['classroom_id'];
if(isset($_POST['user_id']))$user_id=$_POST['user_id'];


if( isset($_POST['classroom_id']) && isset($_POST['user_id'])
	
){
		$controller = new c_ClassroomStudent();
		$controller->AddClassroomStudent($user_id,$classroom_id);
}


}

  ?>



 <!-- Content -->
<div class="container">
	
<div class="card col-sm-12 col-md-6 mb-5 mx-auto text-white bg-white">
		 <h2 class="pt-4 text-dark card-title text-center">Add Student to Class</h2>
				<form action="#" method="post" class="center p-3 pb-4">
				  <h3 class="pt-4 text-dark  card-title">Class</h3>
				
				  <div class="form-select">
				  	<h4>
					<select class="form-control form-control-lg border border-info" name="classroom_id" id="classroom_id">
					<?php 
                    foreach($classroomlist as $class)
                   { if( $class->classroom_id == $id){
                    ?>
                    <option value="<?=$class->classroom_id?>" selected><?=$class->classroom_id?> - <?=$class->name?></option>
                     <?php
                   } }
                     ?> 						
					</select>
				</h4>
								</div>
				  
				  
				<h3 class="pt-4 text-dark  card-title">Student</h3>
				
				  <div class="form-select">
				  	<h4>
					<select class="form-control form-control-lg border border-info" name="user_id" id="user_id">
					<?php 
                    foreach($userlist as $student)
                   {
                    ?>
                    <option value="<?=$student->user_id?>"><?=$student->user_id?> - <?=$student->first_name?> <?=$student->last_name?></option>
                     <?php
                   }
                     ?> 					
					</select>
				</h4>
								</div>
				
				  <div class="pt-3">
						<h4><input  type="submit" class="genric-btn success circle px-5 py-1 col-sm-12 mb-sm-3 col-md-4 float-right" value="Submit" name="submit"></h4>
						<h4><a href="classroom.php" class="genric-btn  circle px-5 py-1 col-sm-12 mb-sm-3 col-md-4 float-left">Back</a></h4>
					</div> 
					</div> 
				</form> 
	</div>






</div>
 <!-- End Content -->