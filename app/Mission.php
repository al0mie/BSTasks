<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'missions';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'status'];

    public function status() {
        return $this->belongsTo('App\MissionStatus');
    }   

    public function members() {
        return $this->belongsToMany('App\Member');
    }   

    public function goals()
    {
        return $this->hasMany('App\Goal');
    }
}