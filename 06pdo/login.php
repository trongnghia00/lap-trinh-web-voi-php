<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['username'] == 'nghia' && $_POST['password'] == 'secret')  {
        session_regenerate_id(true);
        $_SESSION['logged_in'] = true;
        header("Location: myblog.php");
    } else {
        $error = "Login incorrect.";
    }
}
?>

<?php require 'includes/header.php'; ?>

<h2>Login</h2>

<?php if (! empty($error)): ?>
    <p><?= $error ?></p>
<?php endif; ?>

<form method="post">
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" />
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" />
    </div>
    <button type="submit">Log in</button>
</form>

<?php require 'includes/footer.php'; ?>