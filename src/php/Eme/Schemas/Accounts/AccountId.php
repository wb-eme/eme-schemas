<?php

namespace Eme\Schemas\Accounts;

use Gdbots\Pbj\Assertion;
use Gdbots\Pbj\WellKnown\StringIdentifier;

final class AccountId extends StringIdentifier
{
    /**
     * @param string $accountId
     * @throws \InvalidArgumentException
     */
    protected function __construct($accountId)
    {
        Assertion::regex($accountId, '/^[A-Za-z0-9]+$/');
        parent::__construct($accountId);
    }
}
