<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/search-solicits-response/1-0-0.json#
namespace Eme\Schemas\Solicits\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Schema;
use Gdbots\Schemas\Forms\Mixin\SearchFormsResponse\SearchFormsResponseV1 as GdbotsFormsSearchFormsResponseV1;
use Gdbots\Schemas\Forms\Mixin\SearchFormsResponse\SearchFormsResponseV1Mixin as GdbotsFormsSearchFormsResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1 as GdbotsPbjxResponseV1;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Mixin as GdbotsPbjxResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Trait as GdbotsPbjxResponseV1Trait;

final class SearchSolicitsResponseV1 extends AbstractMessage implements
    SearchSolicitsResponse,
    GdbotsPbjxResponseV1,
    GdbotsFormsSearchFormsResponseV1
{
    use GdbotsPbjxResponseV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:request:search-solicits-response:1-0-0', __CLASS__,
            [],
            [
                GdbotsPbjxResponseV1Mixin::create(),
                GdbotsFormsSearchFormsResponseV1Mixin::create(),
            ]
        );
    }
}
