<?php
// @link http://schemas.wbeme.com/json-schema/eme/accounts/node/account/1-0-0.json#
namespace Eme\Schemas\Accounts\Node;

use Eme\Schemas\Accounts\AccountId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Analytics\Mixin\Tracker\Tracker as GdbotsAnalyticsTracker;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1 as GdbotsNcrNodeV1;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1Mixin as GdbotsNcrNodeV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1Trait as GdbotsNcrNodeV1Trait;
use Gdbots\Schemas\Ncr\Mixin\Sluggable\SluggableV1 as GdbotsNcrSluggableV1;
use Gdbots\Schemas\Ncr\Mixin\Sluggable\SluggableV1Mixin as GdbotsNcrSluggableV1Mixin;

final class AccountV1 extends AbstractMessage implements
    Account,
    GdbotsNcrNodeV1,
    GdbotsNcrSluggableV1
{
    use GdbotsNcrNodeV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:accounts:node:account:1-0-0', __CLASS__,
            [
                Fb::create('_id', T\IdentifierType::create())
                    ->required()
                    ->className(AccountId::class)
                    ->overridable(true)
                    ->build(),
                Fb::create('auth0_client_domain', T\StringType::create())
                    ->format(Format::HOSTNAME())
                    ->build(),
                /*
                 * Auth0 Client ID (or app id) does not require encryption.
                 */
                Fb::create('auth0_client_id', T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                /*
                 * Auth0 Client Secret MUST be encrypted when stored.
                 */
                Fb::create('auth0_client_secret', T\TextType::create())
                    ->build(),
                Fb::create('trackers', T\MessageType::create())
                    ->asAMap()
                    ->anyOfClassNames([
                        GdbotsAnalyticsTracker::class,
                    ])
                    ->build(),
            ],
            [
                GdbotsNcrNodeV1Mixin::create(),
                GdbotsNcrSluggableV1Mixin::create(),
            ]
        );
    }

    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        return [
            'account_id' => (string)$this->get('_id'),
            'slug' => $this->get('slug'),
        ];
    }
}
