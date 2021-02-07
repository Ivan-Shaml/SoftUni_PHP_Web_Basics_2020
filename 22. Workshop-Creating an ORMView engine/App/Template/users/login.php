<h2>Login Form</h2>

<?php /** @var \App\Data\ErrorDTO $error  */ ?>
<?php /** @var \App\Data\UserDTO $data */ ?>


<?php if($error): ?>
<span style="color: red"><?= $error->getMessage(); ?></span>
<br /><br />
<?php endif; ?>

<form method="post">
    <label>
        Username: <input type="text" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : null  ?>"/> <br/>
    </label>
    <label>
        Password: <input type="text" name="password" value="" /> <br/>
    </label>
    <label>
        <input type="submit" name="login" value="Login"/>
    </label>
</form>

<a href="index.php">back</a>