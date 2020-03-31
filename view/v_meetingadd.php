<?php
if(isset($_GET['id']) 
	&&filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1) ) 
	){
	$id = $_GET['id'];



if(isset($_POST['submit'])){
	if(isset($_POST['meeting_date'])){
		$meeting_date = $_POST['meeting_date'];
		//print_r($meeting_date);
	}
	if(isset($_POST['note']))$note = $_POST['note'];
	if (isset($_POST['meeting_date']) && isset($_POST['note']) && isRealDate($_POST['meeting_date'])) {
		$cmeet = new c_Meeting();
		$cmeet->AddMeeting($meeting_date,$id,$note);
	}
}

}

function isRealDate($date) { 
    if (false === strtotime($date)) { 
        return false;
    } 
    list($year, $month, $day) = explode('-', $date); 
    return checkdate($month, $day, $year);
}

  ?>



 <!-- Content -->
<div class="container">
	<div class="card col-sm-12 col-md-6 mb-5 mx-auto text-white bg-white">
		 <h2 class="pt-4 text-dark card-title text-center">Add New Meeting</h2>
				<form action="#" method="post" class="center p-3 pb-4">
				  <h3 class="pt-4 text-dark card-title">Meeting Date</h3><h4 class=" bg-danger text-white"></h4>
				  <input type="date" class="col-12 single-input-primary form-control form-control-lg border border-info" name="meeting_date" required="required"" />
				  
				<h3 class="pt-4 text-dark card-title">Notes</h3><h4 class=" bg-danger text-white"></h4>
				  <input type="text" class="col-12 single-input-primary form-control form-control-lg border border-info" name="note" required="required" pattern="[A-Za-z0-9 ]{3,40}" placeholder="Only accept alphabetic, numeric characters and spaces."/>			
				  <div class="pt-3">
						<h4><input  type="submit" class="genric-btn success circle px-5 py-1 col-sm-12 mb-sm-3 col-md-4 float-right" value="Submit" name="submit"></h4>
						<!-- <h4><a href="classroom_detail.php" class="genric-btn  circle px-5 py-1 col-sm-12 mb-sm-3 col-md-4 float-left">Back</a></h4> -->
						<?php echo '<h4><a href="classroom_detail.php?id='.$id.'" class="genric-btn  circle px-5 py-1 col-sm-12 mb-sm-3 col-md-4 float-left">Back</a></h4>';?>
					</div> 
					</div> 
				</form> 
	</div>







</div>
 <!-- End Content -->