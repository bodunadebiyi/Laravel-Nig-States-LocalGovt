<?php
namespace Bodunde\SLG;

use illuminate\Support\ServiceProvider;

class SLGServiceProvider extends ServiceProvider
{
  public function register()
  {

  }

  public function boot()
  {
    $this->publishMigrations();
    $this->publishModels();
    $this->publishSeeders();
  }

  public function publishMigrations()
  {
    $this->updateMigrationFileNames();
    $this->publishes([__DIR__ . '/migrations' => database_path() . '/migrations']);
  }

  public function publishModels()
  {
    $this->publishes([__DIR__ . '/models' => app_path()]);
  }

  public function publishSeeders()
  {
    $this->publishes([__DIR__ . '/seeders' => database_path() . '/seeds']);
  }

  public function updateMigrationFileNames()
  {
    $files = scandir(__DIR__ . '/migrations/');

    foreach ($files as $file) {
      if (substr($file, 0, 1) !== '.') {
        $d = Date("Y_m_d_His");
        $date = !isset($date) ?
                  (intval(substr($d, -1)) !== 0 ? $d : substr($d, 0, -1) . (intval(substr($d, -1)) + 1)) :
                  $this->reduceDate($date);
        $source = __DIR__ . '/migrations/'.$file;
        $dest = substr($file, 0, 1) == '0' ?
                  __DIR__ . '/migrations/'.$date.'_'.substr($file, 18) :
                  __DIR__ . '/migrations/'.$file;

        rename($source, $dest);
      }
    }
  }

  private function reduceDate($date)
  {
    return substr($date, 0, -1) . (intval(substr($date, -1)) -1);
  }
}