<?php

function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
};

if (!empty($_POST['submit']) && isset($_FILES['attachment'])) {

    $from_email         = 'dummyformailing@gmail.com';
    $sender_name = $_POST["sender_name"];
    $recipient_email = $_POST["recipient"];
    $reply_to_email = $from_email;
    $subject     = $_POST["subject"];
    $message     = $_POST["message"];

    $tmp_name = $_FILES['attachment']['tmp_name'];
    $name     = $_FILES['attachment']['name'];
    $size     = $_FILES['attachment']['size'];
    $type     = $_FILES['attachment']['type'];
    $error     = $_FILES['attachment']['error'];

    if ($type != "application/pdf") {
        die("hanya menerima file bentuk PDF");
    }
    if ($size > 1000000) {
        die('ukuran file lebih dari 1MB');
    }

    $handle = fopen($tmp_name, "r");
    $content = fread($handle, $size);
    fclose($handle);

    $encoded_content = chunk_split(base64_encode($content));

    $boundary = md5("random");

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "From:" . $from_email . "\r\n";
    $headers .= "Reply-To: " . $reply_to_email . "\r\n";
    $headers .= "Content-Type: multipart/mixed;";
    $headers .= "boundary = $boundary\r\n";

    $body = "--$boundary\r\n";
    $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $body .= chunk_split(base64_encode($message));

    $body .= "--$boundary\r\n";
    $body .= "Content-Type: $type; name=" . $name . "\r\n";
    $body .= "Content-Disposition: attachment; filename=" . $name . "\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n";
    $body .= "X-Attachment-Id: " . rand(1000, 99999) . "\r\n\r\n";
    $body .= $encoded_content;

    $sentMailResult = mail($recipient_email, $subject, $body, $headers);

    if ($sentMailResult) {
        $file = fopen("upload.log", "a+");
        fwrite($file, "pengirim :" . $sender_name . "\n");
        fwrite($file, "email tujuan :" . $recipient_email . "\n");
        fwrite($file, "subject :" . $subject . "\n");
        fwrite($file, "message :" . $message . "\n");
        fwrite($file, "attachement file :" . $name . "\n");
        fwrite($file, "status :" . "berhasil" . "\n\n");
        fclose($file);
        alert("email sukses di kirim");
        header("index.php");
    } else {
        $file = fopen("upload.log", "a+");
        fwrite($file, "pengirim :" . $sender_name . "\n");
        fwrite($file, "email tujuan :" . $recipient_email . "\n");
        fwrite($file, "subject :" . $subject . "\n");
        fwrite($file, "message :" . $message . "\n");
        fwrite($file, "attachement file :" . $name . "\n");
        fwrite($file, "status :" . "gagal" . "\n\n");
        fclose($file);
        alert("terjadi kegagalan saat mengirim email, pastikan isi semua form");
        header("index.php");
    }
}

?>  
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<section class="get-in-touch">
   <h1 class="title">FORM KIRIM EMAIL</h1>
   <form class="contact-form row">
      <div class="form-field col x-50">
         <input  id="sender" class="input-text js-input" type="text" name="sender_name" required>
         <label class="label" for="name">Nama</label>
      </div>
      <div class="form-field col x-50">
         <input id="email" class="input-text js-input" type="text" placeholder="Masukan Email Tujuan" value="contohemail@gmail.com" name="recipient" required>
         <label class="label" for="email">E-mail</label>
      </div>
      <div class="form-field col x-50">
         <input type="text" class="input-text js-input" id="subject"  name="subject" required>
         <label class="label" for="name">Judul</label>
      </div>  
      <div class="form-field col x-100">
         <input id="message" class="input-text js-input" rows="5" id="message" name="message" required>
         <label class="label" for="message">Message</label>
      </div>
      <div class="form-field col x-100 align-center">
      <label class="message">Attachement File:</label>
      <input type="file" class="submit-btn" id="file" placeholder="masukan File" name="attachment">
      </div>
      <div class="form-field col x-100 align-center">
      <input class="submit-btn" type="submit" value="Submit">
      </div>
   </form>
</section>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>
