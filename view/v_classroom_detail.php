<?php
require_once("controller/c_meeting.php");
require_once("controller/c_post.php");
require_once("controller/c_document.php");

$cuser = new c_User();
$data = $cuser->getTutorList();
$userlist = $data['UserList'];


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
		<div class="col-md-3 col-sm-12">
			<div class="card p-3">
				 <div class="container">
				 	<div class="contact_info" id="contact_info">
		                        <div class="info_item">
		                            <i class="lnr lnr-briefcase"></i>

		                            <h6><?=$classroom->name?></h6>
		                            <p>Class ID : <?=$classroom->classroom_id?></p>
		                        </div>
		                        <div class="info_item">
		                            
		                            <h6>Tutor</h6>
		                            <?php foreach($userlist as $user){
										if($user->user_id == $classroom->tutor_id){
											?>
											<p><?=$user->first_name?> <?=$user->last_name?></p>
											<?php 
										}
									}

									 ?>
		                            
		                        </div>
		                        <div class="info_item">
		                            
		                            <h6>Note</h6>
		                            <p><?=$classroom->note?></p>
		                        </div>
		                        
		                    </div>
				 </div>
			 </div>
		</div>
		<div class="col-md-8 col-sm-12">
			
			<div name="meeting" class="col-12">
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
			<div name="post" class="col-12">
				<div class="row"> 
					<h3> Post </h3><a href="#" class="btn">Add new Post</a>
				</div>
				<div class="card col-md-8 col-sm-12 mt-3">
				  <div class="card-body">
				    <h5 class="card-title pb-0 mb-0">User Name</h5>
				    <p class="card-text text-muted"><small>Posted on 2020-01-22</small></p>
				    <p class="card-text">Meeting Note to describe the general idea of the meeting.Meeting Note to describe the general idea of the meeting.</p>
				    
				    <a href="#" class="btn btn-primary">Go to Post</a>
				  </div>
				</div>
			</div>
			<div name="document" class="col-12">
				<div class="row"> 
					<h3> Document </h3><a href="#" class="btn">Add new Document</a>
				</div>
				<div class="card col-md-8 col-sm-12 mt-3">
				  <div class="card-body">
				    <h5 class="card-title pb-0 mb-0">Document Name</h5>
				    <p class="card-text text-muted"><small>Posted By Name Name</small></p>
				    <p class="card-text">Meeting Note to describe the general idea of the meeting.</p>
				    
				    <a href="#" class="btn btn-primary">Action with Document</a>
				  </div>
				</div>
			</div>
		</div>






	</div>
</div>
 <!-- End Content -->