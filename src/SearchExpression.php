<?php

declare(strict_types=1);

namespace Ddeboer\Imap;

use Ddeboer\Imap\Search\AbstractCondition;

/**
 * Defines a search expression that can be used to look up email messages.
 */
class SearchExpression
{
    /**
     * The conditions that together represent the expression.
     *
     * @var array
     */
    private $conditions = [];

    /**
     * Adds a new condition to the expression.
     *
     * @param AbstractCondition $condition the condition to be added
     *
     * @return SearchExpression
     */
    public function addCondition(AbstractCondition $condition): self
    {
        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * Converts the expression to a string that can be sent to the IMAP server.
     *
     * @return string
     */
    public function __toString(): string
    {
        return implode(' ', $this->conditions);
    }
}
