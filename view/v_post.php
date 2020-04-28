<?php
include_once("controller/c_post.php");
require_once("controller/c_classroom.php");
require_once("controller/c_comment.php");
include_once("controller/c_userlog.php");

$cuserlog = new c_UserLog();

function updateactivity()
{
	if (isset($_SESSION['user_id'])) {
		$user_id = $_SESSION['user_id'];
		$cuserlog = new c_UserLog();
		$res = $cuserlog->getOneUserLog($user_id);
		if ($res == null) {
			$cuserlog->AddUserLog($user_id);
		} else {
			$cuserlog->EditUserLog($user_id);
		}
	}
}
//updateactivity();
$cpost = new c_Post();
$ccom = new c_Comment();

$cuser = new c_User();
$data = $cuser->getList();
$userlist = $data['UserList'];

$cclass = new c_Classroom();
$data = $cclass->getList();
$classroomlist = $data['ClassroomList'];
// print_r($classroomlist);

$id = 0;

if (isset($_SESSION['user_id'])) {
	if (isset($_SESSION['role'])) {
		$role = $_SESSION['role'];
	}
	$user_id = $_SESSION['user_id'];
	$data = $cuser->getOneUser($user_id);
	$oneuser = $data['OneUser'];

	if (
		isset($_GET['id'])
		&& filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))
	) {
		$id = $_GET['id'];

		$data = $cclass->getOneClassroom($id);
		$classroom = $data['OneClassroom'];

		// $name =
		$data = $cpost->getAllClassPost($id);
		$postlist = $data['PostList'];
		// print_r($documentlist);
		if (isset($_POST['submit'])) {
			if (isset($_POST['content'])) {
				$content = $_POST['content'];
				$cpost->AddPost($content, $user_id, $id);
				updateactivity();
				echo '<script> location.replace("post.php?id=' . $id . '"); </script>';
			}
		}
	} else {
		//id not exist


		$data = $cpost->getAllUserPost($user_id);
		$postlist = $data['PostList'];
		if (isset($_POST['submit'])) {
			if (isset($_POST['content'])) {
				$content = $_POST['content'];
				$cpost->AddPost($content, $user_id, $id);
				updateactivity();
				echo '<script> location.replace("post.php"); </script>';
			}
		}
	}
} else {
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
					<?php if ($id == 0) { ?>
						<div class="banner_content text-center">
							<h2 class="text-uppercase">All User Post</h2>
							<!-- <p>Description of page</p> -->
							<div class="page_link">
								<a href="index.php">Home</a>
								<!-- <a href="#">User</a> -->
								<?php echo '<a href="classroom_detail.php?id=' . $user_id . '">' . $oneuser->first_name . ' ' . $oneuser->last_name . '</a>'; ?>

								<?php echo '<a href="post.php">All User Post</a>'; ?>
							</div>
						</div>
					<?php	} else { ?>
						<div class="banner_content text-center">
							<h2 class="text-uppercase">All Class Post</h2>
							<!-- <p>Description of page</p> -->
							<div class="page_link">
								<a href="index.php">Home</a>
								<a href="classroom.php">Classroom List</a>
								<?php echo '<a href="classroom_detail.php?id=' . $id . '">' . $classroom->name . '</a>'; ?>
								<?php echo '<a href="post.php?id=' . $id . '">All Class Post</a>'; ?>
							</div>
						</div>
					<?php	} ?>

				</div>
			</div>
		</div>
	</div>
</section>
<div class="container">
	<div name="post" class="col-12 pb-5 row pt-5">

		<div class="card col-md-8 col-sm-12 mt-3 mx-auto">
			<div class="card-body pt-5">
				<h5 class="card-title pb-0 mb-0"><?= $oneuser->first_name ?> <?= $oneuser->last_name ?></h5>
				<form method="POST">

					<textarea type="text" class="col-12 single-input-primary form-control form-control-lg border border-info mt-3" name="content" required="required" pattern="^.{1,255}$" placeholder="What do you want to say?"></textarea>
					<div class="pt-3">
						<h4><input type="submit" class="genric-btn success circle px-5 py-1 col-sm-12 mb-sm-3 col-md-4 float-right" value="Post" name="submit"></h4>
					</div>
				</form>

			</div>
		</div>


		<!-- <div class="card col-md-8 col-sm-12 mt-3 mx-auto">
				  <div class="card-body">
				    <h5 class="card-title pb-0 mb-0">User Name</h5>
				    <p class="card-text text-muted"><small>Posted on 2020-01-22</small></p>
				    <p class="card-text">Meeting Note to describe the general idea of the meeting.Meeting Note to describe the general idea of the meeting.</p>
				    
				    <a href="post_detail.php?id=0" class="btn btn-primary">Go to Post</a>
				  </div>
				</div> -->

		<?php foreach ($postlist as $post) { ?>
			<div class="card col-md-8 col-sm-12 mt-3 mx-auto">
				<div class="card-body">
					<?php foreach ($userlist as $user) {
						if ($user->user_id == $post->user_id) {
							if ($post->in_class == 0) {
								echo '<h5 class="card-title pb-0 mb-0">' . $user->first_name . ' ' . $user->last_name . '</h5>';
							} else {
								foreach ($classroomlist as $class) {
									if ($class->classroom_id == $post->in_class) {
										echo '<h5 class="card-title pb-0 mb-0">' . $user->first_name . ' ' . $user->last_name . ' > ' . $class->name . '</h5>';
									}
								}
							}
						}
					}


					?>

					<p class="card-text text-muted"><small><?= $post->created_at ?></small></p>
					<p class="card-text"><?= $post->content ?></p>
					<div class="row px-4 py-1">
						<h5><i class="lnr lnr-bubble pr-2"></i></h5>
						<?php echo '<h6 class="card-title pb-0 mb-0">' . $ccom->getCommentCount($post->post_id) . '</h6>';
						?>
					</div>
					<?php echo '<a href="post_detail.php?id=' . $post->post_id . '" class="btn btn-primary">Go to Post</a>';
					?>
				</div>
			</div>

		<?php	} ?>

	</div>







</div>

<!-- End Content -->