<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
</head>
<body>

    <h2>Student Registration Form</h2>

<?php
// PHP VALIDATION LOGIC

$studentName = $username = $email = $phone = $age = $password = $confirmPassword = $studentID = $website = $dob = "";
$errors = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

     // --- Validate Name ---
    if (empty($_POST["full_name"])) {
        $errors["full_name"] = "Full Name is required.";
    } else {
        $studentName = trim($_POST["full_name"]);

        if (!preg_match("/^[A-Za-z ]+$/", $studentName)) {
            $errors["full_name"] = "Full Name must contain only alphabetic characters and spaces.";
        } elseif (strlen($studentName) < 3) {
            $errors["full_name"] = "Full Name must be at least 3 characters long.";
        } elseif (strlen($studentName) > 50) {
            $errors["full_name"] = "Full Name must not exceed 50 characters.";
        }
    }

    
    if (empty($_POST["username"])) {
        $errors["username"] = "Username is required.";
    } else {
        $username = trim($_POST["username"]);

        if (!preg_match("/^[A-Za-z0-9_]+$/", $username)) {
            $errors["username"] = "Username may contain only letters, numbers, and underscores.";
        } elseif (strlen($username) < 5 || strlen($username) > 15) {
            $errors["username"] = "Username length must be between 5 and 15 characters.";
        } elseif (!preg_match("/^[A-Za-z]/", $username)) {
            $errors["username"] = "The first character of Username must be an alphabetic character.";
        }
    }

    
    if (empty($_POST["email"])) {
        $errors["email"] = "Email Address is required.";
    } else {
        $email = trim($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Email Address must be a valid email format.";
        } elseif (!preg_match("/\.(com|org|edu)$/i", $email)) {
            $errors["email"] = "Email Address must end with .com, .org, or .edu.";
        }
    }

    if(empty($_POST["phone"])){
        $errors["phone"] = "Phone Number is required.";
    }else{
        $phone = trim($_POST["phone"]);

        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            $errors["phone"] = "Phone Number must be 10 digits.";
        }
    }
   

?>

</body>
</html>
