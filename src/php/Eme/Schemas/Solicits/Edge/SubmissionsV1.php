<?php

namespace Eme\Schemas\Solicits\Edge;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Enum\EdgeMultiplicity;
use Gdbots\Schemas\Ncr\Mixin\Edge\EdgeV1 as GdbotsNcrEdgeV1;
use Gdbots\Schemas\Ncr\Mixin\Edge\EdgeV1Mixin as GdbotsNcrEdgeV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\Edge\EdgeV1Trait as GdbotsNcrEdgeV1Trait;

final class SubmissionsV1 extends AbstractMessage implements
    Submissions,
    GdbotsNcrEdgeV1
  
{
    use GdbotsNcrEdgeV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:edge:submissions:1-0-0', __CLASS__,
            [
                Fb::create('multiplicity', T\StringEnumType::create())
                    ->withDefault(EdgeMultiplicity::ONE2MANY())
                    ->className('Gdbots\Schemas\Ncr\Enum\EdgeMultiplicity')
                    ->build()
            ],
            [
                GdbotsNcrEdgeV1Mixin::create()
            ]
        );
    }
}
