<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/command/add-note-to-submission/1-0-0.json#
namespace Eme\Schemas\Solicits\Command;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1 as EmeAccountsAccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin as EmeAccountsAccountRefV1Mixin;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1 as GdbotsPbjxCommandV1;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Mixin as GdbotsPbjxCommandV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Trait as GdbotsPbjxCommandV1Trait;

final class AddNoteToSubmissionV1 extends AbstractMessage implements
    AddNoteToSubmission,
    EmeAccountsAccountRefV1,
    GdbotsPbjxCommandV1
{
    use GdbotsPbjxCommandV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:command:add-note-to-submission:1-0-0', __CLASS__,
            [
                Fb::create('submission_id', T\TimeUuidType::create())
                    ->required()
                    ->build(),
                Fb::create('note', T\TextType::create())
                    ->build(),
                Fb::create('hashtags_to_add', T\StringType::create())
                    ->asASet()
                    ->format(Format::HASHTAG())
                    ->build(),
                Fb::create('hashtags_to_remove', T\StringType::create())
                    ->asASet()
                    ->format(Format::HASHTAG())
                    ->build(),
            ],
            [
                EmeAccountsAccountRefV1Mixin::create(),
                GdbotsPbjxCommandV1Mixin::create(),
            ]
        );
    }
}
