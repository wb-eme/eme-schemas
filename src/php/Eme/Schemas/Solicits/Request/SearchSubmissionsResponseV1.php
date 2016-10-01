<?php

namespace Eme\Schemas\Solicits\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Response\ResponseV1Trait;
use Gdbots\Schemas\Pbjx\Mixin\SearchEventsResponse\SearchEventsResponseV1;
use Gdbots\Schemas\Pbjx\Mixin\SearchEventsResponse\SearchEventsResponseV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\SearchEventsResponse\SearchEventsResponseV1Trait;

final class SearchSubmissionsResponseV1 extends AbstractMessage implements
    SearchSubmissionsResponse,
    ResponseV1,
    SearchEventsResponseV1
  
{
    use ResponseV1Trait;
    use SearchEventsResponseV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:request:search-submissions-response:1-0-0', __CLASS__,
            [],
            [
                ResponseV1Mixin::create(), 
                SearchEventsResponseV1Mixin::create()
            ]
        );
    }
}
