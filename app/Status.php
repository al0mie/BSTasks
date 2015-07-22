<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'status';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['status'];
 
}