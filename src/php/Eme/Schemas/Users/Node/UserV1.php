<?php

namespace Eme\Schemas\Users\Node;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Trait;
use Eme\Schemas\Users\UserId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Common\Enum\Gender;
use Gdbots\Schemas\Ncr\Mixin\Indexed\IndexedV1;
use Gdbots\Schemas\Ncr\Mixin\Indexed\IndexedV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\Indexed\IndexedV1Trait;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1Trait;

final class UserV1 extends AbstractMessage implements
    User,
    AccountRefV1,
    NodeV1,
    IndexedV1
  
{
    use AccountRefV1Trait;
    use NodeV1Trait;
    use IndexedV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:users:node:user:1-0-0', __CLASS__,
            [
                Fb::create('_id', T\IdentifierType::create())
                    ->required()
                    ->withDefault(function() { return UserId::generate(); })
                    ->className('Eme\Schemas\Users\UserId')
                    ->build(),
                Fb::create('first_name', T\StringType::create())
                    ->build(),
                Fb::create('last_name', T\StringType::create())
                    ->build(),
                Fb::create('email', T\StringType::create())
                    ->format(Format::EMAIL())
                    ->build(),
                Fb::create('email_domain', T\StringType::create())
                    ->format(Format::HOSTNAME())
                    ->build(),
                Fb::create('address', T\MessageType::create())
                    ->className('Gdbots\Schemas\Geo\Address')
                    ->build(),
                /*
                 * A general format for international telephone numbers.
                 * @link https://en.wikipedia.org/wiki/E.164
                 */
                Fb::create('phone', T\StringType::create())
                    ->asAMap()
                    ->pattern('^\+?[1-9]\d{1,14}$')
                    ->build(),
                Fb::create('dob', T\DateType::create())
                    ->build(),
                Fb::create('gender', T\IntEnumType::create())
                    ->withDefault(Gender::UNKNOWN())
                    ->className('Gdbots\Schemas\Common\Enum\Gender')
                    ->build(),
                /*
                 * Networks is a map that contains handles/usernames on a social network.
                 * E.g. facebook:homer, twitter:stackoverflow, youtube:coltrane78.
                 */
                Fb::create('networks', T\StringType::create())
                    ->asAMap()
                    ->maxLength(50)
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                Fb::create('hashtags', T\StringType::create())
                    ->asASet()
                    ->format(Format::HASHTAG())
                    ->build(),
                /*
                 * Tags is a map that categorizes users or track references in
                 * external or legacy systems. The tags names should be consistent and descriptive,
                 * e.g. bots_respondent_id:123, salesforce_customer_id:456.
                 */
                Fb::create('tags', T\StringType::create())
                    ->asAMap()
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create('is_blocked', T\BooleanType::create())
                    ->build(),
                /*
                 * Indicates that the user is a staff member and has access to the dashboard.
                 */
                Fb::create('is_staff', T\BooleanType::create())
                    ->build(),
                /*
                 * A user's roles determine what permissions they'll have when using the system.
                 */
                Fb::create('roles', T\StringType::create())
                    ->asASet()
                    ->pattern('^[A-Z_]+$')
                    ->build()
            ],
            [
                AccountRefV1Mixin::create(), 
                NodeV1Mixin::create(), 
                IndexedV1Mixin::create()
            ]
        );
    }

    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        return ['user_id' => (string)$this->get('_id')];
    }
}
