<?php

namespace Bubblegum\Commands\BubblegumDbMigrations;

use Bubblegum\Candyman\Command;
use Bubblegum\Candyman\Console;

class MakeMigration extends Command
{
    protected string $info = 'makes migration';
    protected array $argsNames = ['name'];

    public function handle($args): void
    {
        $code = <<<PHP
<?php
use Bubblegum\Migrations\Migration;


return new class extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        // TODO: implement down method
    }

    /**
     * @return void
     */
    public function down(): void
    {
        // TODO: implement down method
    }
};

PHP;
        file_put_contents(
            implode(DIRECTORY_SEPARATOR, ['database', 'Migrations', date('Y_m_d_G_i_s_u') . "_$args[0].php"]),
            $code
        );
        Console::done('Migration was successfully created.');
    }

}