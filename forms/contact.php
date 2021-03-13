<?php
header('Content-type: application/json');
require '../vendor/autoload.php'; // If you're using Composer (recommended)

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("8pointzerotech@gmail.com", "Eight Point Zero");
$email->setSubject("Customer Inquiry");
$email->addTo("catimbangroy@gmail.com", "Roy Catimbang");
$email->addTo("jpcanamaque@gmail.com", "Johnroe Paulo Canamaque");
$email->addTo("kevinjayroluna@gmail.com", "Kevin Jay Roluna");
$email->addTo("jeffrybordeos@gmail.com", "Jeffry Bordeos");
$email->addContent(
    "text/plain", 
    "<strong>Name</strong>: " . $_POST['name']
        . "\r\n<strong>Email</strong>: " . $_POST['email']
        . "\r\n<strong>Subject</strong>: " . $_POST['subject']
        . "\r\n<strong>Message</strong>: " . $_POST['message']
);
$email->addContent(
    "text/html",
    "<strong>Name</strong>: " . $_POST['name']
        . "<br><strong>Email</strong>: " . $_POST['email']
        . "<br><strong>Subject</strong>: " . $_POST['subject']
        . "<br><strong>Message</strong>: " . $_POST['message']
);

$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    if ($response->statusCode() == '202') {
      echo 'OK';
    }
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>
