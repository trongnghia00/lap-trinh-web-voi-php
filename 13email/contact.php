<?php
require 'includes/init.php';
?>

<?php require 'includes/header.php'; ?>

<h2>Contact</h2>

<form method="post">
    <div class="mb-3">
        <label class="form-label" for="email">Your email</label>
        <input class="form-control" name="email" id="email" type="email" placeholder="Your email" />
    </div>
    <div class="mb-3">
        <label class="form-label" for="subject">Subject</label>
        <input class="form-control" name="subject" id="subject" placeholder="Subject" />
    </div>
    <div class="mb-3">
        <label class="form-label" for="message">Message</label>
        <textarea class="form-control" name="message" id="message" placeholder="Message" rows="5"></textarea>
    </div>
    <button class="btn btn-primary" type="submit">Send</button>
</form>

<?php require 'includes/footer.php'; ?>