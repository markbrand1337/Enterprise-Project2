<?php
require_once("controller/c_meeting.php");

require_once("controller/c_post.php");
require_once("controller/c_document.php");
require_once("controller/c_comment.php");
$cuser = new c_User();
$data = $cuser->getTutorList();
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

//print_r($meetinglist);

if(isset($_GET['id']) 
	&&filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1) ) 
	){
	$id = $_GET['id'];
	$cclass = new c_Classroom();
	$data = $cclass->getOneClassroom($id);
	$classroom = $data['OneClassroom'];

	$data = $cmeet->getAllClassMeeting($id);
	$meetinglist = $data['MeetingList'];	
	if(isset($_GET['filter']) 
	&&filter_var($_GET['filter'],FILTER_VALIDATE_INT,array('min_range'=>0) ) 
	){
		$filter = $_GET['filter'];
		if ($filter == 1) {
				$data = $cpost->getAllClassPostFromStudent($id);
				$postlist = $data['PostList'];

	
				$data = $cdoc->getAllClassDocumentFromStudent($id);
				$documentlist = $data['DocumentList'];
		} else {
				$data = $cpost->getAllClassPostFromTutor($id);
				$postlist = $data['PostList'];

				
				$data = $cdoc->getAllClassDocumentFromTutor($id);
				$documentlist = $data['DocumentList'];
		}
	}
	else {
		$data = $cpost->getAllClassPost($id);
		$postlist = $data['PostList'];

		
		$data = $cdoc->getAllClassDocument($id);
		$documentlist = $data['DocumentList'];
	}
	

	


	if(isset($_POST['filter'])){
    	if(isset($_POST['filter_value'])){
    		$filter_value = $_POST['filter_value'];
    		//print_r($cid);
    		if($filter_value == 0){
    			echo '<script> location.replace("classroom_detail.php?id='.$id.'"); </script>';
    		} else {
    			echo '<script> location.replace("classroom_detail.php?id='.$id.'&filter='.$filter_value.'"); </script>';
    		}
    		
    	}

    }

} else {
        //id not exist
        echo '<script> location.replace("classroom.php"); </script>';
    }
//print_r($meetinglist);


  ?>



 <!-- Content -->
 <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2 class="text-uppercase"><?=$classroom->name?></h2>
                            <!-- <p>Description of page</p> -->
                            <div class="page_link">
                                <a href="index.php">Home</a>
                                <a href="classroom.php">Classroom List</a>
                                <?php echo '<a href="classroom_detail.php?id='.$id.'">'.$classroom->name.'</a>'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



