<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/src/SMTP.php';

require 'includes/init.php';

$email = '';
$subject = '';
$message = '';

$sent = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $errors = [];

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $errors[] = 'Please enter a valid email.';
    }

    if ($subject == '') {
        $errors[] = 'Please enter a subject.';
    }

    if ($message == '') {
        $errors[] = 'Please enter a message.';
    }

    if (empty($errors)) {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = SMTP_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = SMTP_USER;
            $mail->Password   = SMTP_PASS;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = SMTP_PORT;

            //Recipients
            $mail->setFrom('testing@nghiadnt.cf', 'Contact Mail');
            $mail->addAddress('myemail@nghiadnt.cf', 'Trong Nghia');
            $mail->addReplyTo($email, 'My Customer');

            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Content
            // $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;
            // $mail->AltBody = '...';

            $mail->send();
            $sent = true;
        } catch (Exception $e) {
            $errors[] = $mail->ErrorInfo;
        }
    }
}
?>

<?php require 'includes/header.php'; ?>

<h2>Contact</h2>

<?php if ($sent): ?>
    <p>Message has been sent.</p>
<?php else: ?>

    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="post" id="formContact">
        <div class="mb-3">
            <label class="form-label" for="email">Your email</label>
            <input class="form-control" name="email" id="email" type="email" placeholder="Your email" value="<?= htmlspecialchars($email) ?>" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="subject">Subject</label>
            <input class="form-control" name="subject" id="subject" placeholder="Subject" value="<?= htmlspecialchars($subject) ?>" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="message">Message</label>
            <textarea class="form-control" name="message" id="message" placeholder="Message" rows="5"><?= htmlspecialchars($message) ?></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Send</button>
    </form>

<?php endif; ?>

<?php require 'includes/footer.php'; ?>