<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "user_db"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = htmlspecialchars(trim($_POST['fullName']));
    $email = htmlspecialchars(trim($_POST['email']));
    $address = htmlspecialchars(trim($_POST['address']));
    $city = htmlspecialchars(trim($_POST['city']));
    $state = htmlspecialchars(trim($_POST['state']));
    $zipCode = htmlspecialchars(trim($_POST['zipCode']));
    $nameOnCard = htmlspecialchars(trim($_POST['nameOnCard']));
    $cardNumber = htmlspecialchars(trim($_POST['cardNumber']));
    $expMonth = htmlspecialchars(trim($_POST['expMonth']));
    $expYear = htmlspecialchars(trim($_POST['expYear']));
    $cvv = htmlspecialchars(trim($_POST['cvv']));

   
    $sql = "INSERT INTO online_payments (fullName, email, address, city, state, zipCode, nameOnCard, cardNumber, expMonth, expYear, cvv)
    VALUES ('$fullName', '$email', '$address', '$city', '$state', '$zipCode', '$nameOnCard', '$cardNumber', '$expMonth', '$expYear', '$cvv')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Payment details submitted successfully!');</script>";
    } else {
        echo "Error: " . $conn->error; 
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Payments</title>
    <link rel="stylesheet" href="OnlinePayments.css">
</head>


<body>
    <div class="container">
    <form action="" method="post">
            <div class="row">
                <div class="column">
                    <h3 class="title">Billing Address</h3>
                    <div class="input-box">
                        <span>Full Name :</span>
                        <input type="text" name="fullName" placeholder="Your Name" required>
                    </div>
                    <div class="input-box">
                        <span>Email :</span>
                        <input type="email" name="email" placeholder="example@example.com" required>
                    </div>
                    <div class="input-box">
                        <span>Address :</span>
                        <input type="text" name="address" placeholder="Room - Street - Locality" required>
                    </div>
                    <div class="input-box">
                        <span>City :</span>
                        <input type="text" name="city" placeholder="Your City" required>
                    </div>

                    <div class="flex">
                        <div class="input-box">
                            <span>State :</span>
                            <input type="text" name="state" placeholder="Your State" required>
                        </div>
                        <div class="input-box">
                            <span>Zip Code :</span>
                            <input type="number" name="zipCode" placeholder="123 456" required>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <h3 class="title">Payment</h3>
                    <div class="input-box">
                        <span>Cards Accepted :</span>
                        <img src="images/imgcards.png" alt="">
                    </div>
                    <div class="input-box">
                        <span>Name On Card :</span>
                        <input type="text" name="nameOnCard" placeholder="Your Name" required>
                    </div>
                    <div class="input-box">
                        <span>Credit Card Number :</span>
                        <input type="number" name="cardNumber" placeholder="1111 2222 3333 4444" required>
                    </div>
                    <div class="input-box">
                        <span>Exp. Month :</span>
                        <input type="text" name="expMonth" placeholder="August" required>
                    </div>
                
                    <div class="flex">
                        <div class="input-box">
                            <span>Exp. Year :</span>
                            <input type="number" name="expYear" placeholder="2025" required>
                        </div>
                        <div class="input-box">
                            <span>CVV :</span>
                            <input type="number" name="cvv" placeholder="123" required>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>

</body>

</html>