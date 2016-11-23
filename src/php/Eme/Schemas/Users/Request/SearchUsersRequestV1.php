<?php

namespace Eme\Schemas\Users\Request;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Trait;
use Eme\Schemas\Users\Enum\SearchSort;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Mixin\SearchNodesRequest\SearchNodesRequestV1;
use Gdbots\Schemas\Ncr\Mixin\SearchNodesRequest\SearchNodesRequestV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\SearchNodesRequest\SearchNodesRequestV1Trait;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Trait;

final class SearchUsersRequestV1 extends AbstractMessage implements
    SearchUsersRequest,
    AccountRefV1,
    RequestV1,
    SearchNodesRequestV1
  
{
    use AccountRefV1Trait;
    use RequestV1Trait;
    use SearchNodesRequestV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:users:request:search-users-request:1-0-0', __CLASS__,
            [
                Fb::create('sort', T\StringEnumType::create())
                    ->withDefault(SearchSort::RELEVANCE())
                    ->className('Eme\Schemas\Users\Enum\SearchSort')
                    ->build(),
                Fb::create('is_staff', T\TrinaryType::create())
                    ->build(),
                Fb::create('is_blocked', T\TrinaryType::create())
                    ->withDefault(2)
                    ->build()
            ],
            [
                AccountRefV1Mixin::create(), 
                RequestV1Mixin::create(), 
                SearchNodesRequestV1Mixin::create()
            ]
        );
    }
}
