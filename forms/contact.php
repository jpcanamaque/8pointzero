<?php
require '../vendor/autoload.php'; // If you're using Composer (recommended)

var_dump('done autoload');
$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("8pointzerotech@gmail.com", "Eight Point Zero");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("catimbangroy@gmail.com", "Roy Catimbang");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
?>
