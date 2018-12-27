<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'abouts';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['content','title','onTop'];

}
