<?php
include_once("controller/c_document.php");
$cdoc = new c_document();
if (isset($_POST["bazinga"]))
 {
     #retrieve file title
        $title = $_POST["title"];
     
    #file name with a random number so that similar dont get replaced
     $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
 
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
   
     #upload directory path
    $uploads_dir = 'images';
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, $uploads_dir.'/'.$pname);
 
    #sql query to insert into database
    $sql = "INSERT into fileup(title,image) VALUES('$title','$pname')";
 
    if(mysqli_query($conn,$sql)){
 
    echo "File Sucessfully uploaded";
    }
    else{
        echo "Error";
    }
}

if (isset($_POST["upload"]))
 {
     print_r("document");
     if(isset($_POST['description']) && isset($_FILES['file']['name'])){
        $classroom_id = 1;
        $user_id = 1;
        // $file = $_POST['file']);
        $file = 
        rand(1000,10000).'-'.$_FILES['file']['name'];
        $tname = 
        $_FILES['file']['tmp_name'];
        $uploads_dir = 'documents';
        print_r($file);
        move_uploaded_file($tname, $uploads_dir.'/'.$file);

        $name = "Math Homework";

        $description = $_POST['description'];
        


        //$cdoc->AddDocument($classroom_id,$user_id,$file,$name,$description);
        echo '<script> location.replace("document.php"); </script>';
     }

     
}
  ?>



 <!-- Content -->
