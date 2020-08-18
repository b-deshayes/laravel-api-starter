<?php

namespace App\Providers;

use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\EloquentRepositoryInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Finder\SplFileInfo;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);

        $files = collect(File::files(app_path('Repositories/Eloquent')));
        $files->filter(static function (SplFileInfo $file) {
            return $file->getFilenameWithoutExtension() !== 'BaseRepository';
        })->each(function (SplFileInfo $file) {
            $name = $file->getFilenameWithoutExtension();
            $this->app->bind(
                'App\\Repositories\\' . $name . 'Interface',
                'App\\Repositories\\Eloquent\\' . $name
            );
        });
    }
}
