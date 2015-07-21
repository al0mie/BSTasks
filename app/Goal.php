<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'goals';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type'];
 

    public function status() {
        return $this->belongsTo('App\GoalStatus');
    }   

    public function mission()
    {
        return $this->belongsTo('App\Mission');
    }


   
}