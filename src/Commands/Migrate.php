<?php

namespace Bubblegum\Commands\BubblegumDbMigrations;

use Bubblegum\Candyman\Command;
use Bubblegum\Migrations\Migration;
use Bubblegum\Exceptions\CommandException;

class MakeMigration extends Command
{
    protected string $info = 'migrates all migrations';
    protected array $argsNames = ['up|down'];
    public function handle($args): void
    {
        if (!in_array($args[0], ['up', 'down'])) {
            throw new CommandException('Invalid migration action (only up and down are allowed)');
        }
        $folder = implode(DIRECTORY_SEPARATOR, ['database', 'Migrations']) . DIRECTORY_SEPARATOR;
        $files = array_diff(scandir($folder), array('.', '..'));
        foreach ($files as $file) {
            /* @var Migration $migration */
            $migration = new (require $folder . $file)();
            switch ($args[0]) {
                case 'up':
                    $migration->up();
                    break;
                case 'down':
                    $migration->down();
                    break;
            }
        }
    }

}