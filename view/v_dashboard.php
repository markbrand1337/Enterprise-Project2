<?php
require_once("controller/c_meeting.php");
require_once("controller/c_post.php");
include_once("controller/c_classroom.php");
require_once("controller/c_document.php");
require_once("controller/c_comment.php");
require_once("controller/c_conversation.php");
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
$ccon = new c_Conversation();
$cuser = new c_User();
$data = $cuser->getList();
$userlist = $data['UserList'];

$ccom = new c_Comment();


$cpost = new c_Post();
$data = $cpost->getList();
$postlist = $data['PostList'];

$cmeet = new c_Meeting();
$data = $cmeet->getList();
$meetinglist = $data['MeetingList'];

$cdoc = new c_Document();
$data = $cdoc->getList();
$documentlist = $data['DocumentList'];

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

    $data = $cuser->getOtherUser($user_id);
	$otheruserlist = $data['UserList'];
    $data = $ccom->getUserRecentComment($user_id);
	$commentlist = $data['CommentList'];

	$data = $ccon->getUserRecentConversation($user_id);
	$conversationlist = $data['ConversationList'];
    
    $data = $cpost->getAllUserPost($user_id);
	$postlist = $data['PostList'];

	
	$data = $cdoc->getAllUserDocument($user_id);
	$documentlist = $data['DocumentList'];
	if(isset($_POST['submit'])){
    	if(isset($_POST['content'])){
    		$content = $_POST['content'];
    		$in_class = 0 ;
    		$cpost->AddPost($content,$user_id,$in_class);
    		updateactivity();
    		echo '<script> location.replace("dashboard.php"); </script>';
    	}

    }

} else {
	//print_r("else");
	$user_id= $_SESSION['user_id'];
    // $user_id= 1;
    $data = $cuser->getOneUser($user_id);
    $oneuser = $data['OneUser']; 

    $data = $cuser->getOtherUser($user_id);
	$otheruserlist = $data['UserList'];

    $data = $ccom->getUserRecentComment($user_id);
	$commentlist = $data['CommentList'];
	
	$data = $ccon->getUserRecentConversation($user_id);
	$conversationlist = $data['ConversationList'];
    
	// $cclass = new c_Classroom();
	// $data = $cclass->getOneClassroom($id);
	// $classroom = $data['OneClassroom'];
		
	
	// $data = $cmeet->getAllClassMeeting($id);
	// $meetinglist = $data['MeetingList'];

	$data = $cpost->getAllUserPost($user_id);
	$postlist = $data['PostList'];

	
	$data = $cdoc->getAllUserDocument($user_id);
	$documentlist = $data['DocumentList'];
	if(isset($_POST['submit'])){
    	if(isset($_POST['content'])){
    		$content = $_POST['content'];
    		$in_class = 0 ;
    		$cpost->AddPost($content,$user_id,$in_class);
    		updateactivity();
    		echo '<script> location.replace("dashboard.php"); </script>';
    	}

    }
}
    

 }

print_r($user_id);

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
	                                 <?php echo '<a href="Dashboard.php">'.$oneuser->first_name.' '.$oneuser->last_name.'</a>'; ?>
	                                
	                                                                
                            </div>
                        </div>
                   		 
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="container py-3">
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
		                            
		                            <h6>Contact</h6>
		                            <p><?=$oneuser->email?></p>
		                        </div>
		                        <?php 
		                           		if($user_id != $oneuser->user_id){
		                           			echo '<a href="conversation_create.php?id='.$user_id.'&id2='.$oneuser->user_id.'" class="btn btn-primary">Send Message</a>';
		                           } 
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
			
			<div name="post"  id="post" class="col-12 pb-5">
				<div class="row"> 
					<h3> Post </h3>
					<?php 
					if ($oneuser->user_id == $_SESSION['user_id']) {
					# code...
					echo '<a href="post.php" class="btn">Add new Post</a>'; 
				} ?>
				</div>
				<?php if($oneuser->user_id == $_SESSION['user_id']){?>
				<div class="card col-md-8 col-sm-12 mt-3">
				  <div class="card-body pt-5">
				  	<h5 class="card-title pb-0 mb-0"><?=$oneuser->first_name?> <?=$oneuser->last_name?></h5>
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
				  			echo '<h5 class="card-title pb-0 mb-0">'.$user->first_name.' '.$user->last_name.'</h5>';
					  		} else{
					  			foreach($classroomlist as $class){
					  				if($class->classroom_id == $post->in_class ){
					  					echo '<h5 class="card-title pb-0 mb-0">'.$user->first_name.' '.$user->last_name.' > '.$class->name.'</h5>';
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
				<?php foreach($documentlist as $document){ ?>
                <div class="card col-md-8 col-sm-12 mt-3">
                  <div class="card-body">
                    <h5 class="card-title pb-0 mb-0"><?=$document->name?></h5>
                    <?php foreach ($userlist as $user) {
                        if ($user->user_id == $document->user_id) {
                            foreach ($classroomlist as $class) {
                            	if($class->classroom_id == $document->classroom_id){  
                     ?>
                    <p class="card-text text-muted"><small>Posted By <?=$user->first_name?> <?=$user->last_name?> to class <?=$class->name?></small></p>

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
				  			
				  			echo '<h5 class="card-title pb-0 mb-0">'.$user->first_name.' '.$user->last_name.'</h5>';
					  		
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
					  				
					  					echo '<h5 class="card-title pb-0 mb-0 mt-2 pr-5">'.$user->first_name.' '.$user->last_name.'</h5>';
					  				
					  			
						  		
					  		}
				  		
				  	}


				  	?>

				   
				    
				     <?php 
				     if($oneuser->user_id == $_SESSION['user_id']) {
				     echo '<a href="conversation.php?conv_id='.$conversation->conversation_id.'" class="btn btn-primary">Go to Conversation</a>';
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