<?php
declare(strict_types=1);

// @link http://schemas.wbeme.com/json-schema/eme/iam/node/role/1-0-0.json#
namespace Eme\Schemas\Iam\Node;

use Eme\Schemas\Sys\TenantId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Iam\Mixin\Role\RoleV1Mixin as GdbotsIamRoleV1Mixin;
use Gdbots\Schemas\Iam\RoleId;
use Gdbots\Schemas\Ncr\Enum\NodeStatus;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1Mixin as GdbotsNcrNodeV1Mixin;

final class RoleV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:eme:iam:node:role:1-0-0';
    const SCHEMA_CURIE = 'eme:iam:node:role';
    const SCHEMA_CURIE_MAJOR = 'eme:iam:node:role:v1';
    const MIXINS = [
      'eme:sys:mixin:tenant-id:v1',
      'eme:sys:mixin:tenant-id',
      'gdbots:ncr:mixin:node:v1',
      'gdbots:ncr:mixin:node',
      'gdbots:iam:mixin:role:v1',
      'gdbots:iam:mixin:role',
    ];

    use GdbotsNcrNodeV1Mixin;

    use GdbotsIamRoleV1Mixin;

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
                    ->className(RoleId::class)
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
                /*
                 * The "allowed" field is a set of actions that a user will be granted.
                 * Although the string can be anything it is best practice to use the
                 * curies of the pbjx commands and requests from your application.
                 * E.g. "acme:blog:command:publish-article" or "acme:blog:command:*"
                 */
                Fb::create('allowed', T\StringType::create())
                    ->asASet()
                    ->pattern('^[a-z0-9_\*\.:-]+$')
                    ->build(),
                /*
                 * The "denied" field works just like the "allowed" field with the
                 * exception that these rules take precedence and deny a user's
                 * ability to perform the action.
                 */
                Fb::create('denied', T\StringType::create())
                    ->asASet()
                    ->pattern('^[a-z0-9_\*\.:-]+$')
                    ->build(),
            ],
            self::MIXINS
        );
    }
}
