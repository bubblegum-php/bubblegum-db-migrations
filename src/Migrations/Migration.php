<?php

namespace Bubblegum\Migrations;

abstract class Migration
{
    /**
     * @return void
     */
    abstract public function up(): void;

    /**
     * @return void
     */
    abstract public function down(): void;
}