<?php
include_once("controller/c_classroom.php");
// $controller = new c_ClassroomStudent();
// $data = $controller->getList();
$classroomlist = $data['ClassroomStudentList'];
$id = 0;

$cuser = new c_User();
$data = $cuser->getList();
$userlist = $data['UserList'];


$controller = new c_Classroom();
$data = $controller->getList();
$classlist = $data['ClassroomList'];
if(isset($_GET['id']) 
	&&filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1) ) 
	){
				//class id
				$id=$_GET['id'];
			$controller = new c_ClassroomStudent();
			$data = $controller->getStudentList($id);
			$classroomlist = $data['CStudentList'];
			// print_r("getStudentList");
			
}
 else if(isset($_GET['id2']) 
	&&filter_var($_GET['id2'],FILTER_VALIDATE_INT,array('min_range'=>1) ) 
	){
				//user_id
				$id=$_GET['id2'];
			$controller = new c_ClassroomStudent();
			$data = $controller->getClassroomList($id);
			$classroomlist = $data['SClassroomList'];
			// print_r("getClassroomList");
}


  ?>



 <!-- Content -->
<div class="container">
	
<h2 class="pt-4 mb-5  text-center">ClassroomStudent List</h2>
<?php if($id !=0){?>
<div class="row py-3">
  <?php echo '<a href="classroomstudent_add.php?id='.$id.'" class="d-inline genric-btn success circle px-4 py-1 col-md-3 col-sm-12"><h4 class="text-white">Assign Student to Class</h4></a>';?>
  <!-- <a href="classroomstudent_add.php?id=$id" class="d-inline genric-btn success circle px-4 py-1 col-md-3 col-sm-12"><h4 class="text-white">Assign Student to Class</h4></a> -->
  <?php echo '<a href="classroomstudent_add_bulk.php?id='.$id.'" class="d-inline genric-btn success circle px-4 py-1 mx-2 col-md-3 col-sm-12"><h4 class="text-white">Bulk Assign Student to Class</h4></a>';?>
  <!-- <a href="classroomstudent_add_bulk.php" class="d-inline genric-btn success circle px-4 py-1 mx-2 col-md-3 col-sm-12"><h4 class="text-white">Bulk Assign Student to Class</h4></a> -->
</div>
<?php }?>
<div class="row">
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Classroom</th>
                  <th>Student</th>
                  
                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
               <?php
               
               foreach($classroomlist as $class)
               {
               ?>
                <tr>
                  <!-- <td><?=$class->classroom_id?></td> -->
                  <?php foreach($classlist as $c){
                    if($c->classroom_id == $class->classroom_id){
                    ?>
                  <td><?=$c->name?></td>
              <?php }} ?>


                  <?php foreach($userlist as $user){
                  	if($user->user_id == $class->user_id){
                  	?>
                  <td><?=$user->first_name?> <?=$user->last_name?></td>
              <?php }} ?>
                  
				
				
                 

                  <td>
                                        <!-- <a href="classroomstudent_edit.php?id=<?=$class->classroom_id?>&id2=<?=$class->user_id?>"><i class="fa fa-fw fa-edit" style="color:#2D67EA; font-size:20px;"></i></a> -->
                    <a href="classroomstudent_delete.php?id=<?=$class->classroom_id?>&id2=<?=$class->user_id?>" onclick="return confirm('Are you sure you want to delete this?'); "><i class="fa fa-fw fa-trash" style="color:#EF2D1E; font-size:20px;"></i></a>
                  </td>
                </tr>
               <?php
             }
               ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Classroom</th>
                  <th>Student</th>
                  
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>







</div>
 <!-- End Content -->