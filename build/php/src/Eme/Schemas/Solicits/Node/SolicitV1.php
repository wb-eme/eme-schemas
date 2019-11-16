<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/node/solicit/1-0-0.json#
namespace Eme\Schemas\Solicits\Node;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1 as EmeAccountsAccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin as EmeAccountsAccountRefV1Mixin;
use Eme\Schemas\Solicits\SolicitId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Common\Mixin\Taggable\TaggableV1 as GdbotsCommonTaggableV1;
use Gdbots\Schemas\Common\Mixin\Taggable\TaggableV1Mixin as GdbotsCommonTaggableV1Mixin;
use Gdbots\Schemas\Forms\Mixin\Form\FormV1 as GdbotsFormsFormV1;
use Gdbots\Schemas\Forms\Mixin\Form\FormV1Mixin as GdbotsFormsFormV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\Expirable\ExpirableV1 as GdbotsNcrExpirableV1;
use Gdbots\Schemas\Ncr\Mixin\Expirable\ExpirableV1Mixin as GdbotsNcrExpirableV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\Indexed\IndexedV1 as GdbotsNcrIndexedV1;
use Gdbots\Schemas\Ncr\Mixin\Indexed\IndexedV1Mixin as GdbotsNcrIndexedV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1 as GdbotsNcrNodeV1;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1Mixin as GdbotsNcrNodeV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1Trait as GdbotsNcrNodeV1Trait;
use Gdbots\Schemas\Ncr\Mixin\Publishable\PublishableV1 as GdbotsNcrPublishableV1;
use Gdbots\Schemas\Ncr\Mixin\Publishable\PublishableV1Mixin as GdbotsNcrPublishableV1Mixin;

final class SolicitV1 extends AbstractMessage implements
    Solicit,
    EmeAccountsAccountRefV1,
    GdbotsNcrNodeV1,
    GdbotsFormsFormV1,
    GdbotsNcrExpirableV1,
    GdbotsNcrIndexedV1,
    GdbotsNcrPublishableV1,
    GdbotsCommonTaggableV1
{
    use GdbotsNcrNodeV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:node:solicit:1-0-0', __CLASS__,
            [
                Fb::create('_id', T\IdentifierType::create())
                    ->required()
                    ->withDefault(function() { return SolicitId::generate(); })
                    ->className(SolicitId::class)
                    ->build(),
                Fb::create('category', T\StringType::create())
                    ->build(),
                Fb::create('cc_email', T\StringType::create())
                    ->format(Format::EMAIL())
                    ->build(),
            ],
            [
                EmeAccountsAccountRefV1Mixin::create(),
                GdbotsNcrNodeV1Mixin::create(),
                GdbotsFormsFormV1Mixin::create(),
                GdbotsNcrExpirableV1Mixin::create(),
                GdbotsNcrIndexedV1Mixin::create(),
                GdbotsNcrPublishableV1Mixin::create(),
                GdbotsCommonTaggableV1Mixin::create(),
            ]
        );
    }

    /**
     * @return array
     */
    public function getUriTemplateVars()
    {
        return ['solicit_id' => (string)$this->get('_id')];
    }
}
