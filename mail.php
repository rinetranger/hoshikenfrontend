<?php




use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// 設置した場所のパスを指定する
require('./vendor/PHPMailer/src/PHPMailer.php');
require('./vendor/PHPMailer/src/Exception.php');
require('./vendor/PHPMailer/src/SMTP.php');
require('./vendor/PHPMailer/language/phpmailer.lang-ja.php');


mb_internal_encoding('UTF-8');
mb_language('japanese');
// require 'vendor/autoload.php';





//PHPMailer Object
$mail = new PHPMailer(true);

$mail->CharSet="iso-2022-jp";
$mail->Encoding="7bit";

$mail->setLanguage('ja','./vendor/language');


//Enable SMTP debugging. 
// $mail->SMTPDebug = 2;   
//Set PHPMailer to use SMTP.
$mail->isSMTP(); 


         
//Set SMTP host name                          
$mail->Host = "hoshiken.sakura.ne.jp";


//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;    

//Provide username and password     
$mail->Username = "hoshikawa@hoshiken.sakura.ne.jp";                 
$mail->Password = "Kaneyama2804";         
              
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls"; 


                        
//Set TCP port to connect to 
$mail->Port = 587;  
                         

//From email address and name
$mail->From = "hoshikawa@hoshiken.sakura.ne.jp";
$mail->FromName = "hoshikawa";


// To address and name

$to = 'hosiken@coral.ocn.ne.jp,t.asanuma@hosiken.co.jp';
$to = explode(',',$to);


for ($i = 0; $i < count($to); $i++) {
  $mail->addAddress($to[$i]);
}

// $mail->addAddress("hosiken@coral.ocn.ne.jp", "星川建設");


//Send HTML or Plain Text email
$mail->isHTML(true);



$mail->Subject = "from hosikawa";
$mail->CharSet = 'UTF-8';
$mail->Body = "<i><p>inquiry from {$_POST['name-2']}</p> <p>phone number:{$_POST['Phone']}</p> <p>email: {$_POST['email-2']}</p><pre>{$_POST['field-2']}<pre></i>";

// $mail->AltBody = "This is the plain text version of the email content";

$mail->AuthType = 'LOGIN';


if($mail->send()) 
{
    echo("<h1>メールを送信しました</h1>");
    echo(' <a href="/hoshikawa/#contact" class="newbutton w-button"  style="opacity: 1; transform: translateX(0px) translateY(0px) translateZ(0px); transition: opacity 500ms ease 0s, transform 500ms ease 0s;">戻る</a>');
    echo(date("Y/m/d H:i:s"));
} 
else 
{
    
    echo("Mailer Error: " . $mail->ErrorInfo);
};

$mail->SMTPDebug = 2;

?>
