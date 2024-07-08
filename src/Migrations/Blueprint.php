<?php

namespace Bubblegum\Migrations;


/**
 * Blueprint class for table modifying
 */
class Blueprint
{
    /**
     * @var Column[]
     */
    private array $columns;

    /**
     * @param Column[] $columns
     */
    public function __construct(array $columns = []){
        $this->columns = $columns;
    }

    /**
     * @return array
     */
    public function getColumns(): array {
        return $this->columns;
    }

    /**
     * @return string
     */
    public function toSqlPart(): string
    {
        return implode(',', $this->columnSqlParts());
    }

    /**
     * @return string[]
     */
    public function columnSqlParts(): array
    {
        return array_map(
            function ($column) {
                return $column->toSqlPart();
            },
            $this->columns
        );
    }

    /**
     * @param Column $column
     * @return Column
     */
    public function addColumn(Column $column): Column
    {
        $this->columns[] = $column;
        return $column;
    }

    /**
     * @param string $columnName
     * @param string $columnType
     * @return Column
     */
    public function createAndAddColumn(string $columnName, string $columnType): Column
    {
        $column = new Column($columnName, $columnType);
        return $this->addColumn($column);
    }

    // INTEGERS

    /**
     * @param string $name
     * @return Column
     */
    public function int2(string $name): Column
    {
        return $this->createAndAddColumn($name, 'int2');
    }

    /**
     * @param string $name
     * @return Column
     */
    public function int4(string $name): Column
    {
        return $this->createAndAddColumn($name, 'int4');
    }

    /**
     * @param string $name
     * @return Column
     */
    public function int8(string $name): Column
    {
        return $this->createAndAddColumn($name, 'int8');
    }

    /**
     * @param string $name
     * @return Column
     */
    public function smallint(string $name): Column
    {
        return $this->int2($name);
    }

    /**
     * @param string $name
     * @return Column
     */
    public function int(string $name): Column
    {
        return $this->int4($name);
    }

    /**
     * @param string $name
     * @return Column
     */
    public function bigint(string $name): Column
    {
        return $this->int8($name);
    }

    // BOOLEAN

    /**
     * @param string $name
     * @return Column
     */
    public function bool(string $name): Column
    {
        return $this->createAndAddColumn($name, 'bool');
    }

    // SERIALS

    /**
     * @param string $name
     * @return Column
     */
    public function serial2(string $name): Column
    {
        return $this->createAndAddColumn($name, 'serial2');
    }

    /**
     * @param string $name
     * @return Column
     */
    public function serial4(string $name): Column
    {
        return $this->createAndAddColumn($name, 'serial4');
    }

    /**
     * @param string $name
     * @return Column
     */
    public function serial8(string $name): Column
    {
        return $this->createAndAddColumn($name, 'serial8');
    }

    /**
     * @param string $name
     * @return Column
     */
    public function smallserial(string $name): Column
    {
        return $this->serial2($name);
    }

    /**
     * @param string $name
     * @return Column
     */
    public function serial(string $name): Column
    {
        return $this->serial4($name);
    }

    /**
     * @param string $name
     * @return Column
     */
    public function bigserial(string $name): Column
    {
        return $this->serial8($name);
    }

        /**
     * @return Column
     */
    public function smallid(): Column
    {
        return $this->serial2('id');
    }

    /**
     * @return Column
     */
    public function id(): Column
    {
        return $this->serial4('id');
    }

    /**
     * @return Column
     */
    public function bigid(): Column
    {
        return $this->serial8('id');
    }

    // FLOATS

    /**
     * @param string $name
     * @return Column
     */
    public function float4(string $name): Column
    {
        return $this->createAndAddColumn($name, 'float4');
    }

    /**
     * @param string $name
     * @return Column
     */
    public function float8(string $name): Column
    {
        return $this->createAndAddColumn($name, 'float8');
    }

    /**
     * @param string $name
     * @return Column
     */
    public function float(string $name): Column
    {
        return $this->float4($name);
    }

    /**
     * @param string $name
     * @return Column
     */
    public function doublePrecision(string $name): Column
    {
        return $this->float8($name);
    }

    // CHARACTERS

    public function char(string $name, int $length = 128): Column
    {
        return $this->createAndAddColumn($name, "char($length)");
    }

    public function varchar(string $name, int $length = 128): Column
    {
        return $this->createAndAddColumn($name, "varchar($length)");
    }

    /**
     * @param string $name
     * @return Column
     */
    public function text(string $name): Column
    {
        return $this->createAndAddColumn($name, 'text');
    }

    // BIT

    /**
     * @param string $name
     * @param int $length
     * @return Column
     */
    public function bit(string $name, int $length = 128): Column
    {
        return $this->createAndAddColumn($name, "bit($length)");
    }

    /**
     * @param string $name
     * @param int $length
     * @return Column
     */
    public function varbit(string $name, int $length = 128): Column
    {
        return $this->createAndAddColumn($name, "varbit($length)");
    }

    // MONEY

    /**
     * @param string $name
     * @return Column
     */
    public function money(string $name): Column
    {
        return $this->createAndAddColumn($name, 'money');
    }

    // JSON AND XML

    /**
     * @param string $name
     * @return Column
     */
    public function json(string $name): Column
    {
        return $this->createAndAddColumn($name, 'json');
    }

    /**
     * @param string $name
     * @return Column
     */
    public function xml(string $name): Column
    {
        return $this->createAndAddColumn($name, 'xml');
    }

    // TIME

    /**
     * @param string $name
     * @return Column
     */
    public function time(string $name): Column
    {
        return $this->createAndAddColumn($name, 'time');
    }

    /**
     * @param string $name
     * @return Column
     */
    public function timestamp(string $name): Column
    {
        return $this->createAndAddColumn($name, 'timestamp');
    }

    /**
     * @return Column
     */
    public function createdAt(): Column
    {
        return $this->timestamp('created_at')->defaultValue('CURRENT_TIMESTAMP');
    }

    /**
     * @return Column
     */
    public function updatedAt(): Column
    {
        return $this->timestamp('updated_at')->defaultValue('CURRENT_TIMESTAMP');
    }
}