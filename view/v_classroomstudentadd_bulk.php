<?php
include_once("controller/c_classroom.php");


$cuser = new c_User();
$data = $cuser->getStudentList();
$userlist = $data['UserList'];

if (
	isset($_GET['id'])
	&& filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))
) {
	//class id
	$id = $_GET['id'];
	// $data = $cuser->getAllStudentNotFromClass($id);
	$data = $cuser->getAvailableStudent();
	$userlist = $data['UserList'];
}

if (isset($_POST['subb'])) {
	$name = $_POST["search"];

	$data = $cuser->searchAvailableStudent($name);

	$userlist = $data['UserList'];
}
$cclass = new c_Classroom();
$data1 = $cclass->getList();
$classroomlist = $data1['ClassroomList'];

if (isset($_POST['submit'])) {


	if (isset($_POST['classroom_id'])) $classroom_id = $_POST['classroom_id'];
	if (isset($_POST['student'])) {
		if (!empty($_POST['student'])) {
			$student = $_POST['student'];
		}
	}
	if (!empty($_POST['student']) && isset($_POST['classroom_id'])) {
		foreach ($student as $user_id) {
			// echo $user_id."</br>";
			$controller = new c_ClassroomStudent();
			$controller->AddClassroomStudent($user_id, $classroom_id);
			$cuser->emailNotification($user_id, $classroom_id);
			// echo $classroom_id;
		}
	}
}

?>



<!-- Content -->
<div class="container">

	<div class="card col-sm-12 col-md-6 mb-5 mx-auto bg-white">
		<h2 class="pt-4 text-dark card-title text-center">Add Student to Class</h2>
		<div class="row py-3">
			<form action="" method="post" class="col-12">
				<input type="text" name="search" class="d-inline form-control form-control-lg col-md-8 col-sm-12 border border-info" placeholder="Search by Name">
				<input type="submit" name="subb" value="Search" class="d-inline genric-btn success circle px-4 py-1 col-md-3 col-sm-12">
			</form>

		</div>
		<form action="#" method="post" class="center p-3 pb-4">
			<!-- <input type="hidden" id="custId" name="classroom_id" value="3487"> -->
			<?php echo '<input type="hidden" id="custId" name="classroom_id" value="' . $id . '">' ?>

			<h3 class="pt-4 text-dark  card-title">Add Student</h3>



			<?php
			foreach ($userlist as $student) {
			?>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" name="student[]" value="<?= $student->user_id ?>" id="defaultCheck<?= $student->user_id ?>">
					<label class="form-check-label" for="defaultCheck<?= $student->user_id ?>">
						<?= $student->user_id ?> - <?= $student->first_name ?> <?= $student->last_name ?>
					</label>
				</div>

			<?php
			}
			?>




			<div class="pt-3">
				<h4><input type="submit" class="genric-btn success circle px-5 py-1 col-sm-12 mb-sm-3 col-md-4 float-right" value="Submit" name="submit"></h4>
				<h4><a href="classroom.php" class="genric-btn  circle px-5 py-1 col-sm-12 mb-sm-3 col-md-4 float-left">Back</a></h4>
			</div>
	</div>

	</form>
</div>






</div>
<!-- End Content -->