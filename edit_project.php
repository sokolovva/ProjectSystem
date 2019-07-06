<?php
require "db_config.php";
session_start();


if (isset($_POST['approve'])) {
    $_SESSION['project'] = $_POST['projectId'];

    approve();
}
if (isset($_POST['comment'])) {

    $_SESSION['project'] = $_POST['projectId'];

    writeComment();
}

if (isset($_POST['comments'])) {

    $_SESSION['project'] = $_POST['projectId'];

    seeComments();
}
if (isset($_POST['new_project'])) {
    $_SESSION['project'] = $_POST['projectId'] || $_POST['project'];
    addNewProject();
}


function approve()
{
    require "db_config.php";
    $project =$_SESSION['project'];
    $sql = "SELECT * FROM projects WHERE id='$project'";
    $query = $conn->query($sql) or die(" Не съществува потребител с тези данни!");
    $pr = $query->fetch(PDO::FETCH_ASSOC);
    $sql = "update projects set requested='1' where id='$project';";
    $query = $conn->query($sql) or die(" Не успяхме да одобрим този проект!");

    $sql = "select students from projects where id='$project';";
    $query = $conn->query($sql) or die(" Не успяхме да одобрим този проект!");
    $st = $query->fetch(PDO::FETCH_BOTH);
    array_push($st, $pr['requested']);
    $str = implode(" ",$arr);
    echo $str;
    $sql = "update projects set students='' where id='$project';";
    $sql = "update projects set students='$str' where id='$project';";
    $query = $conn->query($sql) or die(" Не успяхме да одобрим този проект!");
    $sql = "update students set projectId='$project' where username='".$pr['requested']."';";
    $query = $conn->query($sql) or die(" Не успяхме да одобрим този проект!");
}
function writeComment()
{
    header("location: write_comment.php");
}

function seeComments(){
    header("location: comments.php");
}

function addNewProject()
{
    header("location: add_project.php");
}

?>