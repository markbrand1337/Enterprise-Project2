<?php
$creport = new c_Report();
$data = $creport->getAllMessageCount();
$all_message_count = $data['MessageCount']->message_count;

$data = $creport->getAverageSentMessageCount();
$average_sent_count = round($data['MessageCount']->message_average, 1);

$data = $creport->getAverageTutorSentMessageCount();
$average_tutor_sent_count = round($data['MessageCount']->message_average, 1);

$data = $creport->getAverageStudentSentMessageCount();
$average_student_sent_count = round($data['MessageCount']->message_average, 1);

$data = $creport->getAllCommentCount();
$all_comment_count = $data['CommentCount']->comment_count;
$data = $creport->getAllDocumentCount();
$all_document_count = $data['DocumentCount']->document_count;

$data = $creport->getAverageDocumentCount();
$average_document_count = round($data['DocumentCount']->document_average, 1);

$data = $creport->getAverageClassDocumentCount();
$average_class_document_count = round($data['DocumentCount']->document_average, 1);

$data = $creport->getAverageStudentDocumentCount();
$average_student_document_count = round($data['DocumentCount']->document_average, 1);

$data = $creport->getAverageTutorDocumentCount();
$average_tutor_document_count = round($data['DocumentCount']->document_average, 1);

$data = $creport->getAllPostCount();
$all_post_count = $data['PostCount']->post_count;

$data = $creport->getAveragePostCount();
$average_post_count = round($data['PostCount']->post_average, 1);

$data = $creport->getAveragePostCountPerClass();
$average_class_post_count = round($data['PostCount']->post_average, 1);

$data = $creport->getAverageStudentPostCount();
$average_student_post_count = round($data['PostCount']->post_average, 1);

$data = $creport->getAverageTutorPostCount();
$average_tutor_post_count = round($data['PostCount']->post_average, 1);

$data = $creport->getInactiveStudentCount();
$inactive_7_count = $data['StudentCount']->student_count;

$data = $creport->getInactiveStudentCount2();
$inactive_28_count = $data['StudentCount']->student_count;

$data = $creport->getInactiveStudent();
$inactive_7 = $data['StudentList'];

$data = $creport->getInactiveStudent2();
$inactive_28 = $data['StudentList'];

$data = $creport->getAvailableStudentCount();
$student_count = $data['StudentCount'][0]->student_count;

$data = $creport->getAvailableStudent();
$studentlist = $data['StudentList'];
?>



