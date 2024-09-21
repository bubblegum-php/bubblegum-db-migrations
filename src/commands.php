<?php
use Bubblegum\Candyman\Candyman;
use Bubblegum\Commands\BubblegumDbMigrations\MakeMigration;
use Bubblegum\Commands\BubblegumDbMigrations\Migrate;

Candyman::registerCommand('make:migration', MakeMigration::class);
Candyman::registerCommand('migrate', Migrate::class);