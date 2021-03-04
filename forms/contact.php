<?php
  use Mailgun\Mailgun;
  # Instantiate the client.
  $mgClient = new Mailgun('a4ab7c551e63346dc5f5f9e65079edcf-e49cc42c-d6faf050');
  $domain = "sandbox8ef4824bfa764ab1b041c87dad37ee08.mailgun.org";
  # Make the call to the client.
  $result = $mgClient->sendMessage($domain, array(
      'from'	=> $_POST['name'] . ' <8pointzero@gmail.com>',
      'to'	    => '<catimbangroy@gmail.com>',
      'subject' => $_POST['subject'],
      'text'	=> 'Email: ' . $_POST['message'] . ' - ' . $_POST['message']
  ));

  return;
?>
