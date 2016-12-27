<?php

namespace Eme\Schemas\Users;

use Gdbots\Pbj\WellKnown\UuidIdentifier;
use Gdbots\Schemas\Ncr\NodeRef;

final class UserId extends UuidIdentifier
{
    /**
     * @return NodeRef
     */
    public function toNodeRef()
    {
        return NodeRef::fromString("eme:user:{$this->toString()}");
    }
}
