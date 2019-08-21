<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quark extends Model
{

    protected $fillable = [
      'message'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function parent()
    {
        return $this->belongsTo('App\Quark', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Quark', 'parent_id');
    }

}


