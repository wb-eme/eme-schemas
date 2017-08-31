<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/command/publish-solicit/1-0-0.json#
namespace Eme\Schemas\Solicits\Command;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1 as EmeAccountsAccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin as EmeAccountsAccountRefV1Mixin;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Schema;
use Gdbots\Schemas\Forms\Mixin\PublishForm\PublishFormV1 as GdbotsFormsPublishFormV1;
use Gdbots\Schemas\Forms\Mixin\PublishForm\PublishFormV1Mixin as GdbotsFormsPublishFormV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\PublishNode\PublishNodeV1 as GdbotsNcrPublishNodeV1;
use Gdbots\Schemas\Ncr\Mixin\PublishNode\PublishNodeV1Mixin as GdbotsNcrPublishNodeV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1 as GdbotsPbjxCommandV1;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Mixin as GdbotsPbjxCommandV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Trait as GdbotsPbjxCommandV1Trait;

final class PublishSolicitV1 extends AbstractMessage implements
    PublishSolicit,
    EmeAccountsAccountRefV1,
    GdbotsPbjxCommandV1,
    GdbotsFormsPublishFormV1,
    GdbotsNcrPublishNodeV1
{
    use GdbotsPbjxCommandV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:command:publish-solicit:1-0-0', __CLASS__,
            [],
            [
                EmeAccountsAccountRefV1Mixin::create(),
                GdbotsPbjxCommandV1Mixin::create(),
                GdbotsFormsPublishFormV1Mixin::create(),
                GdbotsNcrPublishNodeV1Mixin::create(),
            ]
        );
    }
}
