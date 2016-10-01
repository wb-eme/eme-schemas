<?php

namespace Eme\Schemas\Collector\Command;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Trait;
use Eme\Schemas\Collector\Mixin\Collectable\CollectableV1;
use Eme\Schemas\Collector\Mixin\Collectable\CollectableV1Mixin;
use Eme\Schemas\Collector\Mixin\Collectable\CollectableV1Trait;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Trait;

final class CheckHealthV1 extends AbstractMessage implements
    CheckHealth,
    AccountRefV1,
    CommandV1,
    CollectableV1
  
{
    use AccountRefV1Trait;
    use CommandV1Trait;
    use CollectableV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:collector:command:check-health:1-0-0', __CLASS__,
            [
                /*
                 * A random string that will be validated to match after
                 * the event "health-checked" is triggered. (ping-pong)
                 */
                Fb::create('msg', T\StringType::create())
                    ->build()
            ],
            [
                AccountRefV1Mixin::create(), 
                CommandV1Mixin::create(), 
                CollectableV1Mixin::create()
            ]
        );
    }
}
