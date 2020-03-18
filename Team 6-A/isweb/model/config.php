<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'isweb');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$conn=$db;

if ($db->connect_error) {
	echo '<script language="javascript">';
	echo 'alert("Error Connecting Database")';
	echo '</script>';
	die();
}
?>