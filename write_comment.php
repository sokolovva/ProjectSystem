<?php
require "db_config.php";
session_start();

$project=$_SESSION['project'];
$username=$_SESSION['username'];
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
<li>
    <a href='projects.php'>Проекти</a>
</li>
        </ul>
</div>";
    } ?>
     
</div> <button class="top-right"  onclick="window.location.href='projects.php'">Назад</button>
<?php echo "<p class='info add'> Напиши коментар за ".$pr['title']."</p>"; ?>
<form method='POST' class='smaller'>
        <textarea rows='6' cols='70' name='comment'></textarea>
        <input type='submit' name='submitComment' value='Напиши коментар'>
        </form>
</body>


<?php
    if (isset($_POST['comment'])){
        $comment= $_POST['comment'];
        $sql = "INSERT INTO `comments` (`comment`, `author`) VALUES ('".$comment."', '".$username."');";
        $query = $conn->query($sql) or die(" Не успяхме да добавим този коментар!");
            $comments = "SELECT comments FROM projects WHERE id= ".$pr['id'].";";
            $comm = $conn->query($comments) or die(" lala");
            $comms = $comm->fetch(PDO::FETCH_ASSOC);
            $comments = explode(" ", $comms);
            array_push($comments, "apple");
            $comm = $comm ." ". $addedComment['id'];
            $sql = "UPDATE projects set comments = $comm where id=".$pr['id']."');";
            $query = $conn->query($sql) or die(" haha");
            $comms = $query->fetch(PDO::FETCH_ASSOC);
            echo $comms;
            header("location: success_operation.html");
    }
    ?>