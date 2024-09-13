<?php
//session_start();
//PHP Mailer Headers
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

$namee = $_POST['namee'];
$customer_email = $_POST['customer_email'];
$phone_number = $_POST['phone_number'];
$notes = $_POST['notes'];
$logo = $_POST['logo'];
$domain = $_POST['domain'];
$image_gallery = $_POST['image_gallery'];
$favicon = $_POST['favicon'];
$content = $_POST['content'];
$company_profile = $_POST['company_profile'];
$mail = new PHPMailer(true);

try{
    $mail->isSMTP();                                             
    $mail->Host       = 'mail.ttchtech.co.za';
    //$mail->SMTPDebug = 2;                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'testing@ttchtech.co.za';                 
    $mail->Password   = 'Testing@ttch12';
    $mail->SMTPSecure = 'tls';                              
    $mail->Port       = 587;
    $mail->setFrom('testing@ttchtech.co.za','TTCH Technologies');

        if($namee != 'RobertAgodo')
        {
            //$mail->addAddress('info@ttchtech.co.za');         
            $mail->addBCC('ssupport@ttchtech.co.za');
            $mail->addBCC($customer_email);
            $mail->addBCC('eemanuel@ttchtech.co.za');
            
        }
        else{
            $mail->addAddress('tesdting@ttchtech.co.za');
        }
        
            // Check if Logo is available
            if (!empty($Logo)) {
                echo 'Logo: '. $Logo . '<br>';
            }

            // Check if Domain is available
            if (!empty($domain)) {
                echo 'Domain: ' . $domain . '<br>';
            }

            // Check if Image Gallery is available
            if (!empty($image_gallary)) {
                echo 'Image Gallery: ' . $image_gallary . '<br>';
            }

            // Check if Favicon is "favicon available"
            if ($favicon == "favicon available") {
                echo 'Favicon: ' . $favicon . '<br>';
            }

            // Check if Content is available
            if (!empty($content)) {
                echo 'Content: ' . $content . '<br>';
            }

            // Check if Company Profile is available
            if (!empty($company_profile)) {
                echo 'Company Profile: ' . $company_profile;
            }
        
                
                
                
    $message = '<!DOCTYPE html> 
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Quicksand, sans-serif:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="http://getbootstrap.com.vn/examples/equal-height-columns/equal-height-columns.css"/>
<style type="text/css">
<style type="text/css">
    
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
    img { -ms-interpolation-mode: bicubic; }

    /* RESET STYLES */
    img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
    table { border-collapse: collapse !important; }
    body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }
    
    /* MOBILE STYLES */
    @media screen and (max-width:600px){
        h1 {
            font-size: 32px !important;
            line-height: 32px !important;
        }
    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>

</head>
<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">

<!-- HIDDEN PREHEADER TEXT -->
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Quicksand, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
</div>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <!-- LOGO -->
    <tr>
        <td bgcolor="#f5f5f5" align="center">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 40px 10px;">
                        <a href="" target="_blank">
                            <img alt="Logo" src="https://ttchtech.co.za/dev/assets/img/TTCH-Technologies.png" width="220"  style="display: block; width: 220px; max-width: 400px; min-width: 100px; font-family: Quicksand, sans-serif; color: #ffffff; font-size: 14px;" border="0">
                        </a>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- HERO -->
    <tr>
        <td bgcolor="#f5f5f5" align="center" style="padding: 0px 10px 0px 10px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
                <tr>
                    <td bgcolor="#ffffff" align="left" valign="top" style="padding: 40px 30px 0px 30px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Quicksand, sans-serif; font-size: 24px; font-weight: 400; letter-spacing: 1px; line-height: 25px;">
                      <h1 style="font-size: 24px; font-weight: 400; margin: 0;">Dear '.$namee.'</h1>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- COPY BLOCK -->
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
              <!-- COPY -->
              <tr>
                <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 20px 30px; color: #666666; font-family: Quicksand, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;" >
                  <p style="margin: 0;">We have received your request for a website. Please share the following details with us.<br><br>Logo:' .$logo.'<br>favicon:' .$favicon.'<br>Domain:' .$domain.'<br>Content:' .$content.'
                
                
                
                  </td>
              </tr>
              <!-- BULLETPROOF BUTTON -->

              <tr>
                <td bgcolor="#ffffff" align="left" style="padding: 0px 0px 30px 0px;">
                    <table border="0" cellspacing="0" cellpadding="0">
                     <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 0px 30px; color: #666666; font-family: Quicksand, sans-serif; font-size: 14px; font-weight: 400; line-height: 25px;" >
                          <p style="margin: 0;">Kind Regards,<br>TTCH Technologies</p>
                        </td>
                    </tr>
                  </table>
                </td>
              </tr>

            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>   
    </tr>
    <!-- COPY CALLOUT -->
    <!-- SUPPORT CALLOUT -->
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- FOOTER -->
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
            <tr>
            <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;" >
              
              <!-- PERMISSION REMINDER -->
              <tr>
                <td bgcolor="#f4f4f4" align="center" style="padding: 0px 30px 30px 30px; color: #666666; font-family: Quicksand, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >
                  <p style="margin: 0;">66 Ingersol Rd Lynnwood Glen Pretoria </p>
                </td>
              </tr>
             
              
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>
    
</body>
</html>';
//end of html    
    $mail->isHTML(true);                                  
    $mail->Subject = 'TTCH Contact form';
    $mail->Body    = $message;
    //$mail->AltBody = 'Body in plain text for non-HTML mail clients';
    $mail->send();
    echo "Ok";
   
} catch (Exception $e) {
   // echo "{$mail->ErrorInfo}";
}
?> 