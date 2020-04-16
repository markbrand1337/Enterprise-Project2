<?php
require_once("controller/c_meeting.php");
require_once("controller/c_post.php");
include_once("controller/c_classroom.php");
require_once("controller/c_document.php");
require_once("controller/c_comment.php");
require_once("controller/c_conversation.php");
require_once("controller/c_report.php");
include_once("controller/c_userlog.php");

$cuserlog = new c_UserLog();

function updateactivity(){
	if(isset($_SESSION['user_id'])){
		$user_id= $_SESSION['user_id'];
		$cuserlog = new c_UserLog();
		$res = $cuserlog->getOneUserLog($user_id);
			if($res == null){
				$cuserlog->AddUserLog($user_id);
				
			} else{
				$cuserlog->EditUserLog($user_id);
				
			}
	}
	
}
$creport = new c_Report();
$ccon = new c_Conversation();
$cuser = new c_User();
$data = $cuser->getList();
$userlist = $data['UserList'];
$fulluserlist = $data['UserList'];


if(isset($_POST['subb']))
{
  $name = $_POST["search"];
  
    $data =$cuser->searchStudentByName($name);

    $fulluserlist = $data['UserList'];
}
$ccom = new c_Comment();


$cpost = new c_Post();
$data = $cpost->getList();
$postlist = $data['PostList'];

$cmeet = new c_Meeting();
$data = $cmeet->getList();
$meetinglist = $data['MeetingList'];

$cdoc = new c_Document();
// $data = $cdoc->getList();
// $documentlist = $data['DocumentList'];

$cclass = new c_Classroom();
$data = $cclass->getList();
$classroomlist = $data['ClassroomList'];

