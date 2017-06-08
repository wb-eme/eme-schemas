<?php
declare(strict_types=1);

namespace Eme\Schemas\Accounts;

use Gdbots\Pbj\Assertion;
use Gdbots\Pbj\WellKnown\StringIdentifier;
use Gdbots\Schemas\Ncr\NodeRef;

final class AccountId extends StringIdentifier
{
    /**
     * @param string $accountId
     *
     * @throws \InvalidArgumentException
     */
    protected function __construct($accountId)
    {
        Assertion::regex($accountId, '/^[A-Za-z0-9]+$/');
        parent::__construct($accountId);
    }

    /**
     * @return NodeRef
     */
    public function toNodeRef(): NodeRef
    {
        return NodeRef::fromString("eme:account:{$this->toString()}");
    }
}
