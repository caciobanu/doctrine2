<?php

declare(strict_types=1);

namespace Doctrine\ORM\Query\AST;

/**
 * OrderByItem ::= (ResultVariable | StateFieldPathExpression) ["ASC" | "DESC"]
 */
class OrderByItem extends Node
{
    /**
     * @var mixed
     */
    public $expression;

    /**
     * @var string
     */
    public $type;

    /**
     * @param mixed $expression
     */
    public function __construct($expression)
    {
        $this->expression = $expression;
    }

    /**
     * @return bool
     */
    public function isAsc()
    {
        return strtoupper($this->type) === 'ASC';
    }

    /**
     * @return bool
     */
    public function isDesc()
    {
        return strtoupper($this->type) === 'DESC';
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch($sqlWalker)
    {
        return $sqlWalker->walkOrderByItem($this);
    }
}
