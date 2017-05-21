<?php
$mailerInfoMessage = "";

if (($_SERVER["REQUEST_METHOD"] === "POST") 
        && filter_var($_POST["mailAddress"], FILTER_VALIDATE_EMAIL) 
        && strlen($_POST["message"]) > 1   && strlen($_POST["message"]) <= CHAR_LIMIT) {

    require_once 'vendor/autoload.php';
    $mailer = new PHPMailer();

    // config
    $mailer->isSMTP();
    $mailer->Host = "smtp.gmail.com";
    $mailer->SMTPAuth = true;
    $mailer->Username = "ccwrctestcc@gmail.com";
    $mailer->Password = "tajnehaslo"; // please do not change :)
    $mailer->SMTPSecure = "tls";
    $mailer->Port = 587;

    // sending
    $mailer->CharSet = "UTF-8";
    $mailer->setFrom($_POST["mailAddress"]);
    $mailer->addAddress("ccwrcltd@gmail.elo", "Funky Koval");
    $mailer->addReplyTo($_POST["mailAddress"]);
    $mailer->Subject = "Mail from morse code site";
    $mailer->Body = htmlentities(trim($_POST["message"]), ENT_QUOTES, "UTF-8");

    if (!$mailer->send()) {
        $mailerInfoMessage = $textTranslate[$language]['errorSendingMessage'];
    } else {
        $mailerInfoMessage = $textTranslate[$language]['messageSent'];
    }
} else if (($_SERVER["REQUEST_METHOD"] === "POST") && isset($_POST["mailAddress"]) 
        && isset($_POST["message"])) {
    $mailerInfoMessage = $textTranslate[$language]['enterAllFieldsCorrectly'];
}
?>





<div id="divContent">

    <br/>
    <h3><?= $textTranslate[$language]['haveYouNoticedSendThemToMe'] ?></h3>
    
    <form method="POST" action="">
        <br/>
        <label>
            <?= $textTranslate[$language]['enterYourEmail'] ?>:<br/>
            <input type="email" name="mailAddress" required="required" size="33"/>
        </label>

        <br/><br>
        <label>
            <?= $textTranslate[$language]['enterAmessage'] ?>:<br/>
            <textarea name="message" cols="50" rows="5" required="required"></textarea>
        </label>

        <br/>
        <input type="submit" value="<?= $textTranslate[$language]['send'] ?>"/>
    </form>
    
    <p><?=$mailerInfoMessage?></p>

</div>

