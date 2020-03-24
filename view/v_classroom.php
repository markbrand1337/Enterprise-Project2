<?php

  ?>



 <!-- Content -->
<div class="container">
	<h2 class="pt-4 mb-5  text-center">Classroom List</h2>

<div class="row py-3">
  <a href="classroom_add.php" class="d-inline genric-btn success circle px-4 py-1 col-md-3 col-sm-12 float-right"><h4 class="text-white">Add New Class</h4></a>
</div>

<div class="row">
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Classroom Id</th>
                  <th>Class Name</th>
                  <th>Tutor</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
               <?php
               $classroomlist = $data['ClassroomList'];
               foreach($classroomlist as $class)
               {
               ?>
                <tr>
                  <td><?=$class->classroom_id?></td>
                  <td><?=$class->name?></td>
                  <td><?=$class->tutor_id?></td>
                  <td> <?=$class->status?></td>
				
				
                 

                  <td>
                                        <a href="classroom_edit.php?id=<?=$class->classroom_id?>"><i class="fa fa-fw fa-edit" style="color:#2D67EA; font-size:20px;"></i></a>
                                        <a href="classroomstudent_add.php?id=<?=$class->classroom_id?>"><i class="fa fa-fw fa-edit" style="color:green; font-size:20px;"></i></a>
                    <a href="classroom_delete.php?id=<?=$class->classroom_id?>" onclick="return confirm('Are you sure you want to delete this?'); "><i class="fa fa-fw fa-trash" style="color:#EF2D1E; font-size:20px;"></i></a>
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
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>




</div>
 <!-- End Content -->