<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subscribers';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['email'];


}
