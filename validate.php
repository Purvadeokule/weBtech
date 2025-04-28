<?php
// Define variables and set to empty values
$name = $email = $phone = $exam = "";
$nameErr = $emailErr = $phoneErr = $examErr = "";
$successMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    // Validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate phone
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{10}$/",$phone)) {
            $phoneErr = "Invalid phone number, must be 10 digits";
        }
    }

    // Validate exam
    if (empty($_POST["exam"])) {
        $examErr = "Exam selection is required";
    } else {
        $exam = test_input($_POST["exam"]);
    }

    // If no errors, set success message
    if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($examErr)) {
        $successMsg = "Registration successful for " . htmlspecialchars($name) . "!";
        // Here you can add code to save data to database or send email
        // Reset form values
        $name = $email = $phone = $exam = "";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Exam Registration Result</title>
    <style>
        .error {color: #FF0000;}
        .success {color: #008000;}
        body {
            max-width: 400px;
            margin: auto;
            padding: 1em;
            font-family: Arial, sans-serif;
        }
        div.form-group {
            margin-bottom: 1em;
        }
        label {
            margin-bottom: .5em;
            color: #333333;
            display: block;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Student Exam Registration Result</h2>

<?php if (!empty($successMsg)) { ?>
    <p class="success"><?php echo $successMsg; ?></p>
    <p><a href="index.html">Register another student</a></p>
<?php } else { ?>

    <form method="post" action="validate.php">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
            <span class="error"><?php echo $nameErr; ?></span>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <span class="error"><?php echo $emailErr; ?></span>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
            <span class="error"><?php echo $phoneErr; ?></span>
        </div>

        <div class="form-group">
            <label for="exam">Select Exam:</label>
            <select id="exam" name="exam">
                <option value="">--Select--</option>
                <option value="Math" <?php if ($exam=="Math") echo "selected"; ?>>Math</option>
                <option value="Physics" <?php if ($exam=="Physics") echo "selected"; ?>>Physics</option>
                <option value="Chemistry" <?php if ($exam=="Chemistry") echo "selected"; ?>>Chemistry</option>
            </select>
            <span class="error"><?php echo $examErr; ?></span>
        </div>

        <input type="submit" value="Register">
    </form>

<?php } ?>

</body>
</html>
