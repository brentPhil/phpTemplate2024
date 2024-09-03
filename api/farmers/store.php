<?php

use Core\App;
use Core\ValidationException;
use Core\Validator;
use Core\FileUpload;
use Http\Forms\ValidateForm;

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . '../functions.php';
require BASE_PATH . '../bootstrap.php';

$db = App::resolve(Core\Database::class);

header('Content-Type: application/json; charset=utf-8');

try {
    $forms = ValidateForm::validate(array_merge([
        "first_name" => $_POST["first_name"],
        "surname" => $_POST["surname"],
        "sex" => $_POST["sex"],
        "building_no" => $_POST["building_no"],
        "street" => $_POST["street"],
        "barangays_id" => $_POST["barangays_id"],
        "contact_number" => $_POST["contact_number"],
        "date_birth" => $_POST["date_birth"],
        "civil_status" => $_POST["civil_status"],
        "enrollment" => $_POST["enrollment"],
        "reference" => $_POST["reference"],
    ], $_POST["civil_status"] === 'Married' ? ["name_spouse" => $_POST["name_spouse"]] : []));

    $profileFilePath = null;

    if ($_FILES["profile"]["size"] > 0) {
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

    echo json_encode([
        'success' => true,
        'message' => 'Farmer information saved successfully!'
    ]);

} catch (ValidationException $exception) {
    echo json_encode([
        'success' => false,
        'errors' => $exception->getErrors()
    ]);
}