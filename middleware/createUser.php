<?php
require($_SERVER['DOCUMENT_ROOT'] . '/controllers/User.php');
$db = new User();
$name = $_POST['name'];
$password = $_POST['password'];
$role = $_POST['role_id'];

$response = $db->createUser(json_encode([
    'name'=>$name,
    'password'=>hash('sha256',$password),
    'role'=>$role
]));

header('Location: ../index.php?message='.json_decode($response)->message);
