<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Entities\User;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create the user model
        $userModel = new UserModel();
        $groupModel = new GroupModel();

        // Create roles and permissions
        $groupModel->insert([
            'name'        => 'administrator',
            'description' => 'Administrator role'
        ]);

        $groupModel->insert([
            'name'        => 'petugas',
            'description' => 'Petugas role'
        ]);

        // Create users
        $users = [
            [
                'email'    => 'admin@mail.com',
                'username' => 'admin',
                'password' => 'password', // Ensure this meets your password requirements
                'active'   => 1,
            ],
            [
                'email'    => 'petugas@mail.com',
                'username' => 'petugas',
                'password' => 'password', // Ensure this meets your password requirements
                'active'   => 1,
            ],
        ];
        
        foreach ($users as $userData) {
            // Create a new user entity
            $user = new User($userData);

            // Save the user
            $userModel->save($user);

            // Get the ID of the created user
            $userId = $userModel->getInsertID();

            // Assign roles to users
            if ($userData['username'] === 'admin') {
                $groupModel->addUserToGroup($userId, 1);
            } else if ($userData['username'] === 'petugas') {
                $groupModel->addUserToGroup($userId, 2);
            }
        }
    }
}
