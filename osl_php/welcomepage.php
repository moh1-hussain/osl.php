<?php
require_once "db.php";
$records = mysqli_query($conn, "SELECT fullName FROM osl ORDER BY fullName DESC LIMIT 1");
?>

<!DOCTYPE html>
<html>

<head>
    <title>welcome Page</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="sec_container">
        <header>
            <img src="images/logo.png">
            <h1>DEV COMMUNITY</h1>
        </header>
        <div class="back">
           <h1> Welcome !</h1>
           <h3>
            <?php
                while ($row = mysqli_fetch_assoc($records)) {
                echo $row['fullName']; 
                }
            ?> to our Community
            </h3>
        </div>
    </div>
</body>

</html>