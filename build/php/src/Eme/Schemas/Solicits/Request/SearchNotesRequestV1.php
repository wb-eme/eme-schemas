<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/search-notes-request/1-0-0.json#
namespace Eme\Schemas\Solicits\Request;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1 as EmeAccountsAccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin as EmeAccountsAccountRefV1Mixin;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Schema;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1 as GdbotsPbjxRequestV1;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Mixin as GdbotsPbjxRequestV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Trait as GdbotsPbjxRequestV1Trait;
use Gdbots\Schemas\Pbjx\Mixin\SearchEventsRequest\SearchEventsRequestV1 as GdbotsPbjxSearchEventsRequestV1;
use Gdbots\Schemas\Pbjx\Mixin\SearchEventsRequest\SearchEventsRequestV1Mixin as GdbotsPbjxSearchEventsRequestV1Mixin;

final class SearchNotesRequestV1 extends AbstractMessage implements
    SearchNotesRequest,
    EmeAccountsAccountRefV1,
    GdbotsPbjxRequestV1,
    GdbotsPbjxSearchEventsRequestV1
{
    use GdbotsPbjxRequestV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:request:search-notes-request:1-0-0', __CLASS__,
            [],
            [
                EmeAccountsAccountRefV1Mixin::create(),
                GdbotsPbjxRequestV1Mixin::create(),
                GdbotsPbjxSearchEventsRequestV1Mixin::create(),
            ]
        );
    }
}
