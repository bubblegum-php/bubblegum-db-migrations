<?php

namespace Bubblegum\Migrations;

use Bubblegum\Database\DB;

class Table
{
    /**
     * @param string $tableName
     * @param callable $blueprintFunction
     * @return void
     */
    public static function create(string $tableName, callable $blueprintFunction): void
    {
        $blueprint = new Blueprint();
        $blueprintFunction($blueprint);
        DB::createTable($tableName, $blueprint->columnSqlParts());
    }

    public static function drop(string $tableName): void
    {
        DB::dropTable($tableName);
    }
}