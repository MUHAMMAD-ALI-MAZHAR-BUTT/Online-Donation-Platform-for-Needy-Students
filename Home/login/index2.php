<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Reset Password</title>
</head>

<body>
    <section class="mainSec">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="box mx-auto">
                        <div class="row text-center">
                            <h1 class="my-4 text-white fw-bolder">Reset Password </h1>
                            <form action="">
                                <div class="col-12 mt-3 details">
                                    <!-- Username -->
                                    <span id="User" class="fa fa-user fa-2x"></span>
                                    <input type="text" placeholder="Username or Email" class="w-75 py-1 text-start"><br>
                                    <!-- Password -->
                                    <span id="Lock" class="fa fa-lock fa-2x"></span>
                                    <input type="password" placeholder="New Password" class="w-75 py-1 text-start mt-3"><br>
                                    <!-- Confirm Password -->
                                    <span id="Lock1" class="fa fa-lock fa-2x"></span>
                                    <input type="password" placeholder="Confirm Password" class="w-75 py-1 text-start mt-3">
                                    <!-- Button  -->
                                    <a href="http://" target="_self" rel="noopener noreferrer">
                                        <div class="d-grid col-9 mx-auto mt-5">
                                            <button class="btn" type="button" id="btn1">RESET</button>
                                        </div>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </section>
</body>

</html>