<?php
include('functions.php');

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
    <h2>Home Page</h2>
</div>
<div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <!-- logged in user information -->
    <div class="profile_info">
        <img src="images/user_profile.png">

        <div>
            <?php if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['username']; ?></strong>

                <small>
                    <i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                    <br>
                    <a href="index.php?logout='1'" style="color: red;">logout</a>
                </small>

            <?php endif ?>
        </div>
    </div>
</div>
<br>
<div class="container">
    <form method="POST" enctype="multipart/form-data" action="index.php">
        <input type="file" name="file">
        <input type="submit" name="upload">
    </form>
</div>

<?php

$files = scandir("upload");

for ($a = 2; $a < count($files); $a++) {
    ?>
    <p>
        <a download="<?php echo $files[$a] ?>" href="uploads/<?php echo $files[$a] ?>"><?php echo $files [$a] ?></a>
    </p>
    <?php
}
?>

</body>
</html>