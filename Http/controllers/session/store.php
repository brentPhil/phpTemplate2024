<?php

use Core\Authenticator;
use Http\Forms\ValidateForm;

$forms = ValidateForm::validate($attributes = [
    "email" => $_POST["email"],
    "password" => $_POST["password"]
]);

$signedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);

if (! $signedIn) {
    $forms->error('exist', 'No account found for that email and password')
        ->throw();
}

redirect('dashboard');
