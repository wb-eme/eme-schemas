<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/event/solicit-published/1-0-0.json#
namespace Eme\Schemas\Solicits\Event;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1 as EmeAccountsAccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin as EmeAccountsAccountRefV1Mixin;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Schema;
use Gdbots\Schemas\Forms\Mixin\FormPublished\FormPublishedV1 as GdbotsFormsFormPublishedV1;
use Gdbots\Schemas\Forms\Mixin\FormPublished\FormPublishedV1Mixin as GdbotsFormsFormPublishedV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\NodePublished\NodePublishedV1 as GdbotsNcrNodePublishedV1;
use Gdbots\Schemas\Ncr\Mixin\NodePublished\NodePublishedV1Mixin as GdbotsNcrNodePublishedV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1 as GdbotsPbjxEventV1;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Mixin as GdbotsPbjxEventV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Trait as GdbotsPbjxEventV1Trait;

final class SolicitPublishedV1 extends AbstractMessage implements
    SolicitPublished,
    EmeAccountsAccountRefV1,
    GdbotsPbjxEventV1,
    GdbotsNcrNodePublishedV1,
    GdbotsFormsFormPublishedV1
{
    use GdbotsPbjxEventV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:event:solicit-published:1-0-0', __CLASS__,
            [],
            [
                EmeAccountsAccountRefV1Mixin::create(),
                GdbotsPbjxEventV1Mixin::create(),
                GdbotsNcrNodePublishedV1Mixin::create(),
                GdbotsFormsFormPublishedV1Mixin::create(),
            ]
        );
    }
}
