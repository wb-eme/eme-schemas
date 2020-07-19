<?php
declare(strict_types=1);

// @link http://schemas.wbeme.com/json-schema/eme/sys/node/picklist/1-0-0.json#
namespace Eme\Schemas\Sys\Node;

use Eme\Schemas\Sys\PicklistId;
use Eme\Schemas\Sys\TenantId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Enum\NodeStatus;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1Mixin as GdbotsNcrNodeV1Mixin;

final class PicklistV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:eme:sys:node:picklist:1-0-0';
    const SCHEMA_CURIE = 'eme:sys:node:picklist';
    const SCHEMA_CURIE_MAJOR = 'eme:sys:node:picklist:v1';
    const MIXINS = [
      'eme:sys:mixin:tenant-id:v1',
      'eme:sys:mixin:tenant-id',
      'gdbots:ncr:mixin:node:v1',
      'gdbots:ncr:mixin:node',
    ];

    use GdbotsNcrNodeV1Mixin;

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                /*
                 * The EME tenant that this message is associated with.
                 */
                Fb::create('tenant_id', T\IdentifierType::create())
                    ->required()
                    ->className(TenantId::class)
                    ->build(),
                Fb::create('_id', T\IdentifierType::create())
                    ->required()
                    ->className(PicklistId::class)
                    ->build(),
                Fb::create('status', T\StringEnumType::create())
                    ->withDefault("draft")
                    ->className(NodeStatus::class)
                    ->build(),
                Fb::create('etag', T\StringType::create())
                    ->maxLength(100)
                    ->pattern('^[\w\.:-]+$')
                    ->build(),
                Fb::create('created_at', T\MicrotimeType::create())
                    ->build(),
                /*
                 * A fully qualified reference to what created this node. This is intentionally a message-ref
                 * and not a user id because it is often a program that creates nodes, not a user.
                 */
                Fb::create('creator_ref', T\MessageRefType::create())
                    ->build(),
                Fb::create('updated_at', T\MicrotimeType::create())
                    ->useTypeDefault(false)
                    ->build(),
                /*
                 * A fully qualified reference to what updated this node. This is intentionally a message-ref
                 * and not a user id because it is often a program that updates nodes, not a user.
                 * E.g. "acme:iam:node:app:cli-scheduler" or "acme:iam:node:user:60c71df0-fda8-11e5-bfb9-30342d363854"
                 */
                Fb::create('updater_ref', T\MessageRefType::create())
                    ->build(),
                /*
                 * A reference to the last event that changed the state of this node.
                 * E.g. "acme:blog:event:article-published:60c71df0-fda8-11e5-bfb9-30342d363854"
                 */
                Fb::create('last_event_ref', T\MessageRefType::create())
                    ->build(),
                Fb::create('title', T\StringType::create())
                    ->build(),
                Fb::create('options', T\StringType::create())
                    ->asAList()
                    ->build(),
                Fb::create('alpha_sort', T\BooleanType::create())
                    ->build(),
                Fb::create('allow_other', T\BooleanType::create())
                    ->build(),
                Fb::create('default_value', T\StringType::create())
                    ->build(),
            ],
            self::MIXINS
        );
    }

    public function getUriTemplateVars(): array
    {
        return ['_id' => $this->fget('_id')];
    }
}
