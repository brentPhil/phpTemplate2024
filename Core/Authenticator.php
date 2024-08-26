<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password): bool
    {
        $db = App::getContainer()->resolve(Database::class);
        
        $user = $db->query('select * from admins where email = :email', [
            'email' => $email
        ])->fetch();

        if (password_verify($password, $user['password'])){

            $this->login([
                'id' => $user['id'],
            ]);

            return true;

        }

        return false;
    }

    public function login($user): void
    {
        extract($user);
        $_SESSION['user'] = $user;
    }
    public function logout(): void
    {
        Session::destroy();
    }
}