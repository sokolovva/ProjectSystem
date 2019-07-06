<?php
require "db_config.php";
session_start();

$project=$_SESSION['project'];
$sql = "SELECT * FROM projects WHERE id='$project'";
            $query = $conn->query($sql) or die(" Не съществува такъв проект!");
            $pr = $query->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Проекти</title> 
    <link rel="stylesheet" href="stylesheets/reset.css"> 
    <link rel="stylesheet" href="stylesheets/style.css">
    <link rel="stylesheet" href="stylesheets/checkbox.css">
</head>
<body>


 <header>
        <img src="pictures/logo.png" alt="logo" id='logo'>
        <h1>Система за управление на проекти</h1>
    </header>
    
</div> <button class="top-right"  onclick="window.location.href='projects.php'">Назад</button>
    <?php
    if ($_SESSION['is_student'] == true) {
        echo "<div class='menu'>
                    <ul>
                    <li>
                <a href='profiles.php'>Моят профил</a>
            </li>
            <li>
                <a href='projects.php'>Проекти</a>
            </li>
                    </ul>
            </div>";
    } else {
        echo "<div class='menu'>
        <ul>
        <li> <a href='projects.php'>Проекти</a></li></ul></div>";
    }

    
    if($pr['comments'] == ''){
        echo "<p class='info infoCenter'>Този проект все още няма коментари</p>";
    } else {
        
      $comments = explode(" ", $pr['comments']);
        $length = count($comments);
        if($length > 0)
        {
            echo "<table class='table'>
        <tr>
        <th>Автор</th>
        <th>Коментар</th>
         </tr>";
            for ($i=0;$i<$length;$i++){
                $sql = "SELECT * FROM comments WHERE id=$comments[$i]";
                $query = $conn->query($sql) or die("Не съществува такъв коментар!");
                $comment = $query->fetch(PDO::FETCH_ASSOC);
                echo " <tr>
                <th>".$comment['author']."</th>
                <th>".$comment['comment']."</th>
                 </tr>";
            }
            echo "</table>";

        }
             
    }
    ?>
     
    <button class='bigger' onclick="window.location.href='write_comment.php'">Напиши коментар</button>
</body>
