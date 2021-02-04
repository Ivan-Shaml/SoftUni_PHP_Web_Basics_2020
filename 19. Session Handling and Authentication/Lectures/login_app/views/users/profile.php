<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>
<h1>Profile</h1>
<h2 style="color:green">
    Welcome, <?= $user->getUsername(); ?>
</h2>

<?php if ($user->getProfilePictureUrl() === null): ?>
    <h2>Нямаш профилна снимка</h2>
<?php else: ?>
        <img width="10%" height="15%" src="/SoftUni_PHP_Web_Basics/19.%20Session%20Handling%20and%20Authentication/Lectures/login_app/<?= $user->getProfilePictureUrl(); ?>" />
        <br/>
<?php endif; ?>

<a href="edit_profile.php">Edit your profile</a>
</body>
</html>