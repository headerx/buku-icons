<?php

namespace HeaderX\BukuIcons;

use HeaderX\BukuIcons\Commands\ImportIconsCommand;
use HeaderX\BukuIcons\Commands\InstallCommand;
use HeaderX\BukuIcons\Http\Livewire\IconSearch;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class BukuIconsServiceProvider extends PackageServiceProvider
{
    public function bootingPackage(): void
    {
        Blade::component('buku-icons::components.p', 'buku-icons::p');
        Blade::component('buku-icons::components.footer', 'buku-icons::footer');
        Blade::component('buku-icons::components.h3', 'buku-icons::h3');
        Blade::component('buku-icons::components.h4', 'buku-icons::h4');
        Blade::component('buku-icons::components.h5', 'buku-icons::h5');
        Blade::component('buku-icons::components.icon-link', 'buku-icons::icon-link');
        Blade::component('buku-icons::components.layout', 'buku-icons::layout');
        Livewire::component('buku-icons::icon-search', IconSearch::class);
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('buku-icons')
            ->hasConfigFile()
            ->hasViews()
            ->hasRoute('web')
            ->hasCommand(ImportIconsCommand::class)
            ->hasCommand(InstallCommand::class)
            ->hasMigration('create_icons_table')
            ->hasAssets();
    }
}
