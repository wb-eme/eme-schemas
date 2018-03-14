<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/search-notes-response/1-0-0.json#
namespace Eme\Schemas\Solicits\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Schema;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1 as GdbotsPbjxResponseV1;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Mixin as GdbotsPbjxResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Trait as GdbotsPbjxResponseV1Trait;
use Gdbots\Schemas\Pbjx\Mixin\SearchEventsResponse\SearchEventsResponseV1 as GdbotsPbjxSearchEventsResponseV1;
use Gdbots\Schemas\Pbjx\Mixin\SearchEventsResponse\SearchEventsResponseV1Mixin as GdbotsPbjxSearchEventsResponseV1Mixin;

final class SearchNotesResponseV1 extends AbstractMessage implements
    SearchNotesResponse,
    GdbotsPbjxResponseV1,
    GdbotsPbjxSearchEventsResponseV1
{
    use GdbotsPbjxResponseV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:request:search-notes-response:1-0-0', __CLASS__,
            [],
            [
                GdbotsPbjxResponseV1Mixin::create(),
                GdbotsPbjxSearchEventsResponseV1Mixin::create(),
            ]
        );
    }
}
