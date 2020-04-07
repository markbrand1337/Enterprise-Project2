<?php
include_once("controller/c_meeting.php");
include_once("controller/c_meetingmessage.php");
include_once("controller/c_classroom.php");
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
//updateactivity();
$cmeet = new c_Meeting();
$cmmess = new c_MeetingMessage();
$cuser = new c_User();
$id = 0;
$id =0;
if(isset($_GET['id']) 
	&&filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1) ) 
	){
	$id = $_GET['id'];
if(isset($_SESSION['user_id'])){
	$user_id= $_SESSION['user_id'];
	
	//print_r($user_id);
	$data = $cuser->getOtherUser($user_id);
	$userlist = $data['UserList'];
	
	$data = $cmeet->getOneMeeting($id);
	$meeting = $data['OneMeeting'];
	
	$data = $cmmess->getMessageList($id);
	$messagelist = $data['MessageList'];
	//print_r($meeting);
}else{
    //if user not logged in
     echo '<script> location.replace("login.php"); </script>';
}
}
if(isset($_GET['id2']) 
	&&filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1) ) 
	){
	$id2 = $_GET['id2'];
	$cclass = new c_Classroom();
	$data = $cclass->getOneClassroom($id2);
	$classroom = $data['OneClassroom'];
	//print_r($id2);
		

}
if($id==0 && $id2==0) {
        //id not exist
        echo '<script> location.replace("classroom.php"); </script>';
    }

if(isset($_POST['send']))
{ 
if(isset($_POST['message']))
		$content=$_POST['message'];
	if(isset($_POST['message']) && $_POST['message'] != ''){
		$from_id = $user_id;
		$send_at = date("Y-m-d H:i:s");

		$cmmess->AddMessage($id,$id2,$content,$from_id,$send_at);
		updateactivity();
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
                            <h2 class="text-uppercase">Meeting Detail</h2>
                            <!-- <p>Description of page</p> -->
                            <div class="page_link">
                                <a href="index.php">Home</a>
                                <a href="classroom.php">Classroom List</a>
                                <?php echo '<a href="classroom_detail.php?id='.$classroom->classroom_id.'">'.$classroom->name.'</a>'; ?>
                                <?php echo '<a href="#">Meeting Detail</a>'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="container py-3 my-3">
	<div class="row">

		<div class="col-md-3 col-sm-12">
			<div class="card p-3">
				 <div class="container">
				 	<div class="contact_info" id="contact_info">
				 				<div class="">
		                            
		                            <h6>Class Meeting</h6>
		                            <p><?=$meeting->note?></p>
		                        </div>
		                        <div class="">
		                            
		                            <h6><?=$classroom->name?></h6>
		                            <p>Class ID : <?=$classroom->classroom_id?></p>
		                        </div>
		                        <div class="">
		                            
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
		                        <div class="">
		                            <?php if($meeting->start_at == null) {
		                            	echo '<a href="meeting_start.php?id='.$meeting->id.'&id2='.$meeting->classroom_id.'" class="btn btn-primary">Start</a>';
		                            } else  {
		                            	echo '<a href="meeting_end.php?id='.$meeting->id.'&id2='.$meeting->classroom_id.'" class="btn btn-primary">End</a>';
		                            } ?>





		                         

		                            
		                        </div>
		                        
		                        
		                    </div>
				 </div>
			 </div>
		</div>
	<div class="col-md-8 col-sm-12 card pb-3 pt-3" style="max-height: 700px;">

		<div class="h-75 bg-secondary" style="overflow-y: scroll; " id="message">
			<?php foreach($messagelist as $message){
				if($message->from_id !== $user_id){
				?>

			<div class="card my-2 mx-auto col-12"  >
			  <div class="card-body">
			  	<p class="card-text"><small class="text-muted"><?=$message->send_at?></small></p>
			  	<?php 	foreach($userlist as $user){
			  			if($user->user_id == $message->from_id){
			  		?>
			    <h5 class="card-title"><?=$user->first_name?> <?=$user->last_name?> :</h5>
			<?php }}?>
			    <p class="card-text"><?=$message->content?></p>
			    
			  </div>
			</div>

			<?php } else{ ?>
			<div class="card my-2 mx-auto col-12 text-white bg-primary" >
			  <div class="card-body">
			  	<p class="card-text"><small class="text-white"><?=$message->send_at?></small></p>
			  	
			    <h5 class="card-title text-white">You :</h5>
			
			    <p class="card-text"><?=$message->content?></p>
			    
			  </div>
			</div>

		<?php }} ?>

			



		</div>	
	

		<div class="h-20 pt-3">
	<?php if($meeting->end_at == null) { ?>
	<form action="#" method="post" class="">
				<textarea type="text" class="col-12 single-input-primary form-control form-control-lg border border-info" name="message" pattern="^.{1,200}$" required="required"></textarea>
				<input  type="submit" class="genric-btn success circle px-5 py-1 col-sm-12  col-md-12 float-right" value="Send" name="send">
			</form>




		                            	
		                       <?php     } else { ?>
		        <div class="card">
		        	<h2 class="text-center"> Meeting Ended.</h2>
		        </div>                    	

		                      <?php      } ?>		 						
			
		</div>
	</div>






	</div>
</div>
 <!-- End Content -->