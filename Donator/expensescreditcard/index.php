<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donation Platform</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/demo.css">
</head>

<body>
    <div class="container-fluid" style="background-image: url(1.jpg);">
        <div class="creditCardForm">
            <div class="heading">
                <h1><b>Donation for Needy Students</b></h1>

            </div>
            <div class="payment">
                <form action="feeinsert.php" method="POST">
                    <div class="form-group owner">
                        <label>Owner Name</label>
                        <input type="text" class="form-control" id="owner" name="a" placeholder="Muhammad Ali" required>
                    </div>
                    <div class="form-group CVV">
                        <label>CVV</label>
                        <input type="text" class="form-control" id="cvv" name="e" placeholder="543" required>
                    </div>
                    <div class="form-group" id="card-number-field">
                        <label>Card Number</label>
                        <input type="text" class="form-control" id="cardNumber" name="b" placeholder="4321567896543217" required>
                    </div>
                    <div class="form-group" id="expiration-date">
                        <label>Expiration Date</label>
                        <select name="c" required>
                            <option value="01">January</option>
                            <option value="02">February </option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select name="d" required>
                            <option value="2021"> 2021</option>
                            <option value="2022"> 2022</option>
                            <option value="2023"> 2023</option>
                            <option value="2024"> 2024</option>
                            <option value="2025"> 2025</option>
                            <option value="2026"> 2026</option>
                            <option value="2027"> 2027</option>
                            <option value="2028"> 2028</option>
                            <option value="2029"> 2029</option>
                            <option value="2030"> 2030</option>
                            <option value="2031"> 2031</option>
                            <option value="2032"> 2032</option>
                            <option value="2033"> 2033</option>
                            <option value="2034"> 2031</option>
                            <option value="2035"> 2032</option>
                            <option value="2033"> 2033</option>
                        </select>
                    </div>
                    <div class="form-group" id="credit_cards">
                        <img src="assets/images/visa.jpg" id="visa">
                        <img src="assets/images/mastercard.jpg" id="mastercard">
                        <img src="assets/images/amex.jpg" id="amex">
                    </div>
                    <div class="form-group owner">
                        <label>Amount</label>
                        <input type="number" class="form-control" placeholder="500" min="500" max="10000000" name="f" required>
                    </div>

                    <div class="form-group col-lg-12">
                        <button type="submit" class="btn btn-default">Confirm</button>
                        <!--  id="confirm-purchase"-->
                    </div>
                </form>
            </div>
        </div>
        <marquee width="100%" direction="right" height="45px" onmousedown="this.stop();" onmouseup="this.start();">
            &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
            <b> Thank you for your love and support.
            </b> &#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;&#128150;
        </marquee>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.payform.min.js" charset="utf-8"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>