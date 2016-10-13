<?php
/**
 * modify this and use appropriate namespace for model in your application
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalGovt extends Model
{
  protected $table = "local_govt";

  public function state()
  {
    return $this->belongsTo(State::class);
  }
}
