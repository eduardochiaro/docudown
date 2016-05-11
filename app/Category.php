<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

  protected $guarded = ['id'];

  public function file()
  {
    return $this->hasOne('App\File');
  }

  public function parent()
  {
      return $this->belongsTo('App\Category', 'parent_id');
  }

  public function children()
  {
      return $this->hasMany('App\Category', 'parent_id');
  }
}
