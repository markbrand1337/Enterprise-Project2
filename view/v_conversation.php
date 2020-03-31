<?php
include_once("controller/c_conversation.php");
include_once("controller/c_message.php");
$ccon = new c_Conversation();
$cmess = new c_Message();
$cuser = new c_User();

if(isset($_SESSION['user_id'])){
	$user_id= $_SESSION['user_id'];
	$id =1;
	//print_r($user_id);
	$data = $cuser->getOtherUser($user_id);
	$userlist = $data['UserList'];
	$data = $ccon->getConversationList($user_id);
	$conversationlist = $data['ConversationList'];

	// $cuser->emailNotification($id,$user_id);
	$conversation_id= $conversationlist{0}->conversation_id;
	
	
	$data = $cmess->getMessageList($conversation_id);
	$messagelist = $data['MessageList'];
}



if (isset($_GET['conv_id'])) {
    //print_r($_GET['conv_id']);
    $conversation_id =$_GET['conv_id'];
    $data = $cmess->getMessageList($conversation_id);
	$messagelist = $data['MessageList'];
	$data = $ccon->getOneConversation($conversation_id);
	$conv = $data['OneConversation'] ;
	// print_r($conv->user_one);
	if($user_id == $conv->user_one){
		$to_id = $conv->user_two;
		//print_r($to_id);
	} elseif ($user_id == $conv->user_two) {
		$to_id = $conv->user_one;
		//print_r($to_id);
	}
  }



if(isset($_POST['send']))
{ 
if(isset($_POST['message']))
		$content=$_POST['message'];
	if(isset($_POST['message']) && $_POST['message'] != ''){
		$from_id = $user_id;
		$send_at = date("Y-m-d H:i:s");

		$cmess->AddMessage($conversation_id,$content,$from_id,$to_id,$send_at);
	}
}

  ?>



 <!-- Content -->
<div class="container pb-5">
	<h2 class="pt-5 pb-3 text-dark card-title text-center">Your Messages</h2>
	<div class="row">

	<div class="col-3 ">
		<div style="overflow-y: scroll;">
		<?php foreach($conversationlist as $conversation){?>
		<div class="card" style="width: 100%;">
		  <div class="card-body">
		  	<?php foreach($userlist as $user){
		  			if($user->user_id == $conversation->user_one || $user->user_id == $conversation->user_two)
		  			{
		  		?>
		    <h5 class="card-title"><?=$user->first_name?> <?=$user->last_name?></h5>
		    <?php } }?>
		    <?php 
		    //echo '<a href="conversation.php?conv_id=" class="btn btn-primary stretched-link">Read</a>'; 
		    ?>
		    <a href='conversation.php?conv_id=<?=$conversation->conversation_id?>' class="btn btn-primary stretched-link">Read Messages</a>

		  </div>
		</div>

		<?php }?>

		<!-- <div class="card" style="width: 100%;">
		  <div class="card-body">
		    <h5 class="card-title">Person Name</h5>
		    
		  </div>
		</div>

		<div class="card" style="width: 100%; display: flex;
  flex-direction: column-reverse;">
		  <div class="card-body">
		    <h5 class="card-title">Person Name</h5>
		    
		  </div>
		</div> -->

		</div>
	</div>
	<div class="col-8 card pb-3 pt-3" style="max-height: 700px;">

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




			<!-- <div class="card my-2 mx-auto" >
			  <div class="card-body">
			  	<p class="card-text"><small class="text-muted">2020-03-22</small></p>
			    <h5 class="card-title">Person Name: </h5>
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			    
			  </div>
			</div>
			<div class="card my-2 mx-auto text-white bg-primary" >
			  <div class="card-body">
			    <h5 class="card-title text-white">Person Name: </h5>
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			    <p class="card-text"><small class=" text-white">2020-03-22</small></p>
			  </div>
			</div>
			<div class="card my-2 mx-auto" >
			  <div class="card-body">
			    <h5 class="card-title">Person Name: </h5>
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  </div>
			</div> -->

			



		</div>	
	

		<div class="h-20 pt-3">
			<form action="#" method="post" class="">
				<textarea type="text" class="col-12 single-input-primary form-control form-control-lg border border-info" name="message" required="required"></textarea>
				<input  type="submit" class="genric-btn success circle px-5 py-1 col-sm-12  col-md-12 float-right" value="Send" name="send">
			</form>
		</div>
	</div>
	</div>







</div>

 <!-- End Content -->