<div class="container">
	<div class="row p-3">
		<div class="col-md-4 col-sm-12">
			<div class="card p-3">
				 <div class="container">
				 	<div class="contact_info" id="contact_info">
		                        <div class="info_item">
		                            <i class="lnr lnr-briefcase"></i>

		                            <h6><?=$classroom->name?></h6>
		                            <p>Class ID : <?=$classroom->classroom_id?></p>
		                        </div>
		                        
		                        <div class="info_item">
		                            
		                            <h6>Note</h6>
		                            <p><?=$classroom->note?></p>
		                        </div>
		                        <div class="info_item">
		                            
		                            <h6>Tutor</h6>
		                            <?php foreach($userlist as $user){
										if($user->user_id == $classroom->tutor_id){
											?>
											<p><a class="text-dark mb-3" href="dashboard.php?id=<?=$user->user_id?>"><?=$user->first_name?> <?=$user->last_name?></a></p>
											<?php if (isset($_SESSION['user_id'])) {
		                           		if($_SESSION['user_id'] != $user->user_id){
		                           			echo '<a href="#" class="btn btn-primary">Send Message</a>'
		                           		
		                            ;
		                           } }
		                            ?>
											<?php 
										}
									}

									 ?>
		                            
		                        </div>
		                        
		                        <div class="info_item">
		                            
		                            <h6>Student List</h6>
		                            <p><a href="classroomstudent.php?id=<?=$classroom->classroom_id?>">Go to List.</a></p>
		                        </div>
		                    </div>
				 </div>
			 </div>
			 <div class="card p-3">
				 <div class="container">
				 	<div class="contact_info" id="contact_info">
		                        <h6> Sections </h6>
		                        <a href="#meeting"><p>Class's Meeting</p></a>
		                        <a href="#post"><p>Class's Post</p></a>
		                        <a href="#document"><p>Class's Uploaded Document</p></a>
		                        
		                    </div>
				 </div>
			 </div>
		</div>
		<div class="col-md-8 col-sm-12">
			<div class="col-12 pb-5">
				<h5> Filter for Interaction in Class : </h5>
		<form action="" method="post">
							<div class=""> 
								<div class="form-select col-sm-12 col-md-6 col-lg-6">
				  	<h6>
					<select class="form-control form-control-lg border border-info" name="filter_value" id="filter_value">
					<option value="0"> All Users' Interaction </option>
					<option value="1"> Only Students' Interaction </option>
					<option value="2"> Only Tutors' Interaction </option>
					</select>
				</h6>
				</div>
				<div class="pt-3">
						<h4><input  type="submit" class="genric-btn success circle px-5 py-1 ccol-sm-12 col-md-6 col-lg-6" value="filter" name="filter"></h4>
						
					</div> 
							</div>
							
						</form>
			</div>
			<div name="meeting" id="meeting" class="col-12 pb-5">
				<div class="row"> 
					<h3> Meeting </h3>
					<?php echo '<a href="meeting_add.php?id='.$id.'" class="btn">Add new Meeting</a>'; ?>
				</div>
				<?php foreach($meetinglist as $meeting){
					if($meeting->end_at == null){
						if($meeting->start_at == null){
						?> 
				<div class="card col-md-8 col-sm-12 mt-3">
				  <div class="card-body">
				    <h5 class="card-title">Meeting on <?=$meeting->meeting_date?></h5>
				    <p class="card-text"><?=$meeting->note?></p>
				    <p class="card-text text-muted"><small>Not yet Started.</small></p>
				    <?php echo '<a href="meeting_detail.php?id='.$meeting->id.'&id2='.$id.'" class="btn btn-primary">Go to Meeting</a>';?>

				  </div>
				</div>
			<?php } else {?>
				<div class="card col-md-8 col-sm-12 mt-3">
				  <div class="card-body">
				    <h5 class="card-title">Meeting on <?=$meeting->meeting_date?></h5>
				    <p class="card-text"><?=$meeting->note?></p>
				    <p class="card-text text-muted"><small>Started.</small></p>
				  <?php echo '<a href="meeting_detail.php?id='.$meeting->id.'&id2='.$id.'" class="btn btn-primary">Go to Meeting</a>';?>
				  </div>
				</div>

						<?php
					}}} 
					?>
				
				<?php echo '<a href="meeting.php?id='.$id.'" class="btn">All Meeting</a>'; ?>
			</div>
			<div name="post" id="post" class="col-12 pb-5">
				<div class="row"> 
					<h3> Post </h3>
					<?php echo '<a href="post.php?id='.$id.'" class="btn">Add new Post</a>'; ?>
				</div>
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
					  		echo '<h5 class="card-title pb-0 mb-0"><a class="text-dark" href="dashboard.php?id='.$user->user_id.'">'.$user->first_name.' '.$user->last_name.'</a> > <a class="text-dark" href="classroom_detail.php?id='.$classroom->classroom_id.'">'.$classroom->name.'</a></h5>';
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
				<?php echo '<a href="post.php?id='.$id.'" class="btn">All Post</a>'; ?>
			</div>
			<div name="document" id="document" class="col-12 pb-5 ">
				<div class="row"> 
					<h3> Document </h3>
					<?php echo '<a href="document_add.php?id='.$id.'" class="btn">Add Document</a>'; ?>
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
                            
                     ?>
                   <p class="card-text text-muted"><small>Posted By <a href="dashboard.php?id=<?=$user->user_id?>"><?=$user->first_name?> <?=$user->last_name?></a> to class <a href="classroom_detail.php?id=<?=$classroom->classroom_id?>"><?=$classroom->name?></a></small></p>
                    <?php } } ?>
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
				<?php echo '<a href="document.php?id='.$id.'" class="btn">All Documents</a>'; ?>
			</div>

		</div>






	</div>
</div>
 <!-- End Content -->