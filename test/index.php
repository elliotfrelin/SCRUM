<?php

?>

    <form method="POST" enctype="multipart/form-data" action="../upload.php">
        <input type="file" name="file">
        <input type="submit" name="upload">
    </form>

<?php

$files = scandir("upload");
print_r($files);
for ($a = 2; $a < count($files); $a++) {
    ?>
    <p>
        <a download="<?php echo $files[$a] ?>"> href="uploads/<?php echo $files[$a] ?>"><?php echo $files [$a] ?></a>
    </p>
    <?php
}