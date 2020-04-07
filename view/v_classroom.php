<?php
// include_once("controller/c_classroomstudent.php");
$cclass = new c_Classroom();

$data = $cclass->getList();
$classroomlist = $data['ClassroomList'];
// $cclasssroomtudent = new c_ClassroomStudent();
// $data = $cclasssroomtudent->getList();
// $classroomStudentlist = $data['ClassroomStudentList'];
if(isset($_SESSION['user_id']))
{
    if(isset($_SESSION['role']))
    {
    $role = $_SESSION['role'];
     }
    $user_id= $_SESSION['user_id'];
    if($role == 0 || $role == 2){
      //staff 
      $data = $cclass->getList();
      $classroomlist = $data['ClassroomList'];
    } elseif ($role == 1) {
      $data = $cclass->getAllStudentClassroom($user_id);
      $classroomlist = $data['ClassroomList'];
    }
}
  ?>



 <!-- Content -->
  <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2 class="text-uppercase">Classroom</h2>
                            <!-- <p>Description of page</p> -->
                            <div class="page_link">
                                <a href="index.php">Home</a>
                                <a href="classroom.php">Classroom List</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="container">
	<h2 class="pt-4 mb-5  text-center">Classroom List</h2>

<div class="row py-3">
  <?php if($role ==0){ ?>
  <a href="classroom_add.php" class="d-inline genric-btn success circle px-4 py-1 col-md-3 col-sm-12 float-right"><h4 class="text-white">Add New Class</h4></a>


<?php  }?>
  
</div>
<div class="row">
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Classroom Id</th>
                  <th>Class Name</th>
                  <th>Tutor</th>
                  <th>Note</th>
                  <th>Student List</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php
               // $classroomlist = $data['ClassroomList'];
               foreach($classroomlist as $class)
               {
               ?>
                <tr>
                  <td><?=$class->classroom_id?></td>
                  <td><?=$class->name?></td>
                  <td><?=$class->tutor_id?></td>
                  <td> <?=$class->note?></td>
				          <td> <a href="classroomstudent.php?id=<?=$class->classroom_id?>"><i class="fa fa-fw fa-list" style="color:green; font-size:20px;" title="List of student in this class."></i></a></td>
				          <td>
                  <?php if(isset($_SESSION['role'])){
                         if($_SESSION['role'] == 0){
                    ?>
  
                  
                     <a href="classroom_edit.php?id=<?=$class->classroom_id?>"><i class="fa fa-fw fa-edit" style="color:#2D67EA; font-size:20px;" title="Edit this class info."></i></a>
                                       
                    <a href="classroom_delete.php?id=<?=$class->classroom_id?>" onclick="return confirm('Are you sure you want to delete this?'); "><i class="fa fa-fw fa-trash" style="color:#EF2D1E; font-size:20px;" title="Delete this"></i></a>
                  
                  <?php } elseif ($_SESSION['role'] == 1) {
                   ?>
                    <!-- <a href="classroom_join.php?id=<?=$class->classroom_id?>"><i class="fa fa-fw fa-sign-in" style="color:green; font-size:20px;" title="Join this class."></i></a> -->
                                       
                    <a href="classroom_detail.php?id=<?=$class->classroom_id?>"><i class="fa fa-fw fa-info" style="color:blue; font-size:20px;" title="View Class page."></i></a>
                  <?php } elseif ($_SESSION['role'] == 2) {
                   ?>              
                    <a href="classroom_detail.php?id=<?=$class->classroom_id?>"><i class="fa fa-fw fa-info" style="color:blue; font-size:20px;" title="View Class page."></i></a>

                <?php }} ?>
                </td>
                </tr>
               <?php
             }
               ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Classroom Id</th>
                  <th>Class Name</th>
                  <th>Tutor</th>
                  <th>Note</th>
                  <th>Student List</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>




</div>
 <!-- End Content -->