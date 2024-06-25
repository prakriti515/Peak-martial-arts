<?php
session_start();
if(isset($_SESSION["user"])){
header("Location: login.php");
}
?>
<?php require('navigation.php'); ?>
    <div class="container">
        <div id="Register">
        <?php 
        if(isset($_POST["submit"])){
            $fullname=$_POST["fullname"];
            $email=$_POST["email"];
            $password=$_POST["password"];
            $passwordRepeat=$_POST["Re-password"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $errors = array();

            if (empty($fullname) OR empty($email) OR empty($password) OR empty($passwordRepeat)){
                array_push($errors, "All fields are required");
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                array_push($errors, "Email is not valid");
            }
            if (strlen($password)<8){
                array_push($errors, "password must be at least 8 chatactes long");
            }
            if ($password!==$passwordRepeat){
                array_push($errors, "Password does not match");
            }
            
            require_once "database.php";
            $sql ="SELECT * FROM user WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = Mysqli_num_rows($result);
            if($rowCount>0){
                array_push($errors, "Email already exists!");
            }

            if(count($errors)>0){
               foreach($errors as $error) {
                echo"<div class='alert alert-danger '>$error</div>";
               }
            }else{
              
              $sql = "INSERT INTO user (fullname, email, password) VALUES (?, ?, ?)";
              $stmt = mysqli_stmt_init($conn);
              $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
              if($prepareStmt){
                Mysqli_stmt_bind_param($stmt,"sss",$fullname,$email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo"<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
              }
           }
        }
        ?>
        <div class="register-form">
            <h2>Registration Form</h2>
        <form action="registration.php" method="post">
            <div class="form-group">
            <h3>Fullname</h3> <input type="text" class="form-control" name="fullname" placeholder="Enter yourFull Name">
            </div>
            <div class="form-group">
            <h3>Email</h3><input type="email" class="form-control" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
            <h3>Password</h3><input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
            <h3>Re-password</h3><input type="password" class="form-control" name="Re-password" placeholder="Re-password">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary"value="Register" name="submit">
            </div>
        </form><br><br>
        <div><P>Already Registered  <a href="login.php">Login Here</a></P></div>
        </div>
    </div>
</div>
</body>
</html>