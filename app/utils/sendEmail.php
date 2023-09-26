<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once '../vendor/phpmailer/phpmailer/src/Exception.php';
    require_once '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require_once '../vendor/phpmailer/phpmailer/src/SMTP.php';

    function sendEmail($subject, $email_template, $email_to, $user_name) {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = EMAIL_HOST;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = EMAIL_USERNAME;                     //SMTP username
            $mail->Password   = EMAIL_PASSWORD;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = EMAIL_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(EMAIL_USERNAME, 'Breast Cancer Pathology');
            $mail->addAddress($email_to, $user_name);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            
            $mail->msgHTML(file_get_contents('../app/Views/base/email_templates/'.$email_template), __DIR__);

            $mail->send();
            return true;
        } catch (Exception $e) {
            error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }

    function sendEmailWithData($subject, $email_template, $email_to, $user_name, $data){
         //Create an instance; passing `true` enables exceptions
         $mail = new PHPMailer(true);

         try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = EMAIL_HOST;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = EMAIL_USERNAME;                     //SMTP username
            $mail->Password   = EMAIL_PASSWORD;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = EMAIL_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(EMAIL_USERNAME, 'Breast Cancer Pathology');
            $mail->addAddress($email_to, $user_name);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $html_content = file_get_contents('../app/Views/base/email_templates/'.$email_template);
            $html_content = str_replace('{{token}}', $data['token'], $html_content);
            $mail->Body = $html_content;
            $mail->send();

            return true;
        } catch (Exception $e) {
            error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }

    function sendResetDoneEmail($subject, $email_template, $email_to, $user_name, $data){
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = EMAIL_HOST;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = EMAIL_USERNAME;                     //SMTP username
            $mail->Password   = EMAIL_PASSWORD;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = EMAIL_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(EMAIL_USERNAME, 'Breast Cancer Pathology');
            $mail->addAddress($email_to, $user_name);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            error_log(print_r($data));
            $html_content = file_get_contents('../app/Views/base/email_templates/'.$email_template);
            $html_content = str_replace('{{time}}', $data['time'], $html_content);
            $html_content = str_replace('{{user_name}}', $user_name, $html_content);
            $mail->Body = $html_content;
            $mail->send();

            return true;
        } catch (Exception $e) {
            error_log("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            return false;
        }
    }
    
?>