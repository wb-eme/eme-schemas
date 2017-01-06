<?php

namespace Eme\Schemas\Solicits\Node;

use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Mixin;
use Eme\Schemas\Accounts\Mixin\AccountRef\AccountRefV1Trait;
use Eme\Schemas\Solicits\SolicitId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Mixin\Expirable\ExpirableV1;
use Gdbots\Schemas\Ncr\Mixin\Expirable\ExpirableV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\Expirable\ExpirableV1Trait;
use Gdbots\Schemas\Ncr\Mixin\Indexed\IndexedV1;
use Gdbots\Schemas\Ncr\Mixin\Indexed\IndexedV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\Indexed\IndexedV1Trait;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1Trait;
use Gdbots\Schemas\Ncr\Mixin\Publishable\PublishableV1;
use Gdbots\Schemas\Ncr\Mixin\Publishable\PublishableV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\Publishable\PublishableV1Trait;

final class SolicitV1 extends AbstractMessage implements
    Solicit,
    AccountRefV1,
    NodeV1,
    ExpirableV1,
    IndexedV1,
    PublishableV1
  
{
    use AccountRefV1Trait;
    use NodeV1Trait;
    use ExpirableV1Trait;
    use IndexedV1Trait;
    use PublishableV1Trait;

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
                    ->className('Eme\Schemas\Solicits\SolicitId')
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
                Fb::create('story_required', T\BooleanType::create())
                    ->build(),
                Fb::create('story_label', T\StringType::create())
                    ->build(),
                Fb::create('utm_campaign', T\StringType::create())
                    ->maxLength(50)
                    ->pattern('^[\w\/\.:-]+$')
                    ->build()
            ],
            [
                AccountRefV1Mixin::create(), 
                NodeV1Mixin::create(), 
                ExpirableV1Mixin::create(), 
                IndexedV1Mixin::create(), 
                PublishableV1Mixin::create()
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
