<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Registration</title>
</head>

<body>
    <!-- header  -->
    <header class="mainSec">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="box mx-auto">
                        <form action="">
                            <div class="row text-center">
                                <h2 class="my-3 text-white fw-bold">Register Here</h2>
                                <hr class="m-auto fw-bolder text-white w-75" style="color: white; background-color: white" />
                                <div class="col-12 my-4">
                                    <!-- name  -->
                                    <input type="text" placeholder="Name" class="NameDetails text-center" />
                                    <!-- email  -->
                                    <input type="email" name="" id="" placeholder="E-mail" class="EmailDetails text-center my-3 mb-2" />
                                    <!-- address -->
                                    <input type="text" placeholder="Address" class="AddressDetails text-center my-1" />
                                    <!-- password  -->
                                    <input type="password" name="" id="" placeholder="Password" class="PassDetails text-center my-2" />
                                    <!-- confirm password  -->
                                    <input type="password" name="" id="" placeholder="Confirm Password" class="PassDetails text-center my-2" />
                                    <!-- option  -->
                                    <br />
                                    <div class="text-white my-2 Opt">
                                        <label for="donators">Donator:</label>
                                        <input type="radio" name="DS" id="donators" class="ms-1" />
                                        <label for="students" class="ms-2">Student:</label>
                                        <input type="radio" name="DS" id="students" class="ms-1" />
                                    </div>
                                    <a href="http://"><button type="button" class="btn my-2">Sign Up</button></a>
                                    <p class="text-white Optional">Already have an account?
                                        <a href="index1.php" rel="noopener noreferrer"> Log In</a>
                                        here.
                                    </p>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </header>
</body>

</html>