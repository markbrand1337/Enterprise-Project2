<?php
$cuser = new c_User();

$data = $cuser->getTutorList();


$userlist = $data['UserList'];

if (
	isset($_GET['id'])
	&& filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))
) {
	$id = $_GET['id'];
	$cclassroom = new c_Classroom();
	$data = $cclassroom->getOneClassroom($id);
	$classroom = $data['OneClassroom'];
} else {
	echo '<script> location.replace("classroom.php"); </script>';
}


if (isset($_POST['submit'])) {


	if (isset($_POST['name'])) $name = $_POST['name'];
	if (isset($_POST['tutor_id'])) $tutor_id = $_POST['tutor_id'];
	if (isset($_POST['note'])) $note = $_POST['note'];

	if (
		isset($_POST['name']) && isset($_POST['tutor_id']) && isset($_POST['note'])
		&& strlen($_POST['name']) > 0 && strlen($_POST['name']) < 40
		&& strlen($_POST['note']) > 0 && strlen($_POST['note']) < 40
	) {
		$controller = new c_Classroom();
		$controller->EditClassroom($id, $name, $tutor_id, $note);
		$cuser->emailNotification($tutor_id, $id);
	}
}
?>



<!-- Content -->
<div class="container">
	<div class="card col-sm-12 col-md-6 mb-5 mx-auto text-white bg-white">
		<h2 class="pt-4 text-dark card-title text-center">Edit Classroom</h2>
		<form action="#" method="post" class="center p-3 pb-4">
			<h3 class="pt-4 text-dark card-title">Class Name</h3>
			<h4 class=" bg-danger text-white"></h4>
			<input type="text" class="col-12 single-input-primary form-control form-control-lg border border-info" name="name" required="required" pattern="[A-Za-z0-9 ]{3,40}" placeholder="Only accept alphabetic, numeric characters and spaces." value="<?= $classroom->name ?>" />


			<h3 class="pt-4 text-dark  card-title">Tutor</h3>

			<div class="form-select">
				<select class="form-control form-control-lg border border-info" name="tutor_id" id="tutor_id">
					<option value="0">No Tutor Yet</option>
					<?php
					foreach ($userlist as $tutor) {
						if ($tutor->user_id == $classroom->tutor_id) {
					?>
							<option value="<?= $tutor->user_id ?>" selected><?= $tutor->first_name ?> <?= $tutor->last_name ?></option>
							<?php
						} else { { ?>
								<option value="<?= $tutor->user_id ?>"><?= $tutor->first_name ?> <?= $tutor->last_name ?></option>
					<?php   }
						}
					}
					?>
				</select>
			</div>
			<h3 class="pt-4 text-dark card-title">Notes</h3>
			<h4 class=" bg-danger text-white"></h4>
			<input type="text" class="col-12 single-input-primary form-control form-control-lg border border-info" name="note" required="required" pattern="^.{1,40}$" placeholder="Maximum of 40 characters." value="<?= $classroom->note ?>" />
			<div class="pt-3">
				<input type="submit" class="genric-btn success circle px-5 py-1 col-sm-12 mb-sm-3 col-md-4 float-right" value="Submit" name="submit">

				<a href="classroom.php" class="genric-btn success circle px-5 py-1 col-sm-12 mb-sm-3 col-md-4 float-left">Back</a>
			</div>
		</form>
	</div>







</div>
<!-- End Content -->