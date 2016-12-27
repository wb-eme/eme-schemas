<?php

namespace Eme\Schemas\Solicits;

use Gdbots\Pbj\WellKnown\UuidIdentifier;
use Gdbots\Schemas\Ncr\NodeRef;

final class SolicitId extends UuidIdentifier
{
    /**
     * @return NodeRef
     */
    public function toNodeRef()
    {
        return NodeRef::fromString("eme:solicit:{$this->toString()}");
    }
}
