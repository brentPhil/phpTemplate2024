<?php

use Core\App;
use Core\Validator;
use Core\FileUpload;
use Http\Forms\ValidateForm;

$db = App::resolve(Core\Database::class);

// Validate form inputs
$forms = ValidateForm::validate([
    "first_name" => $_POST["first_name"],
    "last_name" => $_POST["last_name"],
    "username" => $_POST["username"],
    "email" => $_POST["email"],
]);

// Initialize variables
$profileFilePath = null;

// Check if a file was uploaded
if ($_FILES["profile"]["size"] > 0) {
    // Validate file
    $ValidateFile = Validator::file($_FILES["profile"], ['image/jpeg', 'image/png'], 5);

    if ($ValidateFile['success']) {
        $uploadResult = FileUpload::upload($_FILES["profile"]);

        if ($uploadResult['success']) {
            $profileFilePath = $uploadResult['message'];
        } else {
            $forms->error('profile', $uploadResult['message'])->throw();
        }
    } else {
        $forms->error('profile', $ValidateFile['message'])->throw();
    }
}

// Update profile information in the database
$query = 'UPDATE admins SET 
            first_name = :first_name,
            last_name = :last_name, 
            username = :username, 
            email = :email' .
    ($profileFilePath ? ', profile = :file' : '') .
    ' WHERE id = :id';

$params = [
    'first_name' => $_POST["first_name"],
    'last_name' => $_POST["last_name"],
    'username' => $_POST['username'],
    'email' => $_POST['email'],
    'id' => $_SESSION['user']['id'],
];

if ($profileFilePath) {
    $params['file'] = $profileFilePath;
}

$db->query($query, $params);

redirect('profile');
