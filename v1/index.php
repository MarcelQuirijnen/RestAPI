<?php
require __DIR__ . "/inc/bootstrap.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
echo 'parse '.json_encode($_SERVER['REQUEST_URI']).'<br>';
$uri = explode( '/', $uri );

// echo 'uri '.json_encode($uri).'<br>';
// echo 'uri[1]'.json_encode($uri[1]).'<br>';
// //echo 'uri[2]'.json_encode($uri[2]).'<br>';
// //echo json_encode($uri[3]);

// exit();

if ((isset($uri[2]) && $uri[2] != 'user') || !isset($uri[3])) {
    header("HTTP/1.1 404 Not Found");
    exit();
}

require PROJECT_ROOT_PATH . "/Controller/Api/UserController.php";

$objFeedController = new UserController();
$strMethodName = $uri[3] . 'Action';
$objFeedController->{$strMethodName}();

?>