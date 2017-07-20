<?php
// @link http://schemas.wbeme.com/json-schema/eme/solicits/command/import-solicit/1-0-0.json#
namespace Eme\Schemas\Solicits\Command;

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
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1 as GdbotsPbjxCommandV1;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Mixin as GdbotsPbjxCommandV1Mixin;
use Gdbots\Schemas\Pbjx\Mixin\Command\CommandV1Trait as GdbotsPbjxCommandV1Trait;

final class ImportSolicitV1 extends AbstractMessage implements
    ImportSolicit,
    EmeAccountsAccountRefV1,
    GdbotsPbjxCommandV1,
    GdbotsCommonTaggableV1
{
    use GdbotsPbjxCommandV1Trait;

    /**
     * @return Schema
     */
    protected static function defineSchema()
    {
        return new Schema('pbj:eme:solicits:command:import-solicit:1-0-0', __CLASS__,
            [
                Fb::create('solicit_id', T\IdentifierType::create())
                    ->className(SolicitId::class)
                    ->build(),
                Fb::create('title', T\StringType::create())
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
                Fb::create('story_enabled', T\BooleanType::create())
                    ->withDefault(true)
                    ->build(),
                Fb::create('story_label', T\StringType::create())
                    ->build(),
                Fb::create('is_active', T\BooleanType::create())
                    ->build(),
                Fb::create('created_at', T\MicrotimeType::create())
                    ->useTypeDefault(false)
                    ->build(),
            ],
            [
                EmeAccountsAccountRefV1Mixin::create(),
                GdbotsPbjxCommandV1Mixin::create(),
                GdbotsCommonTaggableV1Mixin::create(),
            ]
        );
    }
}
