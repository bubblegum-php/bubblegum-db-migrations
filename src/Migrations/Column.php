<?php

namespace Bubblegum\Migrations;

/**
 *
 */
class Column
{
    /**
     * @var string|null
     */
    protected ?string $defaultValue = null;
    /**
     * @var bool
     */
    protected bool $nullable = false;
    /**
     * @var bool
     */
    protected bool $primary = false;
    /**
     * @var string|null
     */
    protected ?string $afterColumnName = null;
    /**
     * @var bool
     */
    protected bool $unique = false;

    /**
     * @param string $name
     * @param string $type
     */
    public function __construct(
        protected string $name,
        protected string $type)
    {}

    /**
     * @return bool
     */
    public function toSqlPart(): bool
    {
        return $this->name . ' ' . $this->type
            . (!$this->nullable ? ' NOT NULL' : '')
            . ($this->defaultValue !== null ? ' DEFAULT ' . $this->defaultValue : '')
            . ($this->primary ? ' PRIMARY KEY' : '')
            . ($this->afterColumnName !== null ? ' AFTER ' . $this->afterColumnName : '')
            . ($this->unique ? ' UNIQUE' : '');
    }

    /**
     * @return $this
     */
    public function nullable(): Column
    {
        $this->nullable = true;
        return $this;
    }

    /**
     * @return $this
     */
    public function primary(): Column
    {
        $this->primary = true;
        return $this;
    }

    /**
     * @param string $columnName
     * @return $this
     */
    public function afterColumn(string $columnName): Column
    {
        $this->afterColumnName = $columnName;
        return $this;
    }

    /**
     * @return $this
     */
    public function unique(): Column
    {
        $this->unique = true;
        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function defaultValue($value): Column
    {
        $this->defaultValue = $value;
        return $this;
    }
}