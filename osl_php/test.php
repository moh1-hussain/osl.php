<?php
require_once "db.php";
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $DOB = mysqli_real_escape_string($conn, $_POST['DOB']);
    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $name_error = "Name must contain only alphabets and space";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please Enter Valid Email ID";
    }
    if (strlen($mobile) < 10) {
        $mobile_error = "Mobile number must be minimum of 10 characters";
    }
    $query    = "INSERT INTO osl (fullName, email, DOB, phone) VALUES ('$name', '$email', '$DOB', '$mobile')";
        $result   = mysqli_query($conn, $query);
        if ($result) {
            echo "
            ?>
            <script>
                window.location.href = './welcomepage.php';
            </script>
        <?php
        ";
        } else {
            echo "Error: " . $sql . "" . mysqli_error($conn);
        }

    mysqli_close($conn);
    
}

?>



<!DOCTYPE html>
<html>

<head>
    <title>Registration Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div>
            <header>
                <img src="images/logo.png">
                <h1>DEV COMMUNITY</h1>
            </header>
            <h2>Join Our Developer Community</h2>
        </div>
        <div class="submain">
            <div class="form_container">
                <form method="post" action="">
                    <input type="text" name="name" placeholder="Full Name" required><br>
                    <br>
                    <input type="text" name="email" placeholder="Email" required ><br>
                    <br>
                    <input type="text" name="mobile" placeholder="phone Number" required ><br>
                    <br>
                    <input type="date" name="DOB" placeholder="Date of Birth" min="1950-01-01" max="2021-10-10" required><br>
                    <br>
                    <a href="welcomepage.html">
                        <button type="submit" name="submit" value="Register" >Join</button>
                    </a>
                </form>
            </div>
            <div class="img_container">
                <img src="images/main.png">
            </div>
        </div>
    </div>
</body>

</html>