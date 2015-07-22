<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'members';
    public $timestamps = false;

    public static $rules = array(
        'name'=>'required|min:2|alpha',
        'name'=>'required|min:2|alpha',
    );


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'position'];
 

    public function missions() {
        return $this->belongsToMany('App\Mission');
    }   
}