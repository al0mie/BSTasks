<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MissionStatus extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'missionstatus';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status'];

    public function status() {
        return $this->hasMany('App\Mission');
    }   
}