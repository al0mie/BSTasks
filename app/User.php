<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['firstname', 'lastname', 'email'];

    public static $rules = array(
        'firstname'=>'required|min:2|alpha',
        'lastname'=>'required|min:2|alpha',
        'email'=>'required|email|unique:users,email,',
   );


   public function books() {
        return $this->hasMany('App\Book');
    }
}
