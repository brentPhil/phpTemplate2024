<?php


use Core\App;
use Core\Authenticator;
use Http\Forms\ValidateForm;

$db = App::resolve(Core\Database::class);

$forms = ValidateForm::validate($attribute = [
    "username" => $_POST["username"],
    "email" => $_POST["email"],
    "password" => $_POST["password"]
]);

$user = $db->query('select * from admins where email = :email', ['email' => $attribute['email']])->fetch();

if (! $user){
    $db->query('insert into admins (username, email, password) values (:username, :email, :password)', [
        'username' => $_POST["username"],
        'email' => $attribute['email'],
        'password' => password_hash($attribute['password'], PASSWORD_BCRYPT)
    ]);

    (new Authenticator)->login([$attribute['email']]);

    redirect('dashboard');
}

$forms->error('exist', "Email has already been registered would you like to log in instead? <a class='link link-info' href=" . root('session'). ">Login here</a>")
    ->throw();

redirect($router->previousUrl());

