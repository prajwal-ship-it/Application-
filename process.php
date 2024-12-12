<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $position = trim($_POST['position']);

    $uploadDir = 'user_uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === 0) {
        $fileTmpPath = $_FILES['resume']['tmp_name'];
        $fileName = time() . '_' . basename($_FILES['resume']['name']);
        $destinationPath = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $destinationPath)) {
            echo "<h2>Application Received Successfully!</h2>";
            echo "<p><strong>Name:</strong> $name</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Phone:</strong> $phone</p>";
            echo "<p><strong>Position:</strong> $position</p>";
            echo "<p><strong>Resume:</strong> <a href='$destinationPath' target='_blank'>View File</a></p>";
        } else {
            echo "<p>File upload failed.</p>";
        }
    } else {
        echo "<p>Please upload your resume.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>
