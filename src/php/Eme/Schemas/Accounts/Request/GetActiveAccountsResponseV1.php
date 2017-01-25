<?php

namespace Eme\Schemas\Accounts\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Trait;

final class GetActiveAccountsResponseV1 extends AbstractMessage implements
    GetActiveAccountsResponse,
    ResponseV1
  
{
    use ResponseV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:accounts:request:get-active-accounts-response:1-0-0', __CLASS__,
            [
                Fb::create('accounts', T\MessageType::create())
                    ->asAMap()
                    ->className('Eme\Schemas\Accounts\Node\Account')
                    ->build()
            ],
            [
                ResponseV1Mixin::create()
            ]
        );
    }
}
