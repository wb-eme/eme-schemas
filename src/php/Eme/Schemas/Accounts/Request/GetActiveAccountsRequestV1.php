<?php

namespace Eme\Schemas\Accounts\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Trait;

final class GetActiveAccountsRequestV1 extends AbstractMessage implements
    GetActiveAccountsRequest,
    RequestV1
  
{
    use RequestV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:accounts:request:get-active-accounts-request:1-0-0', __CLASS__,
            [],
            [
                RequestV1Mixin::create()
            ]
        );
    }
}
