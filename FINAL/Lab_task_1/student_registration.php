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

    
    if (empty($_POST["phone"])) {
        $errors["phone"] = "Phone Number is required.";
    } else {
        $phone = trim($_POST["phone"]);

        if (!preg_match("/^\d+$/", $phone)) {
            $errors["phone"] = "Phone Number must contain digits only.";
        } elseif (strlen($phone) != 11) {
            $errors["phone"] = "Phone Number must be exactly 11 digits long.";
        } elseif (substr($phone, 0, 2) != "01") {
            $errors["phone"] = "Phone Number must start with 01.";
        }
    }

    
    if (empty($_POST["age"])) {
        $errors["age"] = "Age is required.";
    } else {
        $age = trim($_POST["age"]);

        if (!is_numeric($age)) {
            $errors["age"] = "Age must be a numeric value.";
        } elseif ($age < 18 || $age > 30) {
            $errors["age"] = "Age must be between 18 and 30 inclusive.";
        }
    }

    
    $postedPassword = "";
    if (empty($_POST["password"])) {
        $errors["password"] = "Password is required.";
    } else {
        $postedPassword = $_POST["password"];

        if (strlen($postedPassword) < 8) {
            $errors["password"] = "Password must contain at least 8 characters.";
        } elseif (!preg_match("/[A-Z]/", $postedPassword)) {
            $errors["password"] = "Password must contain at least one uppercase English letter.";
        } elseif (!preg_match("/\d/", $postedPassword)) {
            $errors["password"] = "Password must contain at least one numeric digit.";
        } elseif (!preg_match("/[@#$%]/", $postedPassword)) {
            $errors["password"] = "Password must contain at least one special character (@, #, $, %).";
        }
    }
    $password = "";
    $confirmPassword = "";

    
    if (empty($_POST["confirm_password"])) {
        $errors["confirm_password"] = "Confirm Password is required.";
    } else {
        $postedConfirm = $_POST["confirm_password"];

        if ($postedConfirm != $postedPassword) {
            $errors["confirm_password"] = "Confirm Password must exactly match the Password field.";
        }
    }

   
    if (empty($_POST["student_id"])) {
        $errors["student_id"] = "Student ID is required.";
    } else {
        $studentID = trim($_POST["student_id"]);

        if (!preg_match("/^\d{2}-\d{5}-\d{1}$/", $studentID)) {
            $errors["student_id"] = "Student ID must follow the format XX-XXXXX-X (e.g., 22-12345-1).";
        }
    }

    
    if (empty($_POST["website"])) {
        $errors["website"] = "Personal Website is required.";
    } else {
        $website = trim($_POST["website"]);

        if (!filter_var($website, FILTER_VALIDATE_URL)) {
            $errors["website"] = "Personal Website must be a valid URL.";
        } elseif (!preg_match("/^https?:\/\//i", $website)) {
            $errors["website"] = "Personal Website must start with http:// or https://.";
        }
    }

    
    if (empty($_POST["dob"])) {
        $errors["dob"] = "Date of Birth is required.";
    } else {
        $dob = trim($_POST["dob"]);
    }
}

?>

<form method="post" action="">

    Full Name:
    <input type="text" name="full_name" value="<?php echo htmlspecialchars($studentName); ?>">
    <span style="color:red">* <?php echo isset($errors["full_name"]) ? $errors["full_name"] : ""; ?></span>

    <br><br>

    Username:
    <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">
    <span style="color:red">* <?php echo isset($errors["username"]) ? $errors["username"] : ""; ?></span>

    <br><br>

    Email Address:
    <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
    <span style="color:red">* <?php echo isset($errors["email"]) ? $errors["email"] : ""; ?></span>

    <br><br>

    Phone Number:
    <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
    <span style="color:red">* <?php echo isset($errors["phone"]) ? $errors["phone"] : ""; ?></span>

    <br><br>

    Age:
    <input type="text" name="age" value="<?php echo htmlspecialchars($age); ?>">
    <span style="color:red">* <?php echo isset($errors["age"]) ? $errors["age"] : ""; ?></span>

    <br><br>

    Password:
    <input type="password" name="password" value="">
    <span style="color:red">* <?php echo isset($errors["password"]) ? $errors["password"] : ""; ?></span>

    <br><br>

    Confirm Password:
    <input type="password" name="confirm_password" value="">
    <span style="color:red">* <?php echo isset($errors["confirm_password"]) ? $errors["confirm_password"] : ""; ?></span>

    <br><br>

    Student ID:
    <input type="text" name="student_id" value="<?php echo htmlspecialchars($studentID); ?>">
    <span style="color:red">* <?php echo isset($errors["student_id"]) ? $errors["student_id"] : ""; ?></span>

    <br><br>

    Personal Website:
    <input type="text" name="website" value="<?php echo htmlspecialchars($website); ?>">
    <span style="color:red">* <?php echo isset($errors["website"]) ? $errors["website"] : ""; ?></span>

    <br><br>

    Date of Birth:
    <input type="text" name="dob" value="<?php echo htmlspecialchars($dob); ?>">
    <span style="color:red">* <?php echo isset($errors["dob"]) ? $errors["dob"] : ""; ?></span>

    <br><br>

    <input type="submit" name="submit" value="Register">

</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)) {

    echo "<h3>Registration Successful!</h3>";
    echo "Full Name: " . htmlspecialchars($studentName) . "<br>";
    echo "Username: " . htmlspecialchars($username) . "<br>";
    echo "Student ID: " . htmlspecialchars($studentID) . "<br>";
    echo "Email Address: " . htmlspecialchars($email) . "<br>";
}

/*
 * htmlspecialchars() converts special characters (like <, >, &) into HTML entities
 * so user input is shown safely and cannot inject scripts into the page.
 * Server-side validation is still required because client-side checks can be
 * bypassed; only the server can enforce rules before data is stored or used.
 * For Age, numeric validation must run before the 18-30 range check so that
 * non-numeric input gets the correct error instead of a misleading range message.
 */

?>

</body>
</html>
