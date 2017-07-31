<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include_once "classes/Page_Data.class.php";
$pageData = new Page_Data();
$pageData->title = "Matthew's PHP Thing";
$pageData->content = include_once "views/navigation.php";
$pageData->css = "<link href='css/layout.css' rel='stylesheet' />";
$navigationIsClicked = isset($_GET['page']);
if ($navigationIsClicked) {
    $fileToLoad = $_GET['page'];
} else {
    $fileToLoad = "home";
}
$pageData ->content .= include_once "views/$fileToLoad.php";
$pageData->embeddedStyle = "
<style>
nav a[href *= '?page=$fileToLoad']{
    padding:3px;
    background-color:white;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
</style>";
$page = include_once "templates/page.php";
echo $page;