if(isset($_SESSION['user_id']))
{
    if(isset($_SESSION['role']))
    {
    $role = $_SESSION['role'];
     }

     if(isset($_GET['id']) 
	&&filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1) ) 
	){
     	
	//check if id exist
	$user_id= $_GET['id'];
	
	$data = $cuser->getOneUser($user_id);
    $oneuser = $data['OneUser']; 

    $data = $creport->getReceivedMessageCount($user_id);
	$received_message_count = $data['MessageCount']->message_count;
	$data = $creport->getSentMessageCount($user_id);
	$sent_message_count = $data['MessageCount']->message_count;

	$data = $creport->getSentMessageCountLastWeek($user_id);
	$sent_message_7_count = $data['MessageCount']->message_count;

	$data = $creport->getReceivedMessageCountLastWeek($user_id);
	$received_message_7_count = $data['MessageCount']->message_count;

	$data = $creport->getCommentCount($user_id);
	$comment_count = $data['CommentCount']->comment_count;

	$data = $creport->getPostCount($user_id);
	$post_count = $data['PostCount']->post_count;

    if($oneuser->role == 1){
   	 	$data = $cclass->getAllStudentClassroom($user_id);
		$classlist = $data['ClassroomList'];
		//print_r("student");
    } else {
    	$data = $cclass->getAllTutorClassroom($user_id);
		$classlist = $data['ClassroomList'];
		//print_r("tutor");
    }
    $data = $cuser->getOtherUser($user_id);
	$otheruserlist = $data['UserList'];

	$data = $ccon->getUserRecentConversation($user_id);
	$conversationlist = $data['ConversationList'];

    if(isset($_GET['classroom_id']) 
	&&filter_var($_GET['classroom_id'],FILTER_VALIDATE_INT,array('min_range'=>0) ) 
	){ 
     		$classroom_id= $_GET['classroom_id'];

	     	$data = $ccom->getUserRecentCommentFromClass($user_id,$classroom_id);
			$commentlist = $data['CommentList'];

			
		    
		    $data = $cpost->getAllUserPostFromClass($user_id,$classroom_id);
			$postlist = $data['PostList'];

			
			$data = $cdoc->getAllUserDocumentFromClass($user_id,$classroom_id);
			$documentlist = $data['DocumentList'];
     	} else {
     		$data = $ccom->getUserRecentComment($user_id);
			$commentlist = $data['CommentList'];

		    
		    $data = $cpost->getAllUserPost($user_id);
			$postlist = $data['PostList'];

			
			$data = $cdoc->getAllUserDocument($user_id);
			$documentlist = $data['DocumentList'];
     	}

    
    

	if(isset($_POST['submit'])){
    	if(isset($_POST['content'])){
    		$content = $_POST['content'];
    		$in_class = 0 ;
    		$cpost->AddPost($content,$user_id,$in_class);
    		updateactivity();
    		echo '<script> location.replace("dashboard.php"); </script>';
    	}

    }
    if(isset($_POST['filter'])){
    	if(isset($_POST['classroom_id'])){
    		$cid = $_POST['classroom_id'];
    		
    		if($cid == 0){
    			echo '<script> location.replace("dashboard.php?id='.$user_id.'"); </script>';
    		} else {
    			echo '<script> location.replace("dashboard.php?classroom_id='.$cid.'&id='.$user_id.'"); </script>';
    		}
    		
    	}

    }

} else {
	//print_r("else");
	$user_id= $_SESSION['user_id'];
    // $user_id= 1;
    $data = $cuser->getOneUser($user_id);
    $oneuser = $data['OneUser']; 
    // print_r($oneuser);
    // print_r($oneuser->role);
    $data = $creport->getReceivedMessageCount($user_id);
	$received_message_count = $data['MessageCount']->message_count;
	$data = $creport->getSentMessageCount($user_id);
	$sent_message_count = $data['MessageCount']->message_count;

	$data = $creport->getSentMessageCountLastWeek($user_id);
	$sent_message_7_count = $data['MessageCount']->message_count;

	$data = $creport->getReceivedMessageCountLastWeek($user_id);
	$received_message_7_count = $data['MessageCount']->message_count;

	$data = $creport->getCommentCount($user_id);
	$comment_count = $data['CommentCount']->comment_count;

	$data = $creport->getPostCount($user_id);
	$post_count = $data['PostCount']->post_count;
    if($oneuser->role == 1){
   	 	$data = $cclass->getAllStudentClassroom($user_id);
		$classlist = $data['ClassroomList'];
		//print_r("student");
    } else {
    	$data = $cclass->getAllTutorClassroom($user_id);
		$classlist = $data['ClassroomList'];
		//print_r("tutor");
    }

   $data = $cuser->getOtherUser($user_id);
	$otheruserlist = $data['UserList'];

	$data = $ccon->getUserRecentConversation($user_id);
	$conversationlist = $data['ConversationList'];

    if(isset($_GET['classroom_id']) 
	&&filter_var($_GET['classroom_id'],FILTER_VALIDATE_INT,array('min_range'=>0) ) 
	){ 
     		$classroom_id= $_GET['classroom_id'];

	     	$data = $ccom->getUserRecentCommentFromClass($user_id,$classroom_id);
			$commentlist = $data['CommentList'];

			
		    
		    $data = $cpost->getAllUserPostFromClass($user_id,$classroom_id);
			$postlist = $data['PostList'];
			// print_r($user_id);
			// print_r($classroom_id);
			// print_r($postlist);
			
			$data = $cdoc->getAllUserDocumentFromClass($user_id,$classroom_id);
			$documentlist = $data['DocumentList'];
			//print_r($documentlist);

     	} else {
     		$data = $ccom->getUserRecentComment($user_id);
			$commentlist = $data['CommentList'];

		    
		    $data = $cpost->getAllUserPost($user_id);
			$postlist = $data['PostList'];

			
			$data = $cdoc->getAllUserDocument($user_id);
			$documentlist = $data['DocumentList'];

     	}

	
	// $data = $cdoc->getAllUserDocument($user_id);
	// $documentlist = $data['DocumentList'];
	if(isset($_POST['submit'])){
    	if(isset($_POST['content'])){
    		$content = $_POST['content'];
    		$in_class = 0 ;
    		$cpost->AddPost($content,$user_id,$in_class);
    		updateactivity();
    		echo '<script> location.replace("dashboard.php"); </script>';
    	}

    }

    if(isset($_POST['filter'])){
    	if(isset($_POST['classroom_id'])){
    		$cid = $_POST['classroom_id'];
    		//print_r($cid);
    		if($cid == 0){
    			echo '<script> location.replace("dashboard.php"); </script>';
    		} else {
    			echo '<script> location.replace("dashboard.php?classroom_id='.$cid.'"); </script>';
    		}
    		
    	}

    }
}
    

 }

// print_r($user_id);

//if(isset($_GET['id']) 
// 	&&filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1) ) 
// 	){

// 	//check if id exist
// 	$user_id= $_GET['id'];
// 	$data = $cuser->getOneUser($user_id);
//     	$oneuser = $data['OneUser']; 

