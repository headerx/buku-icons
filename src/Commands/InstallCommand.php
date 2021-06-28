<?php

namespace HeaderX\BukuIcons\Commands;

use BladeUI\Icons\Factory;
use BladeUI\Icons\IconsManifest;
use HeaderX\BukuIcons\Models\Icon;
use HeaderX\BukuIcons\Models\IconSet;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class InstallCommand extends Command
{
    protected $signature = 'buku-icons:install';

    protected $description = 'Install Buku Icons.';

    public function handle(): int
    {
        if (File::missing($this->getLaravel()->bootstrapPath('cache/blade-icons.php'))) {
            $this->error('Please cache the icons first by running `php artisan icon:cache`.');

            return 1;
        }

        $this->callSilent('vendor:publish', ['--tag' => 'buku-icons-assets']);
        $this->callSilent('vendor:publish', ['--tag' => 'buku-icons-config']);
        $this->callSilent('vendor:publish', ['--tag' => 'buku-icons-views']);
        $this->callSilent('vendor:publish', ['--provider' => 'Laravel\Scout\ScoutServiceProvider']);
        $this->call('migrate');
        $this->call('buku-icons:import');
        $this->info('Installation complete.');

        return 0;
    }
}

