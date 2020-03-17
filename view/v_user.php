<?php


  ?>



 <!-- Content -->
<div class="container mb-5 pb-5">
	<h2 class="pt-4 mb-5  text-center">User List</h2>

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
               foreach($userlist as $user)
               {
               ?>
                <tr>
                  <td><?=$user->user_id?></td>
                  <td><?=$user->first_name?></td>
                  <td><?=$user->last_name?></td>
                  <td> <?=$user->email?></td>
				
					<?php if($user->role == 1){ 
						echo '<td> Student</td>';
					} else if($user->role == 2){
						echo '<td> Tutor</td>';
					} else if($user->role == 0){
						echo '<td> Staff</td>';
					}

					else {
						echo '<td> Undecided</td>';
					}?>
				
                 

                  <td>
                                        <a href="user_edit.php?id=<?=$user->user_id?>"><i class="fa fa-fw fa-edit" style="color:#2D67EA; font-size:20px;"></i></a>
                    <a href="user_delete.php?id=<?=$user->user_id?>" onclick="return confirm('Are you sure you want to delete this?'); "><i class="fa fa-fw fa-trash" style="color:#EF2D1E; font-size:20px;"></i></a>
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