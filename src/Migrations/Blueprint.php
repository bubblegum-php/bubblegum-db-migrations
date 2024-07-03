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

    /**
     * @param string $name
     * @return Column
     */
    public function bigint(string $name): Column
    {
        return $this->createAndAddColumn($name, 'bigint');
    }

    /**
     * @param string $name
     * @return Column
     */
    public function bigserial(string $name): Column
    {
        return $this->createAndAddColumn($name, 'bigserial');
    }

    /**
     * @param string $name
     * @return Column
     */
    public function boolean(string $name): Column
    {
        return $this->createAndAddColumn($name, 'boolean');
    }

    /**
     * @param string $name
     * @param int $length
     * @return Column
     */
    public function character(string $name, int $length): Column
    {
        return $this->createAndAddColumn($name, "bigint($length)");
    }

    /**
     * @param string $name
     * @return Column
     */
    public function int(string $name): Column
    {
        return $this->createAndAddColumn($name, 'int');
    }

    /**
     * @param string $name
     * @return Column
     */
    public function money(string $name): Column
    {
        return $this->createAndAddColumn($name, 'money');
    }

    /**
     * @param string $name
     * @return Column
     */
    public function real(string $name): Column
    {
        return $this->createAndAddColumn($name, 'real');
    }

    /**
     * @param string $name
     * @return Column
     */
    public function smallint(string $name): Column
    {
        return $this->createAndAddColumn($name, 'smallint');
    }

    /**
     * @param string $name
     * @return Column
     */
    public function smallserial(string $name): Column
    {
        return $this->createAndAddColumn($name, 'smallserial');
    }

    /**
     * @param string $name
     * @return Column
     */
    public function serial(string $name): Column
    {
        return $this->createAndAddColumn($name, 'serial');
    }

    /**
     * @param string $name
     * @return Column
     */
    public function text(string $name): Column
    {
        return $this->createAndAddColumn($name, 'text');
    }

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
}