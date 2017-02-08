<?php

namespace Eme\Schemas\Solicits\Event;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Trait;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Trait;
use Gdbots\Schemas\Pbjx\Mixin\Indexed\IndexedV1;
use Gdbots\Schemas\Pbjx\Mixin\Indexed\IndexedV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Indexed\IndexedV1Trait;

final class NoteAddedToSubmissionV1 extends AbstractMessage implements
    NoteAddedToSubmission,
    AccountRefV1,
    EventV1,
    IndexedV1
  
{
    use AccountRefV1Trait;
    use EventV1Trait;
    use IndexedV1Trait;

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
                    ->build()
            ],
            [
                AccountRefV1Mixin::create(), 
                EventV1Mixin::create(), 
                IndexedV1Mixin::create()
            ]
        );
    }
}
