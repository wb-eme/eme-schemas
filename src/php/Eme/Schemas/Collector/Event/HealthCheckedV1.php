<?php

namespace Eme\Schemas\Collector\Event;

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
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Trait;

final class HealthCheckedV1 extends AbstractMessage implements
    HealthChecked,
    AccountRefV1,
    EventV1,
    CollectableV1
  
{
    use AccountRefV1Trait;
    use EventV1Trait;
    use CollectableV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:collector:event:health-checked:1-0-0', __CLASS__,
            [
                /*
                 * A random string that is copied from the "check-health" command and
                 * is later validated by whatever process initiated the health check.
                 */
                Fb::create('msg', T\StringType::create())
                    ->build()
            ],
            [
                AccountRefV1Mixin::create(), 
                EventV1Mixin::create(), 
                CollectableV1Mixin::create()
            ]
        );
    }
}
