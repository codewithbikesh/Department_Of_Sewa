
<!--/* Get the name of the uploaded file */-->
<!--$filename = $_FILES['file']['name'];-->

<!--/* Choose where to save the uploaded file */-->
<!--$location = "files/".$filename;-->

<!--/* Save the uploaded file to the local filesystem */-->
<!--if ( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) { -->
<!--  echo 'Success'; -->
<!--} else { -->
<!--  echo 'Failure'; -->
<!--}-->
<?php
$target_dir = "files/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$documentFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file is a document (PDF) or not
    if($documentFileType != "pdf") {
        echo "Sorry, only PDF files are allowed.";
        // echo "<script>alert('Sorry, only PDF files are allowed.');</script>";
        $uploadOk = 0;
    }

    // Check file size (max 5MB)
    if ($_FILES["file"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Try to upload the file
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
?>

