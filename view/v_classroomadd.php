<?php
$cuser = new c_User();

$data = $cuser->getTutorList();


$userlist = $data['UserList'];

$valid = 0;

if(isset($_POST['submit']))
{


if(isset($_POST['name']))$name=$_POST['name'];
if(isset($_POST['tutor_id']))$tutor_id=$_POST['tutor_id'];
if(isset($_POST['status']))$status=$_POST['status'];

if( isset($_POST['name']) && isset($_POST['tutor_id']) && isset($_POST['status'])
	&& strlen($_POST['name']) > 0 && strlen($_POST['name']) < 40
	&& strlen($_POST['status']) > 0 && strlen($_POST['status']) < 40
){
		$controller = new c_Classroom();
		$controller->AddClassroom($name,$tutor_id,$status);
}


}

  ?>



 <!-- Content -->
<div class="container">
	<div class="card col-sm-12 col-md-6 mb-5 mx-auto text-white bg-white">
		 <h2 class="pt-4 text-dark card-title text-center">Add New Classroom</h2>
				<form action="#" method="post" class="center p-3 pb-4">
				  <h3 class="pt-4 text-dark card-title">Class Name</h3><h4 class=" bg-danger text-white"></h4>
				  <input type="text" class="col-12 single-input-primary form-control form-control-lg border border-info" name="name" required="required" pattern="[A-Za-z0-9 ]{3,40}" placeholder="Only accept alphabetic, numeric characters and spaces." />
				  
				  
				<h3 class="pt-4 text-dark  card-title">Tutor</h3>
				
				  <div class="form-select">
				  	<h4>
					<select class="form-control form-control-lg border border-info" name="tutor_id" id="tutor_id">
					<?php 
                    foreach($userlist as $tutor)
                   {
                    ?>
                    <option value="<?=$tutor->user_id?>"><?=$tutor->first_name?> <?=$tutor->last_name?></option>
                     <?php
                   }
                     ?> 					
					</select>
				</h4>
								</div>
				<h3 class="pt-4 text-dark card-title">Notes</h3><h4 class=" bg-danger text-white"></h4>
				  <input type="text" class="col-12 single-input-primary form-control form-control-lg border border-info" name="status" required="required" pattern="^.{1,40}$" placeholder="Maximum of 40 characters."/>			
				  <div class="pt-3">
						<h4><input  type="submit" class="genric-btn success circle px-5 py-1 col-sm-12 mb-sm-3 col-md-4 float-right" value="Submit" name="submit"></h4>
						<h4><a href="classroom.php" class="genric-btn  circle px-5 py-1 col-sm-12 mb-sm-3 col-md-4 float-left">Back</a></h4>
					</div> 
					</div> 
				</form> 
	</div>







</div>
 <!-- End Content -->