<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/command/delete-solicit/1-0-0.json#
namespace Eme\Schemas\Solicits\Command;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1 as EmeAccountsAccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin as EmeAccountsAccountRefV1Mixin;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Schema;
use Gdbots\Schemas\Forms\Mixin\DeleteForm\DeleteFormV1 as GdbotsFormsDeleteFormV1;
use Gdbots\Schemas\Forms\Mixin\DeleteForm\DeleteFormV1Mixin as GdbotsFormsDeleteFormV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\DeleteNode\DeleteNodeV1 as GdbotsNcrDeleteNodeV1;
use Gdbots\Schemas\Ncr\Mixin\DeleteNode\DeleteNodeV1Mixin as GdbotsNcrDeleteNodeV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1 as GdbotsPbjxCommandV1;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Mixin as GdbotsPbjxCommandV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Trait as GdbotsPbjxCommandV1Trait;

final class DeleteSolicitV1 extends AbstractMessage implements
    DeleteSolicit,
    EmeAccountsAccountRefV1,
    GdbotsPbjxCommandV1,
    GdbotsFormsDeleteFormV1,
    GdbotsNcrDeleteNodeV1
{
    use GdbotsPbjxCommandV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:command:delete-solicit:1-0-0', __CLASS__,
            [],
            [
                EmeAccountsAccountRefV1Mixin::create(),
                GdbotsPbjxCommandV1Mixin::create(),
                GdbotsFormsDeleteFormV1Mixin::create(),
                GdbotsNcrDeleteNodeV1Mixin::create(),
            ]
        );
    }
}