//     $data = $ccom->getUserRecentComment($user_id);
// 	$commentlist = $data['CommentList'];

// 	$data = $ccon->getUserRecentConversation($user_id);
// 	$conversationlist = $data['ConversationList'];
//     print_r($conversationlist);
//     $data = $cpost->getAllUserPost($user_id);
// 	$postlist = $data['PostList'];

	
// 	$data = $cdoc->getAllUserDocument($user_id);
// 	$documentlist = $data['DocumentList'];

// } else {

// }

// 



  ?>



 <!-- Content -->
 <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                    	
							<div class="banner_content text-center">
	                            <h2 class="text-uppercase">Dashboard</h2>
	                            <!-- <p>Description of page</p> -->
	                            <div class="page_link">
	                                <a href="index.php">Home</a>
	                                <!-- <a href="#">User</a> -->
	                                 <?php echo '<a href="dashboard.php">'.$oneuser->first_name.' '.$oneuser->last_name.'</a>'; ?>
	                                
	                                                                
                            </div>
                        </div>
                   		 
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="container py-3">
	<!-- staff accesss -->
	<?php if($role == 0){
		?>
	<div class="py-3 mb-3">
		<h2 class="pt-4 mb-5  text-center">Staff Access to User Dashboard</h2>


<div class="row py-3">
  <form action="" method="post" class="col-12">
<input type="text" name="search" class="d-inline form-control form-control-lg col-md-8 col-sm-12 border border-info" placeholder="Search by Name">
<input type="submit" name="subb" value="Search" class="d-inline genric-btn success circle px-4 py-1 col-md-3 col-sm-12">
</form>

</div>




<div class="row" style="overflow-y: scroll; max-height: 300px; ">
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>User Id</th>
                  <th>Name</th>
                  
                  <th>Email</th>
                  <th>Role</th>
                  <th>Dashboard Access</th>
                </tr>
                </thead>
                <tbody>
               <?php
               
               foreach($fulluserlist as $user)
               {
               ?>
                <tr>
                  <td><?=$user->user_id?></td>
                  <td><?=$user->first_name?> <?=$user->last_name?></td>
                  
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
                                        <a href="dashboard.php?id=<?=$user->user_id?>"><i class="fa fa-fw fa-user" style="color:#2D67EA; font-size:20px;" title="Access this user dashboard."></i></a>
                                        
                    <!-- <a href="user_delete.php?id=<?=$user->user_id?>" onclick="return confirm('Are you sure you want to delete this?'); "><i class="fa fa-fw fa-trash" style="color:#EF2D1E; font-size:20px;"></i></a> -->
                  </td>
                </tr>
               <?php
             }
               ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>User Id</th>
                  <th>Name</th>
                  
                  <th>Email</th>
                  <th>Role</th>
                  <th>Dashboard Access</th>
                </tr>
                </tfoot>
              </table>
            </div>


	</div>
	<div class="row my-2 py-3 ">
	
		<div class="card-columns">
			<div class="card text-center ">
			<div class="card-header bg-primary">
			    <h3 class="text-white"> Recieved Message</h3>
			  </div>
		  <div class="card-body">
		    <h5 class="card-title">All Recieved Message Count</h5>
		    <p class="card-text display-3"><?=$received_message_count?></p>
		    
		  </div>
		    <ul class="list-group list-group-flush">
		    <li class="list-group-item">
		    	<h5 class="card-title">Last 7 days</h5>
		    <p class="card-text display-3"><?=$received_message_7_count?></p>
			</li>

		  </ul>
		</div>

		<div class="card text-center ">
			<div class="card-header bg-primary">
			    <h3 class="text-white">Sent Message</h3>
			  </div>
		  <div class="card-body">
		    <h5 class="card-title">All Sent Message Count</h5>
		    <p class="card-text display-3"><?=$sent_message_count?></p>
		    
		  </div>
		    <ul class="list-group list-group-flush">
		    <li class="list-group-item">
		    	<h5 class="card-title">Last 7 days</h5>
		    <p class="card-text display-3"><?=$sent_message_7_count?></p>
			</li>

		  </ul>
		</div>
		<div class="card text-center ">
			<div class="card-header bg-primary">
			    <h3 class="text-white"> Post & Comment</h3>
			  </div>
		  <div class="card-body">
		    <h5 class="card-title">All Post Count</h5>
		    <p class="card-text display-3"><?=$post_count?></p>
		    
		  </div>
		    <ul class="list-group list-group-flush">
		    <li class="list-group-item">
		    	<h5 class="card-title">All Comment Count</h5>
		    <p class="card-text display-3"><?=$comment_count?></p>
			</li>

		  </ul>
		</div>

		</div>
	</div>
<?php } ?>
	<!-- staff access -->
	
	<div class="row ">
		<!-- column1 -->
		<div class="col-md-4 col-sm-12">
			<div class="card p-3">
				 <div class="container">
				 	<div class="contact_info" id="contact_info">
		                        <div class="info_item">
		                            <i class="lnr lnr-user"></i>

		                            <h6><?=$oneuser->first_name?> <?=$oneuser->last_name?></h6>
		                            <?php if($oneuser->role == 1){
		                            	echo '<p>Student</p>';
		                            } else if ($oneuser->role == 2) {
		                            	echo '<p>Tutor</p>';
		                            } else {
		                            	echo '<p>Staff Member</p>';
		                            }
		                            ?>
		                            
		                        </div>
		                        <div class="info_item">
		                            

		                            <h6>Assigned Class</h6>


		                            <?php 
				                    foreach($classlist as $class)
				                   {
				                    ?>
				                    <a href="classroom_detail.php?id=<?=$class->classroom_id?>"><?=$class->name?></a>
				                    <p></p>
				                     <?php
				                   }
				                     ?> 
		                            
		                        </div>
		                        <div class="info_item">
		                            
		                            <h6>Contact</h6>
		                            <p><?=$oneuser->email?></p>
		                        </div>
		                        <?php 
		                        if(isset($_SESSION['user_id'])){
		                           		if($_SESSION['user_id'] != $oneuser->user_id){
		                           			echo '<a href="conversation_create.php?id='.$_SESSION['user_id'].'&id2='.$oneuser->user_id.'" class="btn btn-primary">Send Message</a>';
		                           } }
		                            ?>
		                        
		                    </div>
				 </div>
			 </div>
			 <div class="card p-3">
				 <div class="container">
				 	<div class="contact_info" id="contact_info">
		                        <h6> Sections </h6>
		                        <a href="#post"><p>User's Post</p></a>
		                        <a href="#document"><p>User's Uploaded Document</p></a>
		                        <a href="#comment"><p>Recent Comment</p></a>
		                    </div>
				 </div>
			 </div>
		</div>
		<!-- column1 -->
		<!-- column2 -->
		<div class="col-md-8 col-sm-12">
			<div class="col-12 pb-5">
				<h5> Filter for Interaction in Class : </h5>
				<?php 
				// if (isset($_GET['id'])) {
				// 	echo '<a href="post.php" class="btn">Add new Post</a>'; 
					
				// 		} else {
				// 	echo '<a href="post.php" class="btn">Add new Post</a>'; 
					 
				// 		}

						?>
						<form action="" method="post">
							<div class=""> 
								<div class="form-select col-sm-12 col-md-6 col-lg-6">
				  	<h6>
					<select class="form-control form-control-lg border border-info" name="classroom_id" id="classroom_id">
					<option value="0"> In All Places</option>
					<?php 
                    foreach($classlist as $class)
                   {
                    ?>
                    <option value="<?=$class->classroom_id?>"><?=$class->classroom_id?> - <?=$class->name?></option>
                     <?php
                   }
                     ?> 					
					</select>
				</h6>
				</div>
				<div class="pt-3">
						<h4><input  type="submit" class="genric-btn success circle px-5 py-1 ccol-sm-12 col-md-6 col-lg-6" value="filter" name="filter"></h4>
						
					</div> 
							</div>
							
						</form>
			</div>
			<div name="post"  id="post" class="col-12 pb-5">
				<div class="row"> 
					<h3> Post </h3>
					<?php 
					if ($oneuser->user_id == $_SESSION['user_id']) {
					# code...
						if (isset($_GET['id'])) {
					echo '<a href="post.php" class="btn">Add new Post</a>'; 
					
						} else {
					echo '<a href="post.php" class="btn">Add new Post</a>'; 
					
						}
					

				} ?>

				</div>
				<?php if($oneuser->user_id == $_SESSION['user_id']){?>
				<div class="card col-md-8 col-sm-12 mt-3">
				  <div class="card-body pt-5">
				  	<a href="dashboard.php?id=<?=$oneuser->user_id?>"><h5 class="card-title pb-0 mb-0"><?=$oneuser->first_name?> <?=$oneuser->last_name?></h5></a>
				  	<form method="POST">
				 
				  <textarea type="text" class="col-12 single-input-primary form-control form-control-lg border border-info mt-3" name="content" required="required" pattern="^.{1,255}$" placeholder="What do you want to say?"></textarea>	
						<div class="pt-3">
						<h4><input  type="submit" class="genric-btn success circle px-5 py-1 col-sm-12 mb-sm-3 col-md-4 float-right" value="Post" name="submit"></h4>
					</div> 
				  	</form>
				    
				  </div>
				</div>
			<?php }?>
				<!-- <div class="card col-md-8 col-sm-12 mt-3">
				  <div class="card-body">
				    <h5 class="card-title pb-0 mb-0">User Name</h5>
				    <p class="card-text text-muted"><small>Posted on 2020-01-22</small></p>
				    <p class="card-text">Meeting Note to describe the general idea of the meeting.Meeting Note to describe the general idea of the meeting.</p>
				    
				    <a href="#" class="btn btn-primary">Go to Post</a>
				  </div>
				</div> -->
				<?php foreach($postlist as $post){ ?>
				<div class="card col-md-8 col-sm-12 mt-3">
				  <div class="card-body">
				  	<?php foreach ($userlist as $user) {
				  		if ($user->user_id == $post->user_id) {
				  			if($post->in_class == 0){
				  			echo '
				  			<a href="dashboard.php?id='.$user->user_id.'"><h5 class="card-title pb-0 mb-0">'.$user->first_name.' '.$user->last_name.'</h5></a>
				  			'; 
					  		} else{
					  			foreach($classroomlist as $class){
					  				if($class->classroom_id == $post->in_class ){
					  					echo '<h5 class="card-title pb-0 mb-0"><a class="text-dark" href="dashboard.php?id='.$user->user_id.'">'.$user->first_name.' '.$user->last_name.'</a> > <a class="text-dark" href="classroom_detail.php?id='.$class->classroom_id.'">'.$class->name.'</a></h5>';
					  				}
					  				
					  			}

					  		


					  		}
				  		}
				  	}


				  	?>
				    
				    <p class="card-text text-muted"><small><?=$post->created_at?></small></p>
				    <p class="card-text"><?=$post->content?></p>
				    <div class="row px-4 py-1">
				     <h5><i class="lnr lnr-bubble pr-2"></i></h5>
				    <?php echo '<h6 class="card-title pb-0 mb-0">'.$ccom->getCommentCount($post->post_id).'</h6>';
				    ?>
				    </div>
				    
				     <?php echo '<a href="post_detail.php?id='.$post->post_id.'" class="btn btn-primary">Go to Post</a>';
				    ?>
				  </div>
				</div>
	
				<?php	}?>

				<?php 
				if ($oneuser->user_id == $_SESSION['user_id']) {
					# code...
					echo '<a href="post.php" class="btn">All Post</a>'; 
				}
				
				?>
			</div>
			<div name="document" id="document" class="col-12 pb-5 ">
				<div class="row"> 
					<h3> Document Uploaded </h3>
					<?php 
					//echo '<a href="document_add.php?id='.$id.'" class="btn">Add Document</a>'; 
					?>
				</div>
				<div>
				<!-- <div class="card col-md-8 col-sm-12 mt-3">
				  <div class="card-body">
				    <h5 class="card-title pb-0 mb-0">Document Name</h5>
				    <p class="card-text text-muted"><small>Posted By Name Name</small></p>
				    <p class="card-text">Meeting Note to describe the general idea of the meeting.</p>
				    
				    <a href="#" class="btn btn-primary">Action with Document</a>
				  </div>
				</div> -->
				<?php //print_r($documentlist);
				foreach($documentlist as $document){ ?>
                <div class="card col-md-8 col-sm-12 mt-3">
                  <div class="card-body">
                    <h5 class="card-title pb-0 mb-0"><?=$document->name?></h5>
                    <?php foreach ($userlist as $user) {
                        if ($user->user_id == $document->user_id) {
                            foreach ($classroomlist as $class) {
                            	if($class->classroom_id == $document->classroom_id){  
                     ?>
                    <p class="card-text text-muted"><small>Posted By <a href="dashboard.php?id=<?=$user->user_id?>"><?=$user->first_name?> <?=$user->last_name?></a> to class <a href="classroom_detail.php?id=<?=$class->classroom_id?>"><?=$class->name?></a></small></p>

                    <?php  } } } } ?>
                    <p class="card-text"><?=$document->description?></p>
                    <div class="blog_right_sidebar col-md-8 col-sm-8 p-3 m-5" >
                                        <aside class="single_sidebar_widget popular_post_widget">
                                    <div class="media post_item">
                                        <h3><i class="lnr lnr-file-empty"></i></h3>
                                        <div class="media-body">
                                           <?php echo ' <a href="documents/'.$document->file.'" download id="download"><h3>'.$document->file.'</h3>
                                            </a>';?>
                                            <!-- <a href="documents/6693-concepts_ruiner.png" download id="download">
                                                <h3><?=$document->file?></h3>
                                            </a> -->
                                            
                                        </div>
                                    </div>
                                    
                                        </aside>
                    </div>
                    <?php foreach ($userlist as $user) {
                        if ($user->user_id == $document->user_id) {
                            //echo '<a href="document_edit.php?id=" class="btn btn-primary px-3 py-1">Edit</a>';
                            echo '<a href="document_delete.php?id='.$document->id.'&id2='.$document->classroom_id.'" class="btn btn-danger px-3 py-1">Delete</a>';
                     ?>
                    
                    <?php } } ?>
                  </div>
                </div>



              <?php  }?>



				</div>
				<?php 
				//echo '<a href="document.php?id='.$id.'" class="btn">All Documents</a>'; 
				?>
			</div>
			<div name="comment"  id="comment" class="col-12 pb-5 ">
				<div class="row"> 
					<h3> Recent Comment </h3>
					<?php 
					//echo '<a href="document_add.php?id='.$id.'" class="btn">Add Document</a>'; 
					?>
				</div>

				<?php foreach($commentlist as $comment){ ?>
				<div class="card col-md-8 col-sm-12 mt-3">
				  <div class="card-body">
				  	<?php foreach ($userlist as $user) {
				  		if ($user->user_id == $comment->user_id) {
				  			
				  			echo '<a href="dashboard.php?id='.$user->user_id.'"><h5 class="card-title pb-0 mb-0">'.$user->first_name.' '.$user->last_name.'</h5></a>';
					  		
				  		}
				  	}


				  	?>
				    
				    <p class="card-text text-muted"><small><?=$comment->created_at?></small></p>
				    <p class="card-text"><?=$comment->content?></p>
				   
				    
				     <?php echo '<a href="post_detail.php?id='.$comment->post_id.'" class="">Go to Original Post</a>';
				    ?>
				  </div>
				</div>
	
				<?php	}?>


			</div>
			<div name="conversation"  id="conversation" class="col-12 pb-5 ">
				<div class="row"> 
					<h3> Recent Conversation </h3>
					<?php 
					//echo '<a href="document_add.php?id='.$id.'" class="btn">Add Document</a>'; 
					?>
				</div>

				<?php foreach($conversationlist as $conversation){
				$data = $ccon->getOneConversation($conversation->conversation_id);
				$conv = $data['OneConversation'];
				
				 ?>

				<div class="card col-md-8 col-sm-12 mt-3">
				  <div class="card-body row">
				  	<?php foreach ($otheruserlist as $user) {
				  			
					  		if ($user->user_id == $conv->user_one || $user->user_id == $conv->user_two) {
					  				
					  					echo '<h5 class="card-title pb-0 mb-0 mt-2 pr-5 col-lg-6 col-sm-12  col-md-12 text-center"><a class="text-dark" href="dashboard.php?id='.$user->user_id.'">'.$user->first_name.' '.$user->last_name.'</a></h5>';
					  				
					  			
						  		
					  		}
				  		
				  	}


				  	?>

				   
				    
				     <?php 
				     if($oneuser->user_id == $_SESSION['user_id']) {
				     echo '<a class="btn btn-primary col-lg-6 col-sm-6 col-md-6 mx-auto" href="conversation.php?conv_id='.$conversation->conversation_id.'" class="btn btn-primary">Go to Conversation</a>';
				 	}
				    ?>
				  </div>
				</div>
	
				<?php	}?>


			</div>
		</div>
		<!-- column2 -->
	

	</div>
</div>
 <!-- End Content -->