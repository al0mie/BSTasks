<?php 
namespace App\Repositories;

use App\User;

class UserRepository {

    public function findByUserNameOrCreate($userData) {
        $user = User::where('email', '=', $userData->email)->first();
        if(!$user) {
            $user = User::create([
                'firstname' => $userData->first_name,
                'lastname' => $userData->last_name,
                'email' => $userData->avatar,

            ]);
        }

        $this->checkIfUserNeedsUpdating($userData, $user);
        return $user;
    }

    public function checkIfUserNeedsUpdating($userData, $user) {
        $socialData = [
            	'firsname' => $userData['first_name'],
                'lastname' => $userData['last_name'],
                'email' => $userData['email'],
        ];
        $dbData = [
            	'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'email' => $user->email,
        ];

        if (!empty(array_diff($socialData, $dbData))) {
        	$user->firstname = $userData['first_name'];
            $user->lastname = $userData['last_name'];
            $user->email = 	$userData['email'];
            $user->save();
        }
    }
}