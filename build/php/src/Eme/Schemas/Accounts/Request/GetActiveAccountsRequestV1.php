<?php
// @link http://schemas.wbeme.com/json-schema/eme/accounts/request/get-active-accounts-request/1-0-0.json#
namespace Eme\Schemas\Accounts\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Schema;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1 as GdbotsPbjxRequestV1;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Mixin as GdbotsPbjxRequestV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Trait as GdbotsPbjxRequestV1Trait;

final class GetActiveAccountsRequestV1 extends AbstractMessage implements
    GetActiveAccountsRequest,
    GdbotsPbjxRequestV1
{
    use GdbotsPbjxRequestV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:accounts:request:get-active-accounts-request:1-0-0', __CLASS__,
            [],
            [
                GdbotsPbjxRequestV1Mixin::create(),
            ]
        );
    }
}
