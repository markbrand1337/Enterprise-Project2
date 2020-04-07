<?php
include_once("controller/c_document.php");
require_once("controller/c_classroom.php");
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
$cdoc = new c_document();
$cuser = new c_User();
// $data = $cdoc->getList();
// $documentlist = $data['DocumentList'];
$data = $cuser->getList();
$userlist = $data['UserList'];

if(isset($_SESSION['user_id']))
{
    if(isset($_SESSION['role']))
    {
    $role = $_SESSION['role'];
     }
    $user_id= $_SESSION['user_id'];

    if(isset($_GET['id']) 
    &&filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1) ) 
    ){
    $id = $_GET['id'];
    $cclass = new c_Classroom();
    $data = $cclass->getOneClassroom($id);
    $classroom = $data['OneClassroom']; 
    
    // $name =
    $data = $cdoc->getAllClassDocument($id);
    $documentlist = $data['DocumentList'];
    // print_r($documentlist);



            if (isset($_POST["upload"]))
         {
             print_r("document");
                 if(isset($_POST['description']) && isset($_POST['name']) && isset($_FILES['file']['name'])){
                    $classroom_id = $id;
                    
                    // $file = $_POST['file']);
                    $file = 
                    rand(1000,10000).'-'.$_FILES['file']['name'];
                    $tname = 
                    $_FILES['file']['tmp_name'];
                    $uploads_dir = 'documents';
                    // print_r($file);
                    move_uploaded_file($tname, $uploads_dir.'/'.$file);

                    $name = $_POST['name'];

                    $description = $_POST['description'];
                    


                    $cdoc->AddDocument($classroom_id,$user_id,$file,$name,$description);
                    updateactivity();
                    echo '<script> location.replace("document.php?id='.$id.'"); </script>';
                 } else {
                    //if not valid
                    $message = "Form Input Invalid";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                 }

             
        }
    } else {
        //id not exist
        echo '<script> location.replace("classroom.php"); </script>';
    }
}
else{
    //if user not logged in
     echo '<script> location.replace("login.php"); </script>';
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
                            <h2 class="text-uppercase">Upload New Class Document</h2>
                            <!-- <p>Description of page</p> -->
                            <div class="page_link">
                                <a href="index.php">Home</a>
                                <a href="classroom.php">Classroom List</a>
                                <?php echo '<a href="classroom_detail.php?id='.$id.'">'.$classroom->name.'</a>'; ?>
                                <?php echo '<a href="document_add.php?id='.$id.'">Upload New Class Document</a>'; ?>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="container py-5">
            <div class="row pt-3"  >
                 <!-- document upload -->
                <div class="col-md-8 col-sm-12 right-contents mx-auto"  >
                    <div class="card p-2 pt-3">
                    <h4 class="card-title pb-0 mb-0  text-center">Upload New Document</h4>
                    <div class="pt-2">
                    <form action="" method="post" enctype="multipart/form-data">
                                        <ul >
                                            <li style="background-color: white;">
                                                <div class="input-group">
                                                  
                                                  <div class="custom-file">
                                                    <h6 class="card-text"><input type="File" class="form-control-file" id="file" name="file"></h6>
                                                    <!-- <label class="custom-file-label" for="inputGroupFile01">Add file</label> -->
                                                  </div>
                                                </div>
                                            </li>
                                            <li style="background-color: white;">
                                               <input  type="text" class="form-control" name="name" id="name"  placeholder="Enter Title">
                                            </li>
                                            <li style="background-color: white;">
                                               <textarea type="text" class="form-control" name="description" id="description" rows="1" placeholder="Enter Description"></textarea>
                                            </li>
                                            <li style="background-color: white;">
                                                <center>
                                                    
                                                <!-- <a href="#" name="upload" class="primary-btn enroll">Upload</a> -->
                                                <input type="submit" name="upload" id="upload" value="Upload" class="primary-btn enroll">
                                                 
                                                </center>
                                            </li>
                                            

                                        </ul>
                                        </form>
                                        </div>
                    </div>
                    </div>
                     <!-- document upload -->
                    

                
                
               
                </div>
                 
                







</div>
 <!-- End Content -->