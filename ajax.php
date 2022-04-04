<?php
ob_start();
date_default_timezone_set("Asia/Manila");

$action = $_GET['action'];
include 'api.php';
$crud = new Action();

if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'signup'){
	$save = $crud->signup();
	if($save)
		echo $save;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'save_account'){
	$save = $crud->save_account();
	if($save)
		echo $save;
}
if($action == 'save_account2'){
	$save2 = $crud->save_account2();
	if($save2)
		echo $save2;
}
if($action == 'save_user_gcash_donate'){
	$save = $crud->save_user_gcash_donate();
	if($save)
		echo $save;
}
if($action == 'save_gcash_donate'){
	$save = $crud->save_gcash_donate();
	if($save)
		echo $save;
}

// end call
ob_end_flush();
?>
