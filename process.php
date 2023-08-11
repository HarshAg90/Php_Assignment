<link rel="stylesheet" href="./style.css">

<?php

        // =================== GOOGLE MAILING METHOD =========================


        // use PHPMailer\PHPMailer\PHPMailer;
        // use PHPMailer\PHPMailer\SMTP;
        // use PHPMailer\PHPMailer\Exception;

        // require './PHPMailer/PHPMailer.php';
        // require 'path-to-phpmailer/SMTP.php';
        // require 'path-to-phpmailer/Exception.php';

        // $mail = new PHPMailer(true);
        // try {
        //     $mail->isSMTP();
        //     $mail->Host = 'smtp.gmail.com';
        //     $mail->SMTPAuth = true;
        //     $mail->Username = 'your-gmail@gmail.com';
        //     $mail->Password = 'your-gmail-password';
        //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS
        //     $mail->Port = 587; // TLS port
        // } catch (Exception $e) {
        //     echo "SMTP setup error: " . $e->getMessage();
        // }
        // try {
        //     // Sender and recipient
        //     $mail->setFrom('your-gmail@gmail.com', 'Your Name');
        //     $mail->addAddress('recipient@example.com', 'Recipient Name');
            
        //     // Email content
        //     $mail->Subject = 'Test Email';
        //     $mail->Body = 'This is a test email from PHPMailer.';
            
        //     // Send email
        //     $mail->send();
        //     echo "Email sent successfully!";
        // } catch (Exception $e) {
        //     echo "Email sending failed: " . $mail->ErrorInfo;
        // }


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $M_num = $_POST['M_num'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
        
            if (empty($name) || empty($email) || empty($message)) {
                die("All fields are required.");
            }
        
            // Database connection settings
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "test";
            echo "<h1>Recieved following info</h1>";
            echo "<h2>Mailing on $email </h2>";
            $conn = new mysqli($servername, $username, $password, $dbname);
        
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        
            $sql = "INSERT INTO messages (name,mobile_number, email,subject, message) VALUES ('$name','$M_num',  '$email','$subject',  '$message')";
        
            if ($conn->query($sql) === TRUE) {
                $conn->close();
                
                // ========================== SMTP SERVER MAILING METHOD ====================
                // // Send email notification using SMTP mail server
                // $to = "test@techsolvitservice.com";
                // $subject = "New Contact Form Submission";
                // $message = "Name: $name\nEmail: $email\nMessage: $message";
                // $headers = "From: harshagnihotri90@gmail.com";
        
                // mail($to, $subject, $message, $headers);
        
                echo "Form submitted successfully. Thank you!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Invalid request.";
        }
        ?>