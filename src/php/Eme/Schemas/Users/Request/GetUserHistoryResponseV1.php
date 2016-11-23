<?php

namespace Eme\Schemas\Users\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\GetEventsResponse\GetEventsResponseV1;
use Gdbots\Schemas\Pbjx\Mixin\GetEventsResponse\GetEventsResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\GetEventsResponse\GetEventsResponseV1Trait;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Trait;

final class GetUserHistoryResponseV1 extends AbstractMessage implements
    GetUserHistoryResponse,
    ResponseV1,
    GetEventsResponseV1
  
{
    use ResponseV1Trait;
    use GetEventsResponseV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:users:request:get-user-history-response:1-0-0', __CLASS__,
            [],
            [
                ResponseV1Mixin::create(), 
                GetEventsResponseV1Mixin::create()
            ]
        );
    }
}