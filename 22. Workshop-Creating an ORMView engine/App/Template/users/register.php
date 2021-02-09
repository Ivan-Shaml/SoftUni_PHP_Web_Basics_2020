<h2>Register Form</h2>

<?php /** @var \App\Data\ErrorDTO $error  */ ?>
<?php /** @var \App\Data\UserDTO $data */ ?>


<?php if($error): ?>
    <span style="color: red"><?= $error->getMessage(); ?></span>
    <br /><br />
<?php endif; ?>

<form method="post">
    <label>
        Username: <input type="text" name="username" value="<?= $data === null ? null : $data->getUsername() ?>"/> <br />
    </label>
    <label>
        Password: <input type="text" name="password"/> <br />
    </label>
    <label>
        Confirm Password: <input type="text" name="confirm_password"/> <br />
    </label>
    <label>
        First Name: <input type="text" name="first_name" value="<?= $data === null ? null : $data->getFirstName() ?>"/> <br />
    </label>
    <label>
        Last Name: <input type="text" name="last_name" value="<?= $data === null ? null : $data->getLastName() ?>"/> <br />
    </label>
    <label>
        Birthday: <input type="text" name="born_on" value="<?= $data === null ? null : $data->getBornOn() ?>"/> <br />
    </label>
    <input type="submit" name="register" value="Register"/> <br />

</form>

<a href="index.php">back</a>