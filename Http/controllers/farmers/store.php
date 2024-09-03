<?php

use Core\App;
use Core\Validator;
use Core\FileUpload;
use Http\Forms\ValidateForm;

$db = App::resolve(Core\Database::class);
// Validate form inputs
$forms = ValidateForm::validate(array_merge([
    "first_name" => $_POST["first_name"],
    "surname" => $_POST["surname"],
    "sex" => $_POST["sex"],
    "barangays_id" => $_POST["barangays_id"],
    "contact_number" => $_POST["contact_number"],
    "date_birth" => $_POST["date_birth"],
    "civil_status" => $_POST["civil_status"],
    "enrollment" => $_POST["enrollment"],
    "reference" => $_POST["reference"],
], $_POST["civil_status"] === 'Married' ? ["name_spouse" => $_POST["name_spouse"]] : []));

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

// Insert data into the database
$query = 'INSERT INTO farmers (
            profile,
            enrollment,
            reference,
            surname,
            first_name,
            middle_name,
            extension_name,
            sex,
            building_no,
            street,
            barangays_id,
            contact_number,
            date_birth,
            civil_status,
            name_spouse
        ) VALUES (
            :profile,
            :enrollment,
            :reference,
            :surname,
            :first_name,
            :middle_name,
            :extension_name,
            :sex,
            :building_no,
            :street,
            :barangays_id,
            :contact_number,
            :date_birth,
            :civil_status,
            :name_spouse
        )';

$params = [
    'profile' => $profileFilePath,
    'enrollment' => $_POST["enrollment"],
    'reference' => $_POST["reference"],
    'surname' => $_POST["surname"],
    'first_name' => $_POST["first_name"],
    'middle_name' => $_POST["middle_name"],
    'extension_name' => $_POST["extension_name"],
    'sex' => $_POST["sex"],
    'building_no' => $_POST["building_no"],
    'street' => $_POST["street"],
    'barangays_id' => $_POST["barangays_id"],
    'contact_number' => $_POST["contact_number"],
    'date_birth' => $_POST["date_birth"],
    'civil_status' => $_POST["civil_status"],
    'name_spouse' => $_POST["name_spouse"],
];

$db->query($query, $params);

redirect('farmers/create');
