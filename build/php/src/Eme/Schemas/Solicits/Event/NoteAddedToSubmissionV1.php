<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/event/note-added-to-submission/1-0-0.json#
namespace Eme\Schemas\Solicits\Event;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1 as EmeAccountsAccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin as EmeAccountsAccountRefV1Mixin;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Files\FileId;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1 as GdbotsPbjxEventV1;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Mixin as GdbotsPbjxEventV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Trait as GdbotsPbjxEventV1Trait;
use Gdbots\Schemas\Pbjx\Mixin\Indexed\IndexedV1 as GdbotsPbjxIndexedV1;
use Gdbots\Schemas\Pbjx\Mixin\Indexed\IndexedV1Mixin as GdbotsPbjxIndexedV1Mixin;

final class NoteAddedToSubmissionV1 extends AbstractMessage implements
    NoteAddedToSubmission,
    EmeAccountsAccountRefV1,
    GdbotsPbjxEventV1,
    GdbotsPbjxIndexedV1
{
    use GdbotsPbjxEventV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:event:note-added-to-submission:1-0-0', __CLASS__,
            [
                Fb::create('submission_id', T\TimeUuidType::create())
                    ->required()
                    ->build(),
                Fb::create('note', T\TextType::create())
                    ->build(),
                Fb::create('hashtags_added', T\StringType::create())
                    ->asASet()
                    ->format(Format::HASHTAG())
                    ->build(),
                Fb::create('hashtags_removed', T\StringType::create())
                    ->asASet()
                    ->format(Format::HASHTAG())
                    ->build(),
                Fb::create('interview', T\IdentifierType::create())
                    ->className(FileId::class)
                    ->build(),
            ],
            [
                EmeAccountsAccountRefV1Mixin::create(),
                GdbotsPbjxEventV1Mixin::create(),
                GdbotsPbjxIndexedV1Mixin::create(),
            ]
        );
    }
}
