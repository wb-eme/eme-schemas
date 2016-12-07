<?php

namespace Eme\Schemas\Users\Command;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Trait;
use Eme\Schemas\Users\UserId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Trait;

final class ImportUserV1 extends AbstractMessage implements
    ImportUser,
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
        return new Schema('pbj:eme:users:command:import-user:1-0-0', __CLASS__,
            [
                Fb::create('user_id', T\IdentifierType::create())
                    ->className('Eme\Schemas\Users\UserId')
                    ->build(),
                Fb::create('first_name', T\StringType::create())
                    ->build(),
                Fb::create('last_name', T\StringType::create())
                    ->build(),
                Fb::create('email', T\StringType::create())
                    ->required()
                    ->format(Format::EMAIL())
                    ->build(),
                /*
                 * Tags are name value pairs used to categorize users or track references in
                 * external or legacy systems. The tags names should be consistent and descriptive,
                 * i.e. bots_user_id:100
                 */
                Fb::create('tags', T\StringType::create())
                    ->asAMap()
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create('is_staff', T\BooleanType::create())
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
