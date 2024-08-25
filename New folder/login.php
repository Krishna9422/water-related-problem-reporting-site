<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
        }
        .wrapper {
            width: 100%;
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .nav-logo p {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
        .nav-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }
        .nav-menu ul li {
            margin-left: 20px;
        }
        .nav-menu ul li a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s ease;
        }
        .nav-menu ul li a:hover {
            color: #007bff;
        }
        .nav-button .btn {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .nav-button .white-btn {
            background: #fff;
            border: 1px solid #007bff;
            color: #007bff;
        }
        .nav-button .white-btn:hover {
            background: #007bff;
            color: #fff;
        }
        .form-box {
            position: relative;
            width: 100%;
            transition: all 0.3s ease;
        }
        .login-container, .register-container {
            position: absolute;
            width: 100%;
            transition: all 0.3s ease;
        }
        .login-container {
            left: 0;
            opacity: 1;
        }
        .register-container {
            right: -100%;
            opacity: 0;
        }
        .input-box {
            margin-bottom: 20px;
        }
        .input-box input {
            width: calc(100% - 30px);
            padding: 10px;
            margin-left: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .input-box i {
            position: absolute;
            margin: 10px;
            color: #aaa;
        }
        .submit {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .submit:hover {
            background: #0056b3;
        }
        .top span {
            display: block;
            margin-bottom: 10px;
        }
        .two-col {
            display: flex;
            justify-content: space-between;
        }
        .two-col label a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
    <title>Water Problem Solving Site</title>
</head>
<body>
 <div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>Problem Solver For Water</p>
        </div>
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="#" class="link active">Home</a></li>
                <li><a href="#" class="link">Courses</a></li>
                <li><a href="#" class="link">About</a></li>
            </ul>
        </div>
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="showLogin()">Sign In</button>
            <button class="btn" id="registerBtn" onclick="showRegister()">Register</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>

    <div class="form-box">
        <div class="login-container" id="login">
            <div class="top">
                <span>Don't have an account? <a href="#" onclick="showRegister()">Sign Up</a></span>
                <header>Login</header>
            </div>
            <form action="login.php" method="POST" onsubmit="return validateLogin()">
                <div class="input-box">
                    <input type="text" class="input-field" id="loginUsername" name="email" placeholder="Username or Email">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" id="loginPassword" name="password" placeholder="Password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="hidden" name="type" value="user"> <!-- or value="owner" for owner login -->
                    <input type="submit" class="submit" value="Sign In">
                </div>
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="login-check">
                        <label for="login-check"> Remember Me</label>
                    </div>
                    <div class="two">
                        <label><a href="#">Forgot password?</a></label>
                    </div>
                </div>
            </form>
        </div>

        <div class="register-container" id="register">
            <div class="top">
                <span>Have an account? <a href="#" onclick="showLogin()">Login</a></span>
                <header>Sign Up</header>
            </div>
            <form action="register.php" method="POST" onsubmit="return validateRegistration()">
                <div class="two-forms">
                    <div class="input-box">
                        <input type="text" class="input-field" id="firstName" name="firstName" placeholder="Firstname">
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" id="lastName" name="lastName" placeholder="Lastname">
                        <i class="bx bx-user"></i>
                    </div>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" id="email" name="email" placeholder="Email">
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" id="registerPassword" name="password" placeholder="Password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="hidden" name="type" value="user"> <!-- or value="owner" for owner registration -->
                    <input type="submit" class="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
</div>   

<script>
    function myMenuFunction() {
        var i = document.getElementById("navMenu");
        if (i.className === "nav-menu") {
            i.className += " responsive";
        } else {
            i.className = "nav-menu";
        }
    }

    function showLogin() {
        document.getElementById("login").style.left = "0";
        document.getElementById("register").style.right = "-100%";
        document.getElementById("login").style.opacity = 1;
        document.getElementById("register").style.opacity = 0;
    }

    function showRegister() {
        document.getElementById("login").style.left = "-100%";
        document.getElementById("register").style.right = "0";
        document.getElementById("login").style.opacity = 0;
        document.getElementById("register").style.opacity = 1;
    }

    function validateLogin() {
        var username = document.getElementById("loginUsername").value;
        var password = document.getElementById("loginPassword").value;

        if (username === "" || password === "") {
            alert("Please fill in all fields");
            return false;
        }
        return true;
    }

    function validateRegistration() {
        var firstName = document.getElementById("firstName").value;
        var lastName = document.getElementById("lastName").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("registerPassword").value;

        if (firstName === "" || lastName === "" || email === "" || password === "") {
            alert("Please fill in all fields");
            return false;
        }
        return true;
    }
</script>

<?php
// db_connect.php
$servername = "localhost";
$username = "root";  // Replace with your MySQL username
$password = "";  // Replace with your MySQL password
$dbname = "water_problem_solving";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// register.php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_BCRYPT);
    $type = $conn->real_escape_string($_POST['type']);  // user or owner

    $table = $type == 'owner' ? 'owner' : 'user';
    $sql = "INSERT INTO $table (first_name, last_name, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// login.php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $type = $conn->real_escape_string($_POST['type']);  // user or owner

    $table = $type == 'owner' ? 'owner' : 'user';
    $sql = "SELECT * FROM $table WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "<script>alert('Login successful');</script>";
        } else {
            echo "<script>alert('Invalid password');</script>";
        }
    } else {
        echo "<script>alert('No user found with that email');</script>";
    }
}

$conn->close();
?>
</body>
</html>
