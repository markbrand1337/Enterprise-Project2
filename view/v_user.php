<?php
// $date = '02/07/2009 00:07:00';
// $date = preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $date);
// print_r($date);
if (isset($_POST['submit'])) {
  $name = $_POST["search"];
  $cuser = new c_User();
  $data = $cuser->searchStudentByName($name);

  $userlist = $data['UserList'];
}
?>



<!-- Content -->
<div class="container mb-5 pb-5">
  <h2 class="pt-4 mb-5  text-center">User List</h2>


  <div class="row py-3">
    <form action="" method="post" class="col-6">
      <input type="text" name="search" class="d-inline form-control form-control-lg col-md-8 col-sm-12 border border-info" placeholder="Search by Name">
      <input type="submit" name="submit" value="Search" class="d-inline genric-btn success circle px-4 py-1 col-md-3 col-sm-12">
    </form>
    <a href="user_add.php" class="d-inline genric-btn success circle px-4 py-1 col-md-3 col-sm-12 float-right">
      <h4 class="text-white">Add New Class</h4>
    </a>
  </div>




  <div class="row">
    <table id="" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>User Id</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $userlist = $data['UserList'];
        foreach ($userlist as $user) {
        ?>
          <tr>
            <td><?= $user->user_id ?></td>
            <td><?= $user->first_name ?></td>
            <td><?= $user->last_name ?></td>
            <td> <?= $user->email ?></td>

            <?php if ($user->role == 1) {
              echo '<td> Student</td>';
            } else if ($user->role == 2) {
              echo '<td> Tutor</td>';
            } else if ($user->role == 0) {
              echo '<td> Staff</td>';
            } else {
              echo '<td> Undecided</td>';
            } ?>



            <td>
              <!-- <a href="user_edit.php?id=<?= $user->user_id ?>"><i class="fa fa-fw fa-edit" style="color:#2D67EA; font-size:20px;"></i></a> -->

              <a href="user_delete.php?id=<?= $user->user_id ?>" onclick="return confirm('Are you sure you want to delete this?'); "><i class="fa fa-fw fa-trash" style="color:#EF2D1E; font-size:20px;"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
      <tfoot>
        <tr>
          <th>User Id</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
  </div>





</div>
<!-- End Content -->