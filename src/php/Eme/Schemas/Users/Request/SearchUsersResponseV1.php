<?php

namespace Eme\Schemas\Users\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Mixin\SearchNodesResponse\SearchNodesResponseV1;
use Gdbots\Schemas\Ncr\Mixin\SearchNodesResponse\SearchNodesResponseV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\SearchNodesResponse\SearchNodesResponseV1Trait;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Trait;

final class SearchUsersResponseV1 extends AbstractMessage implements
    SearchUsersResponse,
    ResponseV1,
    SearchNodesResponseV1
  
{
    use ResponseV1Trait;
    use SearchNodesResponseV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:users:request:search-users-response:1-0-0', __CLASS__,
            [],
            [
                ResponseV1Mixin::create(), 
                SearchNodesResponseV1Mixin::create()
            ]
        );
    }
}
