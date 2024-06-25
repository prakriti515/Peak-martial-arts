<?php
session_start();
if(isset($_SESSION["user"])){
header("Location: index.php");
}
?>
<?php require('navigation.php'); ?>
<div class="container">
    <div id="sign-up">
        <?php
         if(isset($_POST["login"])){
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once "database.php";
            $sql ="SELECT * FROM user WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($user){
                if(password_verify($password, $user["password"])){
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert'>Password does not match</div>";
                }
            }else{
                echo"<div class='alert'>Email does not match</div>";
            }

         }

        ?>
        <div class="login">
            <div class="form">
                <form action="login.php" method="post">
                    <div class="row">
                        <div class="col">
                        <h3 class="text-center p-2 pb-4">Login</h3>
                        </div>
                    </div>
                    <div class="form-group">
                    <input type="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                    <input type="password" name="password" placeholder="Enter password" >
                    </div>
                    <div class="form-btn">
                        <input type="submit" value="Login" name="login">
                    </div>
                </form><br><br>
                <div>
                    <P>Not registered yet <a href="registration.php">Register Here</a></P>
                </div>
            </div>
        </div>
        
    </div>
    </div>
</body>
</html>