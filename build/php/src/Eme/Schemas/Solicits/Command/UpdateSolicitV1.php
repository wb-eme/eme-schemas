<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/command/update-solicit/1-0-0.json#
namespace Eme\Schemas\Solicits\Command;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1 as EmeAccountsAccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin as EmeAccountsAccountRefV1Mixin;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Schema;
use Gdbots\Schemas\Forms\Mixin\UpdateForm\UpdateFormV1 as GdbotsFormsUpdateFormV1;
use Gdbots\Schemas\Forms\Mixin\UpdateForm\UpdateFormV1Mixin as GdbotsFormsUpdateFormV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1 as GdbotsPbjxCommandV1;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Mixin as GdbotsPbjxCommandV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Trait as GdbotsPbjxCommandV1Trait;

final class UpdateSolicitV1 extends AbstractMessage implements
    UpdateSolicit,
    EmeAccountsAccountRefV1,
    GdbotsPbjxCommandV1,
    GdbotsFormsUpdateFormV1
{
    use GdbotsPbjxCommandV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:command:update-solicit:1-0-0', __CLASS__,
            [],
            [
                EmeAccountsAccountRefV1Mixin::create(),
                GdbotsPbjxCommandV1Mixin::create(),
                GdbotsFormsUpdateFormV1Mixin::create(),
            ]
        );
    }
}
