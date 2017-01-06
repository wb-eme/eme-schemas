<?php
declare(strict_types=1);

namespace Eme\Schemas\Users;

use Gdbots\Pbj\WellKnown\UuidIdentifier;
use Gdbots\Schemas\Ncr\NodeRef;

final class UserId extends UuidIdentifier
{
    /**
     * @return NodeRef
     */
    public function toNodeRef(): NodeRef
    {
        return NodeRef::fromString("eme:user:{$this->toString()}");
    }
}
