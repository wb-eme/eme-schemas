<?php

namespace Eme\Schemas\Users\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\GetEventsResponse\GetEventsResponseV1 as GdbotsPbjxGetEventsResponseV1;
use Gdbots\Schemas\Pbjx\Mixin\GetEventsResponse\GetEventsResponseV1Mixin as GdbotsPbjxGetEventsResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1 as GdbotsPbjxResponseV1;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Mixin as GdbotsPbjxResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Trait as GdbotsPbjxResponseV1Trait;

final class GetUserHistoryResponseV1 extends AbstractMessage implements
    GetUserHistoryResponse,
    GdbotsPbjxResponseV1,
    GdbotsPbjxGetEventsResponseV1
  
{
    use GdbotsPbjxResponseV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:users:request:get-user-history-response:1-0-0', __CLASS__,
            [],
            [
                GdbotsPbjxResponseV1Mixin::create(), 
                GdbotsPbjxGetEventsResponseV1Mixin::create()
            ]
        );
    }
}
