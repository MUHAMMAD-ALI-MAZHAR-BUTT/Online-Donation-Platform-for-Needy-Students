<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Registration</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        h1 {
            color: yellow;
            text-align: center;
        }

        body {
            background-image: url("1.jpg");
        }

        title {
            font-weight: bold;
            font-size: 50px;
        }

        h1:hover {
            color: blue;
            font-size: 50px;
        }
    </style>
</head>

<body>
    <h1 class="c" style="color:Yellow;font-size:40px;font-weight:bold;">Online Donation Platform for Needy Students</h1>
    <?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `donators` (username, password, email, create_datetime)
        VALUES ('$username', '" . $password . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            $query1 = "INSERT INTO `notifications` (`name`,`email`, `type`, `message`, `status`, `date`,`type1`) VALUES ('$username'
            , '$email', 'donor','Donor $name has created account on the Platform', 'unread', CURRENT_TIMESTAMP,'newacc')";
            mysqli_query($con, $query1);
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3 style='color:red;'><b>Required fields are missing.<br>or<br>Your Username already exist in our Database.</b></h3><br/>
                 <b> <p class='link'>Click here to <a href='registration.php' style='color:red;'>registration</a> again.</p></b>
                 <b> <p class='link'>Click here to <a href='forget.php' style='color:red;'>Forget Password</a> Request</p></b>
                  </div>";
        }
    } else {
    ?>
        <form class="form" action="" method="post">
            <h1 class="login-title">Registration</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" required />
            <input type="text" class="login-input" name="email" placeholder="Email Adress" required>
            <input type="password" class="login-input" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Register" class="login-button">
            <p class="link">Already have an account? <a href="login.php">Login here</a></p>
        </form>
    <?php
    }
    ?>
    <marquee width="100%" direction="right" height="18px" onmousedown="this.stop();" class="bb" onmouseup="this.start();">
        &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
        &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
        &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
        &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
    </marquee>
    <marquee width="100%" direction="right" height="18px" onmousedown="this.stop();" class="bb" onmouseup="this.start();">
        &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
        &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
        &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
        &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
    </marquee>

</body>

</html>