<?php

namespace Yousafitpro\PhotoLibrary;
    use Illuminate\Support\ServiceProvider;
    class UcPhotoLibraryServiceProvider extends ServiceProvider {
        public function boot()
        {
            //gjhgjhgasdasdasd
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
            $this->loadViewsFrom(__DIR__.'/resources/views', 'UcPhotoLib');

            $this->loadMigrationsFrom(__DIR__.'/migrations');

        }
        public function register()
        {

      }
   }
?>
