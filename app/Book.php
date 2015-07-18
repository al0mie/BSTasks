<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'books';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'author', 'year', 'genre'];

    public static $rules = array(
        'title'=>'required|min:2|alpha',
        'author'=>'required|min:2|alpha',
        'year'=>'required|min:4|integer',
        'genre'=>'required|min:2|alpha',
   );

    public function users()
    {
        return $this->belongsToMany('App\User')
                    ->withPivot('date_booking', 'date_return');
    }   
}
