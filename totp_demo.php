<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
               
               <div class ="container"> <form  action="verify_otp.php" method="post">
                    <label for="otp">กรอกรหัส OTP 6 หลัก:</label><br>
                    <input  type="text" id="otp" name="otp" pattern="[0-9]{6}" maxlength="6" required><br><br>
                    <input type="submit" value="ยืนยัน">
                    
                </form> 

                <?php
    include 'otphp/lib/otphp.php';
    include 'Base32.php';

    
    // edit account here
    $useraccount = "akkarin@udru.ac.th";
    // edit secret code here
    $secret = "secretcode";
    
    $a = new Base32en();
    $secretcode = $a->base32_encode($secret); 
    $totp = new \OTPHP\TOTP($secretcode);
    $chl = $totp->provisioning_uri($useraccount); 
    


    
        // ตรวจสอบว่ามีการส่งรหัส OTP มาหรือไม่
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // รับค่า OTP ที่ส่งมาจากฟอร์ม
            $user_otp = $_POST['otp'];
            
            // ตรวจสอบความถูกต้องของ OTP ที่ผู้ใช้กรอก
            if($totp->verify($user_otp)){
                echo "<h1>OTP is correct</h1>";
            } else {
                echo "<h1>OTP is incorrect</h1>";
            }
        } else {
            echo "";
        }
    ?>
               

<br>
<img src='https://www.google.com/chart?chs=250x250&chld=M|0&cht=qr&chl=<?php echo $chl; ?>'>
</div>
</body>
</html>

