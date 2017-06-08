<?php

namespace Eme\Schemas\Users\Command;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1 as EmeAccountsAccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin as EmeAccountsAccountRefV1Mixin;
use Eme\Schemas\Users\UserId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1 as GdbotsPbjxCommandV1;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Mixin as GdbotsPbjxCommandV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Trait as GdbotsPbjxCommandV1Trait;

final class GrantRolesToUserV1 extends AbstractMessage implements
    GrantRolesToUser,
    EmeAccountsAccountRefV1,
    GdbotsPbjxCommandV1
  
{
    use GdbotsPbjxCommandV1Trait;

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
                EmeAccountsAccountRefV1Mixin::create(), 
                GdbotsPbjxCommandV1Mixin::create()
            ]
        );
    }
}