<!-- Content -->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="overlay"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="banner_content text-center">
						<h2 class="text-uppercase">Report</h2>
						<!-- <p>Description of page</p> -->
						<div class="page_link">
							<a href="index.php">Home</a>
							<a href="report.php">Report</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="container">

	<div class="row my-2 py-3 justify-content-around">
		<div class="card-columns">
			<div class="card text-center ">
				<div class="card-header bg-primary">
					<h3 class="text-white">Message</h3>
				</div>
				<div class="card-body">
					<h5 class="card-title">All Message Count</h5>
					<p class="card-text display-3"><?= $all_message_count ?></p>

				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<h5 class="card-title">Average Message per Person</h5>
						<p class="card-text display-3"><?= $average_sent_count ?></p>
					</li>

					<li class="list-group-item">
						<h5 class="card-title">Average Message per Tutor</h5>
						<p class="card-text display-3"><?= $average_tutor_sent_count ?></p>
					</li>

					<li class="list-group-item">
						<h5 class="card-title">Average Message per Student</h5>
						<p class="card-text display-3"><?= $average_student_sent_count ?></p>
					</li>
				</ul>
			</div>
			<div class="card text-center ">
				<div class="card-header bg-primary text-white">
					<h3 class="text-white">Comment</h3>
				</div>
				<div class="card-body">
					<h5 class="card-title">All Comment Count</h5>
					<p class="card-text display-3"><?= $all_comment_count ?></p>

				</div>
			</div>
			<div class="card text-center ">
				<div class="card-header bg-primary">
					<h3 class="text-white">Document</h3>
				</div>
				<div class="card-body">
					<h5 class="card-title">All Document Count</h5>
					<p class="card-text display-3"><?= $all_document_count ?></p>

					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<h5 class="card-title">Average Document per Person</h5>
							<p class="card-text display-3"><?= $average_document_count ?></p>
						</li>

						<li class="list-group-item">
							<h5 class="card-title">Average Document per Class</h5>
							<p class="card-text display-3"><?= $average_class_document_count ?></p>
						</li>
						<li class="list-group-item">
							<h5 class="card-title">Average Document per Tutor</h5>
							<p class="card-text display-3"><?= $average_tutor_document_count ?></p>
						</li>
						<li class="list-group-item">
							<h5 class="card-title">Average Document per Student</h5>
							<p class="card-text display-3"><?= $average_student_document_count ?></p>
						</li>
					</ul>
				</div>


			</div>

			<div class="card text-center ">
				<div class="card-header bg-primary">
					<h3 class="text-white">Post</h3>
				</div>
				<div class="card-body">
					<h5 class="card-title">All Post Count</h5>
					<p class="card-text display-3"><?= $all_post_count ?></p>

				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<h5 class="card-title">Average Post per Person</h5>
						<p class="card-text display-3"><?= $average_post_count ?></p>
					</li>

					<li class="list-group-item">
						<h5 class="card-title">Average Post per Class</h5>
						<p class="card-text display-3"><?= $average_class_post_count ?></p>
					</li>
					<li class="list-group-item">
						<h5 class="card-title">Average Post per Tutor</h5>
						<p class="card-text display-3"><?= $average_tutor_post_count ?></p>
					</li>
					<li class="list-group-item">
						<h5 class="card-title">Average Post per Student</h5>
						<p class="card-text display-3"><?= $average_student_post_count ?></p>
					</li>
				</ul>
			</div>





		</div>
		<div class="row my-3 card-columns">
			<div class="card text-left col-12 ">
				<div class="card-header bg-primary">
					<h3 class="text-white">Student without Class</h3>
				</div>
				<div class="card-body">
					<h5 class="card-title">Student without Class : <?= $student_count ?></h5>
					<!-- <p class="card-text display-3"><?= $student_count ?></p> -->

				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<div class="" style="overflow-y: scroll; max-height: 350px; ">
							<table id="" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>User Id</th>
										<th>Name</th>

										<th>Email</th>
										<th>Role</th>
										<th>Dashboard Access</th>
									</tr>
								</thead>
								<tbody>
									<?php

									foreach ($studentlist as $user) {
									?>
										<tr>
											<td><?= $user->user_id ?></td>
											<td><?= $user->first_name ?> <?= $user->last_name ?></td>

											<td> <?= $user->email ?></td>

											<?php if ($user->role == 1) {
												echo '<td> Student</td>';
											} else if ($user->role == 2) {
												echo '<td> Tutor</td>';
											} else if ($user->role == 0) {
												echo '<td> Staff</td>';
											} else {
												echo '<td> Undecided</td>';
											} ?>



											<td>
												<a href="dashboard.php?id=<?= $user->user_id ?>"><i class="fa fa-fw fa-user" style="color:#2D67EA; font-size:20px;" title="Access this user dashboard."></i></a>

												<!-- <a href="user_delete.php?id=<?= $user->user_id ?>" onclick="return confirm('Are you sure you want to delete this?'); "><i class="fa fa-fw fa-trash" style="color:#EF2D1E; font-size:20px;"></i></a> -->
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>User Id</th>
										<th>Name</th>

										<th>Email</th>
										<th>Role</th>
										<th>Dashboard Access</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</li>


				</ul>
			</div>

			<div class="card text-left col-12 ">
				<div class="card-header bg-primary">
					<h3 class="text-white">Inactive Student in the last 7 days</h3>
				</div>
				<div class="card-body">
					<h5 class="card-title">Inactive Student : <?= $inactive_7_count ?></h5>
					<!-- <p class="card-text display-3"><?= $student_count ?></p> -->

				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<div class="" style="overflow-y: scroll; max-height: 350px; ">
							<table id="" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>User Id</th>
										<th>Name</th>

										<th>Email</th>
										<th>Role</th>
										<th>Dashboard Access</th>
									</tr>
								</thead>
								<tbody>
									<?php

									foreach ($inactive_7 as $user) {
									?>
										<tr>
											<td><?= $user->user_id ?></td>
											<td><?= $user->first_name ?> <?= $user->last_name ?></td>

											<td> <?= $user->email ?></td>

											<?php if ($user->role == 1) {
												echo '<td> Student</td>';
											} else if ($user->role == 2) {
												echo '<td> Tutor</td>';
											} else if ($user->role == 0) {
												echo '<td> Staff</td>';
											} else {
												echo '<td> Undecided</td>';
											} ?>



											<td>
												<a href="dashboard.php?id=<?= $user->user_id ?>"><i class="fa fa-fw fa-user" style="color:#2D67EA; font-size:20px;" title="Access this user dashboard."></i></a>

												<!-- <a href="user_delete.php?id=<?= $user->user_id ?>" onclick="return confirm('Are you sure you want to delete this?'); "><i class="fa fa-fw fa-trash" style="color:#EF2D1E; font-size:20px;"></i></a> -->
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>User Id</th>
										<th>Name</th>

										<th>Email</th>
										<th>Role</th>
										<th>Dashboard Access</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</li>


				</ul>
			</div>

			<div class="card text-left col-12 ">
				<div class="card-header bg-primary">
					<h3 class="text-white">Inactive Student in the last 28 days</h3>
				</div>
				<div class="card-body">
					<h5 class="card-title">Inactive Student : <?= $inactive_28_count ?></h5>
					<!-- <p class="card-text display-3"><?= $student_count ?></p> -->

				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item">
						<div class="" style="overflow-y: scroll; max-height: 350px; ">
							<table id="" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>User Id</th>
										<th>Name</th>

										<th>Email</th>
										<th>Role</th>
										<th>Dashboard Access</th>
									</tr>
								</thead>
								<tbody>
									<?php

									foreach ($inactive_28 as $user) {
									?>
										<tr>
											<td><?= $user->user_id ?></td>
											<td><?= $user->first_name ?> <?= $user->last_name ?></td>

											<td> <?= $user->email ?></td>

											<?php if ($user->role == 1) {
												echo '<td> Student</td>';
											} else if ($user->role == 2) {
												echo '<td> Tutor</td>';
											} else if ($user->role == 0) {
												echo '<td> Staff</td>';
											} else {
												echo '<td> Undecided</td>';
											} ?>



											<td>
												<a href="dashboard.php?id=<?= $user->user_id ?>"><i class="fa fa-fw fa-user" style="color:#2D67EA; font-size:20px;" title="Access this user dashboard."></i></a>

												<!-- <a href="user_delete.php?id=<?= $user->user_id ?>" onclick="return confirm('Are you sure you want to delete this?'); "><i class="fa fa-fw fa-trash" style="color:#EF2D1E; font-size:20px;"></i></a> -->
											</td>
										</tr>
									<?php
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>User Id</th>
										<th>Name</th>

										<th>Email</th>
										<th>Role</th>
										<th>Dashboard Access</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</li>


				</ul>
			</div>

		</div>
	</div>







</div>
<!-- End Content -->