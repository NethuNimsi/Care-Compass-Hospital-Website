<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $doctor = htmlspecialchars($_POST['doctor']);
    $date = htmlspecialchars($_POST['date']);
    $problem = htmlspecialchars($_POST['problem']);

    include 'connect.php';
    $sql = "INSERT INTO book_appointment(name, email, mobile, doctor, date, problem) VALUES ('$name', '$email', '$mobile', '$doctor', '$date', '$problem')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Appointment Booked successfully!');</script>";
    } else {
        echo "Error: " . $conn->error; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="BookAppointment.css">
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>


    <div class="container">
        <div class="header">
            <h1>Make An Appointment To Visit Our Doctor</h1>
            <p>Please fill out the form below to schedule your appointment.</p>
        </div>
        <form class="appointment-form" method="post" action="">
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="mobile">Your Mobile</label>
                    <input type="tel" name="mobile" id="mobile" placeholder="Enter your mobile number" required>
                </div>
                <div class="form-group">
                    <label for="doctor">Choose Doctor</label>
                    <select name="doctor" id="doctor" required>
                        <option value="" disabled selected>Select a doctor</option>
                        <option value="doctor1">Dr.Boyan Hadjiev</option>
                        <option value="doctor2">Dr. Georgia Gaveras</option>
                        <option value="doctor3">Dr. Paul Carpentier</option>
                        <option value="doctor4">Dr. Robert Gluck</option>
                        <option value="doctor5">Dr. Sharon E. Oberfield</option>
                        <option value="doctor6">Dr. Megan O'Shea Farrel</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="date">Choose Date</label>
                    <input type="date" name="date" id="date" required>
                </div>
                <div class="form-group">
                    <label for="problem">Describe your problem</label>
                    <textarea name="problem" id="problem" placeholder="Describe your problem" required></textarea>
                </div>
            </div>
            <button type="submit" class="btn">Book Appointment</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
