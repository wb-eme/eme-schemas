<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/command/process-irr/1-0-0.json#
namespace Eme\Schemas\Solicits\Command;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1 as EmeAccountsAccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin as EmeAccountsAccountRefV1Mixin;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Forms\Mixin\ProcessIrr\ProcessIrrV1 as GdbotsFormsProcessIrrV1;
use Gdbots\Schemas\Forms\Mixin\ProcessIrr\ProcessIrrV1Mixin as GdbotsFormsProcessIrrV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1 as GdbotsPbjxCommandV1;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Mixin as GdbotsPbjxCommandV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Trait as GdbotsPbjxCommandV1Trait;

final class ProcessIrrV1 extends AbstractMessage implements
    ProcessIrr,
    EmeAccountsAccountRefV1,
    GdbotsPbjxCommandV1,
    GdbotsFormsProcessIrrV1
{
    use GdbotsPbjxCommandV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:command:process-irr:1-0-0', __CLASS__,
            [
                Fb::create('wb_subject_request_id', T\UuidType::create())
                    ->build(),
                Fb::create('wb_status_callback_uri', T\TextType::create())
                    ->format(Format::URL())
                    ->build(),
                Fb::create('wb_fulfillment_callback_uri', T\TextType::create())
                    ->format(Format::URL())
                    ->build(),
                Fb::create('onetrust_subtask_id', T\UuidType::create())
                    ->build(),
            ],
            [
                EmeAccountsAccountRefV1Mixin::create(),
                GdbotsPbjxCommandV1Mixin::create(),
                GdbotsFormsProcessIrrV1Mixin::create(),
            ]
        );
    }
}
