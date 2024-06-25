<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <title>Peak Martial Arts</title>
</head>
<body>
    <!--first section-->
    <div class="navbar">
        <h1>
            <a href="#index.php"></a>
            <img src="images/logoo.png" class="logo">
        </h1>
        <nav>
            <ul>
                <li><a href="index.php" class="active">Home</a></li>                    
                <li><a href="#about">About</a></li>
                    <li><a href="#class">Courses</a></li>
                    <li><a href="#time">Time table</a></li>
                    <li><a href="#prices">Prices</a></li>
                    <li><a href="#trainer">Instructur</a></li>
                    <li><a href="#contact">Contact</a></li>
                <?php 
                if(isset($_SESSION["user"])){
                    echo '<a href="logout.php" class="logout">Logout</a>';
                }else{
                    echo '<a href="login.php" class="login" style="background-color: white;"> <b> Login</b></a>';
                }
                ?>
                </li>
                
            </ul>
        </nav>
    </div>
    
    
            