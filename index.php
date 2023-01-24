<?php
session_start();

require_once "classes/User.php";

$users = User::getUsers();

$pageBody = "";
foreach($users as $u){
    $pageBody .= "<div class='grid-x'>";
    $pageBody .= "<div class='cell small-6'>" . $u['name'] . "</div>";
    $pageBody .= "<div class='cell small-1' id='points_".$u['id']."'>" . $u['points'] . "</div>";
    $pageBody .= "<div class='cell small-1'><a class='tiny button' id='up_25_".$u['id']."'>+25</a></div>";
    $pageBody .= "<div class='cell small-1'><a class='tiny button' id='up_50_".$u['id']."'>+50</a></div>";
    $pageBody .= "<div class='cell small-1'><a class='tiny button' id='up_75_".$u['id']."'>+75</a></div>";
    $pageBody .= "<div class='cell small-1'><a class='tiny button' id='up_100_".$u['id']."'>+100</a></div>";
    $pageBody .= "</div>";
}

include "html/index.html";
?>

