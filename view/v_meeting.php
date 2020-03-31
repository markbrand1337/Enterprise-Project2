<?php
require_once("controller/c_meeting.php");
require_once("controller/c_classroom.php");
$cmeet = new c_Meeting();
$data = $cmeet->getList();
$meetinglist = $data['MeetingList'];


//print_r($meetinglist);

if(isset($_GET['id']) 
	&&filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1) ) 
	){
	$id = $_GET['id'];
	$cclass = new c_Classroom();
	$data = $cclass->getOneClassroom($id);
	$classroom = $data['OneClassroom'];	
	
	$name =
	$data = $cmeet->getAllClassMeeting($id);
	$meetinglist = $data['MeetingList'];

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
                            <h2 class="text-uppercase">All Class Meeting</h2>
                            <!-- <p>Description of page</p> -->
                            <div class="page_link">
                                <a href="index.php">Home</a>
                                <a href="classroom.php">Classroom List</a>
                                <?php echo '<a href="classroom_detail.php?id='.$id.'">'.$classroom->name.'</a>'; ?>
                                <?php echo '<a href="meeting.php?id='.$id.'">All Class Meeting</a>'; ?>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="container">
	

<div name="meeting" class="col-12">
				<div class="row"> 
					<h3> Meeting </h3>
					<?php echo '<a href="meeting_add.php?id='.$id.'" class="btn btn">Add new Meeting</a>'; ?>
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
				    <!-- <a href="#" class="btn btn-primary">Go to Meeting</a> -->
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
					}} else {
						?> 
						<div class="card col-md-8 col-sm-12 mt-3">
						  <div class="card-body">
						    <h5 class="card-title">Meeting on <?=$meeting->meeting_date?></h5>
						    <p class="card-text"><?=$meeting->note?></p>
						    <p class="card-text text-muted"><small>Ended.</small></p>
						    <?php echo '<a href="meeting_detail.php?id='.$meeting->id.'&id2='.$id.'" class="btn btn-primary">Go to Meeting</a>';?>
						  </div>
						</div>

		

						<?php

					}

				} 
					?>
				
				
			</div>





</div>
 <!-- End Content -->