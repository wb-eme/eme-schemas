<?php

namespace Eme\Schemas\Solicits\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Mixin\GetNodeResponse\GetNodeResponseV1;
use Gdbots\Schemas\Ncr\Mixin\GetNodeResponse\GetNodeResponseV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\GetNodeResponse\GetNodeResponseV1Trait;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Trait;

final class GetSolicitResponseV1 extends AbstractMessage implements
    GetSolicitResponse,
    ResponseV1,
    GetNodeResponseV1
  
{
    use ResponseV1Trait;
    use GetNodeResponseV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:request:get-solicit-response:1-0-0', __CLASS__,
            [],
            [
                ResponseV1Mixin::create(), 
                GetNodeResponseV1Mixin::create()
            ]
        );
    }
}
