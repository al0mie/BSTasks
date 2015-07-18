<?php 
namespace App;

use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Contracts\Factory as Socialite; 
use App\Repositories\UserRepository; use Request; 

class AuthenticateUser {     

     private $socialite;
     private $auth;
     private $users;

     public function __construct(Socialite $socialite, Guard $auth, UserRepository $users) {   

        $this->socialite = $socialite;
       
        $this->users = $users;
       
        $this->auth = $auth;

    }

    public function execute($request, $listener) {
        
       if (!$request) return $this->getAuthorizationFirst();

       $user = $this->users->findByUserNameOrCreate($this->getFacebookUser());
       $this->auth->login($user, true);
       return $listener->userHasLoggedIn($user);
    }

    private function getAuthorizationFirst() { 
        
        return $this->socialite->driver('facebook')->redirect();
    }

    private function getFacebookUser() {
    
        return $this->socialite->with('facebook')->user();
    }
}