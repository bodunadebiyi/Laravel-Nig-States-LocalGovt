<?php
/**
 * modify this and use appropriate namespace for model in your application
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
  protected $table = "states";

  public function localGovernments()
  {
    return $this->hasMany(LocalGovt::class, 'state_id');
  }
}
