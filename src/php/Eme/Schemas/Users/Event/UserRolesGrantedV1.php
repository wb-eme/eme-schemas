<?php

namespace Eme\Schemas\Users\Event;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Trait;
use Eme\Schemas\Users\UserId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Trait;

final class UserRolesGrantedV1 extends AbstractMessage implements
    UserRolesGranted,
    AccountRefV1,
    EventV1
  
{
    use AccountRefV1Trait;
    use EventV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:users:event:user-roles-granted:1-0-0', __CLASS__,
            [
                Fb::create('user_id', T\IdentifierType::create())
                    ->required()
                    ->className('Eme\Schemas\Users\UserId')
                    ->build(),
                /*
                 * The roles granted to the user.
                 */
                Fb::create('roles', T\StringType::create())
                    ->asASet()
                    ->pattern('^[\w_]+$')
                    ->build()
            ],
            [
                AccountRefV1Mixin::create(), 
                EventV1Mixin::create()
            ]
        );
    }
}
