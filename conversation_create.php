<?php

require_once("controller/c_conversation.php");
$controller = new c_Conversation();
//$controller->getConversation();
if (
	isset($_GET['id'])
	&& filter_var($_GET['id'], FILTER_VALIDATE_INT, array('min_range' => 1))
	&& isset($_GET['id2'])
	&& filter_var($_GET['id2'], FILTER_VALIDATE_INT, array('min_range' => 1))
) {
	$id = $_GET['id'];
	$id2 = $_GET['id2'];
	$controller = new c_Conversation();
	$data = $controller->getOneConversation2($id, $id2);
	// print_r($data);
	$conv_id = $data->conversation_id;
	if ($data == null) {
		$controller->AddConversation($id, $id2);
	} else {
		//echo '<script> location.replace("conversation.php?conv_id=' . $conv_id . '"); </script>';
		echo '<script> location.replace("conversation.php"); </script>';
	}
}
