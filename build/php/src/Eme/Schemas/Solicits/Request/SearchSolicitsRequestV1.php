<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/search-solicits-request/1-0-0.json#
namespace Eme\Schemas\Solicits\Request;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1 as EmeAccountsAccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin as EmeAccountsAccountRefV1Mixin;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Schema;
use Gdbots\Schemas\Forms\Mixin\SearchFormsRequest\SearchFormsRequestV1 as GdbotsFormsSearchFormsRequestV1;
use Gdbots\Schemas\Forms\Mixin\SearchFormsRequest\SearchFormsRequestV1Mixin as GdbotsFormsSearchFormsRequestV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\SearchNodesRequest\SearchNodesRequestV1 as GdbotsNcrSearchNodesRequestV1;
use Gdbots\Schemas\Ncr\Mixin\SearchNodesRequest\SearchNodesRequestV1Mixin as GdbotsNcrSearchNodesRequestV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1 as GdbotsPbjxRequestV1;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Mixin as GdbotsPbjxRequestV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Trait as GdbotsPbjxRequestV1Trait;

final class SearchSolicitsRequestV1 extends AbstractMessage implements
    SearchSolicitsRequest,
    EmeAccountsAccountRefV1,
    GdbotsPbjxRequestV1,
    GdbotsNcrSearchNodesRequestV1,
    GdbotsFormsSearchFormsRequestV1
{
    use GdbotsPbjxRequestV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:request:search-solicits-request:1-0-0', __CLASS__,
            [],
            [
                EmeAccountsAccountRefV1Mixin::create(),
                GdbotsPbjxRequestV1Mixin::create(),
                GdbotsNcrSearchNodesRequestV1Mixin::create(),
                GdbotsFormsSearchFormsRequestV1Mixin::create(),
            ]
        );
    }
}
