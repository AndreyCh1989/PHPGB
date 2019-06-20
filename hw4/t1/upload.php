<?php
    const PICS_DIR = './pics';
    if ($_FILES['file']['error'] !== UPLOAD_ERR_OK)
       die("Upload failed with error code " . $_FILES['file']['error']);

    $file = PICS_DIR . DIRECTORY_SEPARATOR . basename($_FILES['file']['name']);

    if ($_FILES['file']['size'] > 4194304)
        die("Maximum file size exceeded (4194304) -> " . $_FILES['file']['size']);

    $extensions = ['jpg', 'png'];
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (!in_array($ext, $extensions)) {
        die('Prohibited extension -> ' . $ext);
    }

    move_uploaded_file($_FILES['file']['tmp_name'], $file);
    header("Location: ./index.php");
    die();
?>
