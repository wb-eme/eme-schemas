<?php

namespace Eme\Schemas\Users\Command;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Trait;
use Eme\Schemas\Users\UserId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Trait;

final class GrantRolesToUserV1 extends AbstractMessage implements
    GrantRolesToUser,
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
        return new Schema('pbj:eme:users:command:grant-roles-to-user:1-0-0', __CLASS__,
            [
                Fb::create('user_id', T\IdentifierType::create())
                    ->required()
                    ->className('Eme\Schemas\Users\UserId')
                    ->build(),
                /*
                 * The roles to grant to the user.
                 */
                Fb::create('roles', T\StringType::create())
                    ->asASet()
                    ->pattern('^[\w_]+$')
                    ->build()
            ],
            [
                AccountRefV1Mixin::create(), 
                CommandV1Mixin::create()
            ]
        );
    }
}
