<?php
include_once("controller/c_classroom.php");
// $controller = new c_ClassroomStudent();
// $data = $controller->getList();
$classroomlist = $data['ClassroomStudentList'];
$id = 0;
$count = 0;
$cuser = new c_User();
$data = $cuser->getList();
$userlist = $data['UserList'];


$cclassroom = new c_Classroom();
$data = $cclassroom->getList();
$classlist = $data['ClassroomList'];
if (
  isset($_GET['id'])
  && filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))
) {
  //class id
  $id = $_GET['id'];
  // print_r($id);
  // $data = $cclassroom->getList();
  // $classroom = $data['ClassroomList'];

  $data = $cclassroom->getOneClassroom($id);
  $classroom = $data['OneClassroom'];

  $controller = new c_ClassroomStudent();
  $data = $controller->getStudentList($id);
  $classroomlist = $data['CStudentList'];
  //print_r($classroomlist);
  $ccount = $cclassroom->getStudentCount($id);
  $count =  $ccount->student_count;
  //print_r($ccount->student_count);
  // print_r("getStudentList");

} else if (
  isset($_GET['id2'])
  && filter_var($_GET['id2'], FILTER_VALIDATE_INT, array('min_range' => 1))
) {
  //user_id
  $id = $_GET['id2'];
  $controller = new c_ClassroomStudent();
  $data = $controller->getClassroomList($id);
  $classroomlist = $data['SClassroomList'];
  // print_r("getClassroomList");
}
if (isset($_SESSION['user_id'])) {
  if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
  }
  $user_id = $_SESSION['user_id'];
  // if($role == 0 || $role == 2){
  //   //staff 
  //   $data = $cclass->getList();
  //   $classroomlist = $data['ClassroomList'];
  // } elseif ($role == 1) {
  //   $data = $cclass->getAllStudentClassroom($user_id);
  //   $classroomlist = $data['ClassroomList'];
  // }
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
            <h2 class="text-uppercase">Students of <?= $classroom->name ?></h2>
            <!-- <p>Description of page</p> -->
            <div class="page_link">
              <a href="index.php">Home</a>
              <a href="classroom.php">Classroom List</a>

              <?php echo '<a href="classroomstudent.php?id=' . $id . '">Students of ' . $classroom->name . '</a>'; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="container">

  <h2 class="pt-4 mb-5  text-center">ClassroomStudent List</h2>
  <?php if ($id != 0) { ?>
    <div class="row py-3">
      <?php if ($role == 0) { ?>
        <?php if ($count < 10) { ?>
          <?php
          //echo '<a href="classroomstudent_add.php?id='.$id.'" class="d-inline genric-btn success circle px-4 py-1 col-md-3 col-sm-12"><h4 class="text-white">Assign Student to Class</h4></a>';
          ?>
        <?php } ?>
      <?php } ?>
      <?php if ($role == 0) { ?>

        <!-- <a href="classroomstudent_add.php?id=$id" class="d-inline genric-btn success circle px-4 py-1 col-md-3 col-sm-12"><h4 class="text-white">Assign Student to Class</h4></a> -->
        <?php
        //if($count < 10){
        ?>
        <?php
        echo '<a href="classroomstudent_add_bulk.php?id=' . $id . '" class="d-inline genric-btn success circle px-4 py-1 mx-2 col-md-3 col-sm-12"><h4 class="text-white">Assign Student to Class</h4></a>';
        ?>
        <?php
        //}
        ?>
        <!-- <a href="classroomstudent_add_bulk.php" class="d-inline genric-btn success circle px-4 py-1 mx-2 col-md-3 col-sm-12"><h4 class="text-white">Bulk Assign Student to Class</h4></a> -->
      <?php } ?>
    </div>
  <?php } ?>
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

        foreach ($classroomlist as $class) {
        ?>
          <tr>
            <!-- <td><?= $class->classroom_id ?></td> -->
            <?php foreach ($classlist as $c) {
              if ($c->classroom_id == $class->classroom_id) {
            ?>
                <td><?= $c->name ?></td>
            <?php }
            } ?>


            <?php foreach ($userlist as $user) {
              if ($user->user_id == $class->user_id) {
            ?>
                <td><?= $user->first_name ?> <?= $user->last_name ?></td>
            <?php }
            } ?>





            <td>
              <?php if ($user_id != $user->user_id) { ?>
                <?php
                echo '<a href="conversation_create.php?id=' . $user_id . '&id2=' . $user->user_id . '"><i class="fa fa-fw fa-comments" title=" Start sending messages to this User" style="color:#2D67EA; font-size:20px;"></i></a> ';


                ?>
              <?php } ?>

              <!--  <a href="conversation_create.php?id=<?= $class->classroom_id ?>&id2=<?= $class->user_id ?>"><i class="fa fa-fw fa-edit" style="color:#2D67EA; font-size:20px;"></i></a>  -->
              <?php if ($role == 0) { ?>
                <a href="classroomstudent_delete.php?id=<?= $class->classroom_id ?>&id2=<?= $class->user_id ?>" title="Delete this?" onclick="return confirm('Are you sure you want to delete this?'); "><i class="fa fa-fw fa-trash" style="color:#EF2D1E; font-size:20px;"></i></a>
              <?php } ?>
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