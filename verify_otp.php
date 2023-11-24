<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
    <div class="container">
        <h1>OTP Verification Result</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_otp = $_POST['otp'];
            // Here goes your PHP code to verify the OTP entered by the user
            
            // Assuming you've performed the OTP verification
            $is_verified = true; // Change this based on your actual verification result
            
            // Display result based on verification
            if ($is_verified) {
                echo '<div class="result success">OTP is correct</div>';
            } else {
                echo '<div class="result error">OTP is incorrect</div>';
            }
        } else {
            echo '<div class="result error">No OTP entered</div>';
        }
        ?>
    </div>
</body>
</html>


