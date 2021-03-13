<?php
// require '../vendor/autoload.php'; // If you're using Composer (recommended)

// var_dump('done autoload');
// $email = new \SendGrid\Mail\Mail(); 
// $email->setFrom("8pointzerotech@gmail.com", "Eight Point Zero");
// $email->setSubject("Sending with SendGrid is Fun");
// $email->addTo("catimbangroy@gmail.com", "Roy Catimbang");
// $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
// $email->addContent(
//     "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
// );
// $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
// try {
//     $response = $sendgrid->send($email);
//     print $response->statusCode() . "\n";
//     print_r($response->headers());
//     print $response->body() . "\n";
// } catch (Exception $e) {
//     echo 'Caught exception: '. $e->getMessage() ."\n";
// }

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
      echo 'We received your message, we will contact you back in your provided email as soon as possible. Thank you.';
    }
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>
