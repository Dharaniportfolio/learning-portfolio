<?php
session_start();
include("db.php");
if($_SERVER['REQUEST_METHOD'] == "POST")
{
$fname = $_POST['fname'];
$gender = $_POST['gender'];
$number = $_POST['number'];
$mail = $_POST['mail'];
$password = $_POST['pass'];

if (!empty($mail) && !empty($password) && !is_numeric($mail))

{
    $query = "insert into form(fname, gender, cnum, email, pass) VALUES ('$fname', '$gender', '$number', '$mail', '$password')";
    mysqli_query($con, $query);
    echo"<script type='text/javascript'>alert('successful register')</script>";
}
else{
    echo"<script type='text/javascript'>alert('enter valid information')</script>";
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
    margin: 0;
    padding: 0;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    background-image:url(./back.webp);
    }
    .signup {    
        max-width: 400px;
        margin: 50px auto;
        padding: 50px;
        box-shadow: -3px -3px 9px #aaa9a9a2,
              3px 3px 7px rgba(147, 149, 151, 0.671);
        border-radius: 10px;
        text-align: center;
    }
    h1 {
        color: black; /* Heading color */
    }

    form {
        text-align: left;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    input[type="submit"] {
        background-color: #4682A9;; /* Submit button background color */
        color:black;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        font-size: 14px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
        color: white; /* Hover background color */
    }

    p {

        color:black;
        font-size: 14px;
        margin-top: 20px;
        text-transform: inherit;
    }
    button{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        height: 50px;
        width: 100px;
        background-color: #4682A9;
        border: 1px solid white;
        border-radius: 20px;
    }
    button:hover{
        background-color: #0056b3;
        color: white;
    }
    </style>
    <title>Signup Page</title>
</head>
<body>
    <div class="signup">
        <h1>SIGNUP</h1>
        <form method="POST">
        <label>Name</label>
        <input type="text" name="fname" required>
         <label>Gender</label>
        <input type="text" name="gender" required>
        <label>Contact</label>
        <input type="text" name="number" required>
        <label>Email</label>
        <input type="email" name="mail" required>
        <label>Password</label>
        <input type="password" name="pass" required>
       <input type="submit" name="" value="Submit">
       
       </form>
      <p> Already have an account? <br><br>
      <a href="login.php"><button>login here</button></a>
      </p>
    </div>
</body>
</html>
