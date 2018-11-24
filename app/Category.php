<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['category_name','category_slug'];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function getRouteKeyName()
    {
        return 'category_slug';
    }


}