<div class="container">
	   <section class="course_details_area section_gap">
        <div class="container">
            <div class="row"  >
                


                <div class=" card col-md-8 right-contents post pb-5 px-4"  style="margin-bottom: 15px;"> 
                    
                    <div class="content" >
                        
                        <div class="comments-area mb-30" >
                            <div class="comment-list"  >
                                <div class="single-comment single-reviews justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img class="profile-img" style="border-radius: 50%;" src="img/profile-img/avatar2.png" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">Lai Manh Dzung</a></h5>
                                            <p class="data-target">
                                                March 31, 2020
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="col-lg-12">
                                        <p>
                                          Slide 1
                                          <br>
                                          Click to download the file.  
                                        </p>
                                    </div>
                                    <div class="blog_right_sidebar col-md-5" style="float: left; padding: 10px;margin: 5px;">
                                        <aside class="single_sidebar_widget popular_post_widget">
                                    <div class="media post_item">
                                        
                                        <div class="media-body">
                                            <a href="documents/6693-concepts_ruiner.png" download id="download"> DOWNLOAD DOC</a>
                                            <a href="download.php?file=5909-concepts_ruiner.png">
                                                <h3>Scum.ppt</h3>
                                            </a>
                                            
                                        </div>
                                    </div>
                                    
                                        </aside>
                                    </div>
                                    
                                    

                            </div>
                                
                            
                        </div>
                        
                    </div>
                    <div class="feedeback">
                        <!-- 
                        <textarea name="feedback" class="form-control" cols="10" rows="10" placeholder="Add a comment"></textarea>
                        <div  style="margin-top: 20px;" class="mt-10 text-right"> -->

                            <a href="#" class="genric-btn info">Edit</a>
                            <a href="#" class="genric-btn danger">Delete</a>
                        </div>
                    </div>
                </div>
                <!-- document upload -->
                <div class="col-lg-3 right-contents post card"  style="margin-bottom: 15px;margin-left: 15px; float: right;">
                    <div class="comments-area mb-30" >
                            <div class="comment-list "  >
                                <div class="single-comment single-reviews justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                        <ul >
                                            <li style="background-color: white;">
                                                <div class="input-group mb-3">
                                                  
                                                  <div class="custom-file">
                                                    <input type="File" class="custom-file-input" id="file" name="file">
                                                    <label class="custom-file-label" for="inputGroupFile01">Add file</label>
                                                  </div>
                                                </div>
                                                                                            </li>
                                            <li style="background-color: white;">
                                               <textarea class="form-control" name="description" id="description" rows="1" placeholder="Enter Message"></textarea>
                                            </li>
                                            <li style="background-color: white;">
                                                <center>
                                                    
                                                <!-- <a href="#" name="upload" class="primary-btn enroll">Upload</a> -->
                                                <input type="submit" name="upload" id="upload" value="Upload" class="primary-btn enroll">
                                                 
                                                </center>
                                            </li>
                                            </form>

                                        </ul>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- document upload -->
                <div class="col-lg-8 right-contents post"  style="margin-bottom: 15px;"> 
                    
                    <div class="content" >
                        
                        <div class="comments-area mb-30" >
                            <div class="comment-list"  >
                                <div class="single-comment single-reviews justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img class="profile-img" style="border-radius: 50%;" src="img/profile-img/avatar2.png" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">Lai Manh Dzung</a></h5>
                                            <p class="data-target">
                                                Tuesday, March 31, 2020
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="col-lg-12">
                                        <p>
                                          Slide 1
                                          <br>
                                          Click to download the file.  
                                        </p>
                                    </div>
                                    <div class="blog_right_sidebar col-lg-5" style="float: left; padding: 10px;margin: 5px;">
                                        <aside class="single_sidebar_widget popular_post_widget">
                                    <div class="media post_item">
                                        <img style="width: 60px;height: 60px;" src="img/f-icons/powerpoint.png" alt="post">
                                        <div class="media-body">
                                            <a href="blog-details.html">
                                                <h3>Scum.ppt</h3>
                                            </a>
                                            <p>Powerpoint</p>
                                        </div>
                                    </div>
                                    
                                        </aside>
                                    </div>
                                    <div class="blog_right_sidebar col-lg-5" style="float: left; padding: 10px;margin: 5px;">
                                        <aside class="single_sidebar_widget popular_post_widget">
                                    <div class="media post_item">
                                        <img style="width: 60px;height: 60px;" src="img/f-icons/word.png" alt="post">
                                        <div class="media-body">
                                            <a href="blog-details.html">
                                                <h3>Scum.docx</h3>
                                            </a>
                                            <p>Word</p>
                                        </div>
                                    </div>
                                    
                                        </aside>
                                    </div>
                                    <div class="blog_right_sidebar col-lg-5" style="float: left; padding: 10px;margin: 5px;">
                                        <aside class="single_sidebar_widget popular_post_widget">
                                    <div class="media post_item">
                                        <img style="width: 60px;height: 60px;" src="img/f-icons/exel.png" alt="post">
                                        <div class="media-body">
                                            <a href="blog-details.html">
                                                <h3>Scum</h3>
                                            </a>
                                            <p>Excel</p>
                                        </div>
                                    </div>
                                    
                                        </aside>
                                    </div>

                            </div>
                                
                            
                        </div>
                        
                    </div>
                    <div class="feedeback">
                        
                        <textarea name="feedback" class="form-control" cols="10" rows="10" placeholder="Add a comment"></textarea>
                        <div  style="margin-top: 20px;" class="mt-10 text-right">

                            <a href="#" class="genric-btn info">Submit</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 right-contents post"  style="margin-bottom: 15px;"> 
                    
                    <div class="content" >
                        
                        <div class="comments-area mb-30" >
                            <div class="comment-list"  >
                                <div class="single-comment single-reviews justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img class="profile-img" style="border-radius: 50%;" src="img/profile-img/avatar2.png" alt="">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">Lai Manh Dzung</a></h5>
                                            <p class="data-target">
                                                Tuesday, March 31, 2020
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="col-lg-12">
                                        <p>
                                          Slide 1
                                          <br>
                                          Click to download the file.  
                                        </p>
                                    </div>
                                    <div class="blog_right_sidebar col-lg-5" style="float: left; padding: 10px;margin: 5px;">
                                        <aside class="single_sidebar_widget popular_post_widget">
                                    <div class="media post_item">
                                        <img style="width: 60px;height: 60px;" src="img/f-icons/powerpoint.png" alt="post">
                                        <div class="media-body">
                                            <a href="blog-details.html">
                                                <h3>Scum.ppt</h3>
                                            </a>
                                            <p>Powerpoint</p>
                                        </div>
                                    </div>
                                    
                                        </aside>
                                    </div>
                                    <div class="blog_right_sidebar col-lg-5" style="float: left; padding: 10px;margin: 5px;">
                                        <aside class="single_sidebar_widget popular_post_widget">
                                    <div class="media post_item">
                                        <img style="width: 60px;height: 60px;" src="img/f-icons/word.png" alt="post">
                                        <div class="media-body">
                                            <a href="blog-details.html">
                                                <h3>Scum.docx</h3>
                                            </a>
                                            <p>Word</p>
                                        </div>
                                    </div>
                                    
                                        </aside>
                                    </div>
                                    <div class="blog_right_sidebar col-lg-5" style="float: left; padding: 10px;margin: 5px;">
                                        <aside class="single_sidebar_widget popular_post_widget">
                                    <div class="media post_item">
                                        <img style="width: 60px;height: 60px;" src="img/f-icons/exel.png" alt="post">
                                        <div class="media-body">
                                            <a href="blog-details.html">
                                                <h3>Scum</h3>
                                            </a>
                                            <p>Excel</p>
                                        </div>
                                    </div>
                                    
                                        </aside>
                                    </div>

                            </div>
                                
                            
                        </div>
                        
                    </div>
                    <div class="feedeback">
                        
                        <textarea name="feedback" class="form-control" cols="10" rows="10" placeholder="Add a comment"></textarea>
                        <div  style="margin-top: 20px;" class="mt-10 text-right">

                            <a href="#" class="genric-btn info">Submit</a>
                        </div>
                    </div>
                </div>
                 
                 </div>

            </div>
        
    </section>







</div>
 <!-- End Content -->