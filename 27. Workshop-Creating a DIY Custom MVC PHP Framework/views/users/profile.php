<?php /** @var $model \DTO\ViewModels\UserProfileViewModel */?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>
<h1>Profile</h1>
<h2 style="color:green">
    Welcome, <?= $model->getUsername(); ?>
</h2>

</body>
</html>