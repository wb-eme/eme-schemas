<?php

namespace Eme\Schemas\Users\Request;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Trait;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\GetEventsRequest\GetEventsRequestV1;
use Gdbots\Schemas\Pbjx\Mixin\GetEventsRequest\GetEventsRequestV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\GetEventsRequest\GetEventsRequestV1Trait;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Trait;

final class GetUserHistoryRequestV1 extends AbstractMessage implements
    GetUserHistoryRequest,
    AccountRefV1,
    RequestV1,
    GetEventsRequestV1
  
{
    use AccountRefV1Trait;
    use RequestV1Trait;
    use GetEventsRequestV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:users:request:get-user-history-request:1-0-0', __CLASS__,
            [],
            [
                AccountRefV1Mixin::create(), 
                RequestV1Mixin::create(), 
                GetEventsRequestV1Mixin::create()
            ]
        );
    }
}
