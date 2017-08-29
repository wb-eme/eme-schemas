<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/event/solicit-unpublished/1-0-0.json#
namespace Eme\Schemas\Solicits\Event;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1 as EmeAccountsAccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin as EmeAccountsAccountRefV1Mixin;
use Eme\Schemas\Solicits\SolicitId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1 as GdbotsPbjxEventV1;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Mixin as GdbotsPbjxEventV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Trait as GdbotsPbjxEventV1Trait;

final class SolicitUnpublishedV1 extends AbstractMessage implements
    SolicitUnpublished,
    EmeAccountsAccountRefV1,
    GdbotsPbjxEventV1
{
    use GdbotsPbjxEventV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:event:solicit-unpublished:1-0-0', __CLASS__,
            [
                Fb::create('solicit_id', T\IdentifierType::create())
                    ->required()
                    ->className(SolicitId::class)
                    ->build(),
            ],
            [
                EmeAccountsAccountRefV1Mixin::create(),
                GdbotsPbjxEventV1Mixin::create(),
            ]
        );
    }
}