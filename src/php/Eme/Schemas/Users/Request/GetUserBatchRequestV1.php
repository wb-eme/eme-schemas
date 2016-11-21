<?php

namespace Eme\Schemas\Users\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Mixin\GetNodeBatchRequest\GetNodeBatchRequestV1;
use Gdbots\Schemas\Ncr\Mixin\GetNodeBatchRequest\GetNodeBatchRequestV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\GetNodeBatchRequest\GetNodeBatchRequestV1Trait;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Trait;

final class GetUserBatchRequestV1 extends AbstractMessage implements
    GetUserBatchRequest,
    RequestV1,
    GetNodeBatchRequestV1
  
{
    use RequestV1Trait;
    use GetNodeBatchRequestV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:users:request:get-user-batch-request:1-0-0', __CLASS__,
            [],
            [
                RequestV1Mixin::create(), 
                GetNodeBatchRequestV1Mixin::create()
            ]
        );
    }
}
