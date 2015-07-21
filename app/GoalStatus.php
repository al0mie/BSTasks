<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoalStatus extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'goalstatus';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status'];

    public function status() {
        return $this->hasMany('App\Goal');
    }   
}