<?php
// @link http://schemas.wbeme.com/json-schema/eme/users/request/search-users-request/1-0-0.json#
namespace Eme\Schemas\Users\Request;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1 as EmeAccountsAccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin as EmeAccountsAccountRefV1Mixin;
use Eme\Schemas\Users\Enum\SearchSort;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Mixin\SearchNodesRequest\SearchNodesRequestV1 as GdbotsNcrSearchNodesRequestV1;
use Gdbots\Schemas\Ncr\Mixin\SearchNodesRequest\SearchNodesRequestV1Mixin as GdbotsNcrSearchNodesRequestV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1 as GdbotsPbjxRequestV1;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Mixin as GdbotsPbjxRequestV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Trait as GdbotsPbjxRequestV1Trait;

final class SearchUsersRequestV1 extends AbstractMessage implements
    SearchUsersRequest,
    EmeAccountsAccountRefV1,
    GdbotsPbjxRequestV1,
    GdbotsNcrSearchNodesRequestV1
{
    use GdbotsPbjxRequestV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:users:request:search-users-request:1-0-0', __CLASS__,
            [
                Fb::create('sort', T\StringEnumType::create())
                    ->withDefault(SearchSort::RELEVANCE())
                    ->className(SearchSort::class)
                    ->build(),
                Fb::create('is_staff', T\TrinaryType::create())
                    ->build(),
                Fb::create('is_blocked', T\TrinaryType::create())
                    ->withDefault(2)
                    ->build(),
            ],
            [
                EmeAccountsAccountRefV1Mixin::create(),
                GdbotsPbjxRequestV1Mixin::create(),
                GdbotsNcrSearchNodesRequestV1Mixin::create(),
            ]
        );
    }
}
