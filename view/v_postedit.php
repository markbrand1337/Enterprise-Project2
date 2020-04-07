<?php
include_once("controller/c_post.php");
require_once("controller/c_classroom.php");
require_once("controller/c_comment.php");
$cpost = new c_Post();
$ccom = new c_Comment();
$cuser = new c_User();
$data = $cuser->getList();

$userlist = $data['UserList'];
$cclass = new c_Classroom();
$id = 0;
if(isset($_SESSION['user_id']))
{
    if(isset($_SESSION['role']))
    {
    $role = $_SESSION['role'];
     }
    $user_id= $_SESSION['user_id'];
    $data = $cuser->getOneUser($user_id);
    	$oneuser = $data['OneUser']; 

    if(isset($_GET['id']) 
    &&filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1) ) 
    ){
    $id = $_GET['id'];
	$data = $cpost->getOnePost($id);
    $onepost = $data['OnePost'];
    $in_class = $onepost->in_class;
    //print_r($onepost->content);

    $data = $ccom->getAllPostComment($id);
    $commentlist = $data['CommentList'];
    
    $data = $cclass->getOneClassroom($in_class);
    $classroom = $data['OneClassroom']; 


    
    // $name =
    
    // print_r($documentlist);

    if(isset($_POST['submit'])){
    	if(isset($_POST['content'])){
    		$content = $_POST['content'];
    		$cpost->EditPost($id,$content);
    		//echo '<script> location.replace("post.php?id='.$id.'"); </script>';
    	}

    }
           
    } else {
        //id not exist
        

         $data = $cpost->getAllUserPost($user_id);
    	$postlist = $data['PostList'];

    	if(isset($_POST['submit'])){
    	if(isset($_POST['content'])){
    		$content = $_POST['content'];
    		$cpost->EditPost($id,$content);
    		//echo '<script> location.replace("post.php?id='.$id.'"); </script>';
    	}

    }

    }
}
else{
    //if user not logged in
     echo '<script> location.replace("login.php"); </script>';
}
  ?>



 <!-- Content -->
<div class="container">
	<h2 class=" pt-3 card-title pb-0 mb-0 text-center">Post Detail</h2>
<div name="post" class="col-12 pb-5 row pt-2">

			<!-- 	<div class="card col-md-8 col-sm-12 mt-3 mx-auto">
				  <div class="card-body pt-5">
				  	<h5 class="card-title pb-0 mb-0"><?=$oneuser->first_name?> <?=$oneuser->last_name?></h5>
				  	<form method="POST">
				 
				  <textarea type="text" class="col-12 single-input-primary form-control form-control-lg border border-info mt-3" name="content" required="required" pattern="^.{1,150}$" rows="1" placeholder="What do you want to say?"></textarea>	
						<div class="pt-3">
						<h4><input  type="submit" class="genric-btn success circle px-5 py-1 col-sm-12 mb-sm-3 col-md-4 float-right" value="Post" name="submit"></h4>
					</div> 
				  	</form>
				    
				  </div>
				</div> -->

				
				<div class="card col-md-8 col-sm-12 mt-3 mx-auto">
				  <div class="card-body">
				  	<?php foreach ($userlist as $user) {
				  		if ($user->user_id == $onepost->user_id) {
				  			if($onepost->in_class == 0){
				  			echo '<h4 class="card-title pb-0 mb-0">'.$user->first_name.' '.$user->last_name.'</h4>';
					  		} else{
					  		echo '<h4 class="card-title pb-0 mb-0">'.$user->first_name.' '.$user->last_name.' > '.$classroom->name.'</h4>';
					  		}
				  		}
				  	}


				  	?>
				  	
				   
				    <p class="card-text text-muted"><small>Posted on <?=$onepost->created_at?></small></p>
				    <form method="POST">
				 
				  <textarea type="text" class="col-12 single-input-primary form-control form-control-lg border border-info mt-3" name="content" required="required" pattern="^.{1,150}$" rows="1" placeholder="What do you want to say?" value=""><?=$onepost->content?></textarea>	
						<div class="pt-3">
						<h4><input  type="submit" class="genric-btn success circle px-2  col-sm-12 mb-sm-3 col-md-4 float-right" value="Update Post" name="submit"></h4>
					</div> 
				  	</form>
				  </div>
				</div>
				
				
	</div>






</div>
 <!-- End Content -->