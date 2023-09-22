<?php
session_start();
include("db.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $mail = $_POST['mail'];
$password = $_POST['pass'];


if (!empty($mail) && !empty($password) && !is_numeric($mail))
{
  $query = "Select * from form where email = '$mail' limit 1";
  $result = mysqli_query($con, $query);
  if($result)
  {
    if($result && mysqli_num_rows($result) > 0)
    {
        $user_data = mysqli_fetch_assoc($result);
        if($user_data['pass'] == $password)
        {
          header("location:./mainpage/main.html");
          die;
        }
    }

  }
  echo"<script type='text/javascript'>alert('wrong username or password')</script>";
}
else{
    echo"<script type='text/javascript'>alert('wrong username or password')</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-image: url(./loginnn.jpeg);
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Set your desired background color */
            margin: 0;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .login {
            /* Set your desired background color */
            padding: 40px;
            border:none;
            box-shadow: -3px -3px 9px #aaa9a9a2,
              3px 3px 7px rgba(147, 149, 151, 0.671); /* Add a subtle box shadow */
            text-align: left;
            border-radius: 50px;
            color: white;
        }

        .login h1 {
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center;
        }

        .login label {  
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .login input[type="email"],
        .login input[type="password"] {
            width: 100%;
            padding: 10px;
            text-align: left;
            margin-bottom: 15px;
            border: 1px solid #ccc; /* Add a border */
            border-radius: 4px;
            font-size: 14px;
        }

        .login input[type="submit"] {
            background-color: #FF3FA4; /* Set your desired button color */
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 40px;
            font-size: 16px;
            cursor: pointer;
        }

        .login input[type="submit"]:hover {
            background-color: #27005D; /* Set your desired hover color */
        }
        p{
            text-align: center;
            color: white;
        }
        button{
            padding:10px;
            border:none;
            border-radius: 40px;
            font-size: medium;
            color:white;
            background-color: #FF3FA4;
        }
        button:hover{
            background-color:#27005D ;
        }
    </style>
    <title>Login Page</title>
</head>
<body>
    <div class="login">
        <h1>LOGIN</h1><br>
        <form method="POST">
            <label>Email</label>
            <input type="email" name="mail" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <input type="submit" name="" value="Submit">
        </form>
        <p>Don't have an account?<br><br> 
        <a href="signup.php"><button>Sign up</button></a>
    </p>
    </div>
</body>
</html>
