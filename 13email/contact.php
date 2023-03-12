<?php
require 'includes/init.php';

$email = '';
$subject = '';
$message = '';

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
        // ....
    }
}
?>

<?php require 'includes/header.php'; ?>

<h2>Contact</h2>

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

<?php require 'includes/footer.php'; ?>