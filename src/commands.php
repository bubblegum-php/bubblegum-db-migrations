<?php
use Bubblegum\Candyman\Candyman;
use Bubblegum\Commands\BubblegumDbMigrations\MakeMigration;

Candyman::registerCommand('make:migration', MakeMigration::class);