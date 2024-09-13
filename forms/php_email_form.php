<?php

class PHP_Email_Form {

  public $to;
  public $from_name;
  public $from_email;
  public $subject;
  public $messages = [];
  public $ajax = false;
  public $headers = [];

  public function add_message($message, $label, $priority = 0) {
    $this->messages[] = "$label: $message";
  }

  public function send() {
    $email_body = implode("\n", $this->messages);

    // Build headers
    $this->headers[] = "From: {$this->from_name} <{$this->from_email}>";
    $this->headers[] = "Reply-To: {$this->from_email}";

    if(mail($this->to, $this->subject, $email_body, implode("\r\n", $this->headers))) {
      return 'Message sent successfully!';
    } else {
      return 'Message sending failed!';
    }
  }
}

?>
