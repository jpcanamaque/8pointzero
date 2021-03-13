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
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("catimbangroy@gmail.com", "Roy Catimbang");
$email->addTo("jpcanamaque@gmail.com", "Johnroe Paulo Canamaque");
$email->addTo("kevinjayroluna@gmail.com", "Kevin Jay Roluna");
$email->addTo("jeffrybordeos@gmail.com", "Jeffry Bordeos");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>Name</strong>: " . $_POST['name']
);
$email->addContent(
  "text/html", "<strong>Email</strong>: " . $_POST['email']
);
$email->addContent(
  "text/html", "<strong>Subject</strong>: " . $_POST['subject']
);
$email->addContent(
  "text/html", "<strong>Message</strong>: " . $_POST['message']
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
