<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

  protected $guarded = ['id'];

  public function files()
  {
    return $this->hasMany('App\Models\File');
  }

  public function parent()
  {
      return $this->belongsTo('App\Models\Category', 'parent_id');
  }

  public function children()
  {
      return $this->hasMany('App\Models\Category', 'parent_id');
  }
}
