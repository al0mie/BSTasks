<?php
namespace App\Repositories;

use App\User;

class UserRepository {
    public function findByUserNameOrCreate($userData) {
        $user = User::where('provider_id', '=', $userData->id)->first();
        if(!$user) {
            $user = User::create([
                'provider_id' => $userData->id,
                'email' => $userData->email,
                'active' => 1,
            ]);
        }

        $this->checkIfUserNeedsUpdating($userData, $user);
        return $user;
    }

    public function checkIfUserNeedsUpdating($userData, $user) {

        $socialData = [

            'email' => $userData->email,


        ];
        $dbData = [
         
            'email' => $user->email,
               
        ];

        if (!empty(array_diff($socialData, $dbData))) {
           
            $user->email = $userData->email;

 
            $user->save();
        }
    }
}