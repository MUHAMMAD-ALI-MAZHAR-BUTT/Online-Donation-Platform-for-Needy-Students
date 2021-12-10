<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title style="font-size:100px;"><b>Login</b></title>
    <link rel="stylesheet" href="style.css" />
    <style>
        h1 {
            color: yellow;
            font-size: 50px;
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
    <h1 style=" text-shadow: 5px 3px #ff0000;">Online Donation Platform for Needy Students</h1>
    <?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `donators` WHERE username='$username'
                AND password='" . $password . "'";

        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // $_SESSION['status'] = true;
            // Redirect to user dashboard page
            if (empty($_GET)) {
                header("Location:../index.php");
            } else {
                $g = $_GET['continue'];
                echo "<script>window.open(' $g','_self')</script>";
            }
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  <b> <p class='link'>Click here to <a href='forget.php' style='color:red;'>Forget Password</a> Request</p></b>
                  </div>";
        }
    } else {
    ?>
        <?php
        if (empty($_GET)) {
        ?>
            <form class="form" method="post" name="login.php">
                <h1 class="login-title">Login for Donator</h1>
                <input type="text" class="login-input" name="username" placeholder="Username" required autofocus="true" />
                <input type="password" class="login-input" name="password" required placeholder="Password" />
                <input type="submit" value="Login" name="submit" class="login-button" />
                <b>
                    <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
                </b>
                <b>
                    <p class='link'>Click here to <a href='forget.php' style='color:red;'>Forget Password</a> Request</p>
                </b>
            </form>
        <?php
        } else {
        ?>
            <form class="form" method="post" name="login.php?continue=<?php echo $_GET['continue']; ?>">
                <h1 class="login-title">Login for Donator</h1>
                <input type="text" class="login-input" name="username" placeholder="Username" required autofocus="true" />
                <input type="password" class="login-input" name="password" required placeholder="Password" />
                <input type="submit" value="Login" name="submit" class="login-button" />
                <b>
                    <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
                </b>
                <b>
                    <p class='link'>Click here to <a href='forget.php' style='color:red;'>Forget Password</a> Request</p>
                </b>
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
        <marquee width="100%" direction="right" height="17px" onmousedown="this.stop();" class="bb" onmouseup="this.start();">
            &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
            &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
            &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
            &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
        </marquee>
        <marquee width="100%" direction="right" height="17px" onmousedown="this.stop();" class="bb" onmouseup="this.start();">
            &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
            &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
            &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
            &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
        </marquee>
        <marquee width="100%" direction="right" height="17px" onmousedown="this.stop();" class="bb" onmouseup="this.start();">
            &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
            &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
            &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
            &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
        </marquee>


    <?php
    }
    ?>
</body>

</html>