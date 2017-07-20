<?php
// @link http://schemas.wbeme.com/json-schema/eme/users/event/user-roles-revoked/1-0-0.json#
namespace Eme\Schemas\Users\Event;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1 as EmeAccountsAccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin as EmeAccountsAccountRefV1Mixin;
use Eme\Schemas\Users\UserId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1 as GdbotsPbjxEventV1;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Mixin as GdbotsPbjxEventV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Event\EventV1Trait as GdbotsPbjxEventV1Trait;

final class UserRolesRevokedV1 extends AbstractMessage implements
    UserRolesRevoked,
    EmeAccountsAccountRefV1,
    GdbotsPbjxEventV1
{
    use GdbotsPbjxEventV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:users:event:user-roles-revoked:1-0-0', __CLASS__,
            [
                Fb::create('user_id', T\IdentifierType::create())
                    ->required()
                    ->className(UserId::class)
                    ->build(),
                /*
                 * The roles revoked from the user.
                 */
                Fb::create('roles', T\StringType::create())
                    ->asASet()
                    ->pattern('^[\w_]+$')
                    ->build(),
            ],
            [
                EmeAccountsAccountRefV1Mixin::create(),
                GdbotsPbjxEventV1Mixin::create(),
            ]
        );
    }
}
