<?php

namespace Eme\Schemas\Accounts\Node;

use Eme\Schemas\Accounts\AccountId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1Trait;
use Gdbots\Schemas\Ncr\Mixin\Sluggable\SluggableV1;
use Gdbots\Schemas\Ncr\Mixin\Sluggable\SluggableV1Mixin;
use Gdbots\Schemas\Ncr\Mixin\Sluggable\SluggableV1Trait;

final class AccountV1 extends AbstractMessage implements
    Account,
    NodeV1,
    SluggableV1
  
{
    use NodeV1Trait;
    use SluggableV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:accounts:node:account:1-0-0', __CLASS__,
            [
                Fb::create('_id', T\IdentifierType::create())
                    ->required()
                    ->className('Eme\Schemas\Accounts\AccountId')
                    ->overridable(true)
                    ->build(),
                Fb::create('trackers', T\MessageType::create())
                    ->asAMap()
                    ->className('Gdbots\Schemas\Analytics\Mixin\Tracker\Tracker')
                    ->build()
            ],
            [
                NodeV1Mixin::create(), 
                SluggableV1Mixin::create()
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
