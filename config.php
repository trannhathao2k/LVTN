<?php
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DB", "webnhakhoa");
define("ROOT", dirname(__FILE__));
define("BASE_URL", "http://localhost/".ROOT."/");

$mysqli = new mysqli(HOST, USER, PASS, DB);
if ($mysqli->connect_error) {
    die("Kết nối CSDL thất bại!<br>--> ".$mysqli->connect_error."<br>");
    exit();
}

?>