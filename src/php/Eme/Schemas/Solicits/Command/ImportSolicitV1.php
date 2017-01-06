<?php

namespace Eme\Schemas\Solicits\Command;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Trait;
use Eme\Schemas\Solicits\SolicitId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Trait;

final class ImportSolicitV1 extends AbstractMessage implements
    ImportSolicit,
    AccountRefV1,
    CommandV1
  
{
    use AccountRefV1Trait;
    use CommandV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:command:import-solicit:1-0-0', __CLASS__,
            [
                Fb::create('solicit_id', T\IdentifierType::create())
                    ->className('Eme\Schemas\Solicits\SolicitId')
                    ->build(),
                Fb::create('title', T\StringType::create())
                    ->build(),
                /*
                 * A short description (a few sentences) about this solicit. This field should
                 * not have html as it is used in metadata.
                 */
                Fb::create('description', T\TextType::create())
                    ->build(),
                Fb::create('hashtags', T\StringType::create())
                    ->asASet()
                    ->format(Format::HASHTAG())
                    ->build(),
                /*
                 * Tags are name value pairs used to categorize solicits or track references in
                 * external or legacy systems. The tags names should be consistent and descriptive,
                 * i.e. bots_request_id:100
                 */
                Fb::create('tags', T\StringType::create())
                    ->asAMap()
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create('story_enabled', T\BooleanType::create())
                    ->withDefault(true)
                    ->build(),
                Fb::create('story_label', T\StringType::create())
                    ->build(),
                Fb::create('is_active', T\BooleanType::create())
                    ->build(),
                Fb::create('created_at', T\MicrotimeType::create())
                    ->useTypeDefault(false)
                    ->build()
            ],
            [
                AccountRefV1Mixin::create(), 
                CommandV1Mixin::create()
            ]
        );
    }
}
