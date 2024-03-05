<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Upload</title>
</head>
<body>
    <h2>Upload PDF</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="pdfFile">Select PDF file:</label>
        <input type="file" name="pdfFile" id="pdfFile" accept=".pdf" required>
        <button type="submit" name="submit">Upload</button>
    </form>
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["pdfFile"]["name"]);
    $uploadOk = 1;
    $pdfFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is a PDF
    if ($pdfFileType != "pdf") {
        echo "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, the file already exists.";
        $uploadOk = 0;
    }

    // Check file size (adjust as needed)
    if ($_FILES["pdfFile"]["size"] > 5 * 1024 * 1024) {
        echo "Sorry, your file is too large. Max file size is 5 MB.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // If everything is ok, try to upload file
        if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["pdfFile"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
