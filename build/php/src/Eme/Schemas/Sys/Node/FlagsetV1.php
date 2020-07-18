<?php
declare(strict_types=1);

// @link http://schemas.wbeme.com/json-schema/eme/sys/node/flagset/1-0-0.json#
namespace Eme\Schemas\Sys\Node;

use Eme\Schemas\Sys\FlagsetId;
use Eme\Schemas\Sys\TenantId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Enum\NodeStatus;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1Trait as GdbotsNcrNodeV1Trait;

final class FlagsetV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:eme:sys:node:flagset:1-0-0';
    const SCHEMA_CURIE = 'eme:sys:node:flagset';
    const SCHEMA_CURIE_MAJOR = 'eme:sys:node:flagset:v1';

    const MIXINS = [
      'eme:sys:mixin:tenant-id:v1',
      'eme:sys:mixin:tenant-id',
      'gdbots:ncr:mixin:node:v1',
      'gdbots:ncr:mixin:node',
    ];

    const TENANT_ID_FIELD = 'tenant_id';
    const _ID_FIELD = '_id';
    const STATUS_FIELD = 'status';
    const ETAG_FIELD = 'etag';
    const CREATED_AT_FIELD = 'created_at';
    const CREATOR_REF_FIELD = 'creator_ref';
    const UPDATED_AT_FIELD = 'updated_at';
    const UPDATER_REF_FIELD = 'updater_ref';
    const LAST_EVENT_REF_FIELD = 'last_event_ref';
    const TITLE_FIELD = 'title';
    const BOOLEANS_FIELD = 'booleans';
    const FLOATS_FIELD = 'floats';
    const INTS_FIELD = 'ints';
    const STRINGS_FIELD = 'strings';
    const TRINARIES_FIELD = 'trinaries';

    const FIELDS = [
      self::TENANT_ID_FIELD,
      self::_ID_FIELD,
      self::STATUS_FIELD,
      self::ETAG_FIELD,
      self::CREATED_AT_FIELD,
      self::CREATOR_REF_FIELD,
      self::UPDATED_AT_FIELD,
      self::UPDATER_REF_FIELD,
      self::LAST_EVENT_REF_FIELD,
      self::TITLE_FIELD,
      self::BOOLEANS_FIELD,
      self::FLOATS_FIELD,
      self::INTS_FIELD,
      self::STRINGS_FIELD,
      self::TRINARIES_FIELD,
    ];

    use GdbotsNcrNodeV1Trait;

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                /*
                 * The EME tenant that this message is associated with.
                 */
                Fb::create(self::TENANT_ID_FIELD, T\IdentifierType::create())
                    ->required()
                    ->className(TenantId::class)
                    ->build(),
                Fb::create(self::_ID_FIELD, T\IdentifierType::create())
                    ->required()
                    ->className(FlagsetId::class)
                    ->build(),
                Fb::create(self::STATUS_FIELD, T\StringEnumType::create())
                    ->withDefault("draft")
                    ->className(NodeStatus::class)
                    ->build(),
                Fb::create(self::ETAG_FIELD, T\StringType::create())
                    ->maxLength(100)
                    ->pattern('^[\w\.:-]+$')
                    ->build(),
                Fb::create(self::CREATED_AT_FIELD, T\MicrotimeType::create())
                    ->build(),
                /*
                 * A fully qualified reference to what created this node. This is intentionally a message-ref
                 * and not a user id because it is often a program that creates nodes, not a user.
                 */
                Fb::create(self::CREATOR_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                Fb::create(self::UPDATED_AT_FIELD, T\MicrotimeType::create())
                    ->useTypeDefault(false)
                    ->build(),
                /*
                 * A fully qualified reference to what updated this node. This is intentionally a message-ref
                 * and not a user id because it is often a program that updates nodes, not a user.
                 * E.g. "acme:iam:node:app:cli-scheduler" or "acme:iam:node:user:60c71df0-fda8-11e5-bfb9-30342d363854"
                 */
                Fb::create(self::UPDATER_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                /*
                 * A reference to the last event that changed the state of this node.
                 * E.g. "acme:blog:event:article-published:60c71df0-fda8-11e5-bfb9-30342d363854"
                 */
                Fb::create(self::LAST_EVENT_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                Fb::create(self::TITLE_FIELD, T\StringType::create())
                    ->build(),
                Fb::create(self::BOOLEANS_FIELD, T\BooleanType::create())
                    ->asAMap()
                    ->build(),
                Fb::create(self::FLOATS_FIELD, T\FloatType::create())
                    ->asAMap()
                    ->build(),
                Fb::create(self::INTS_FIELD, T\IntType::create())
                    ->asAMap()
                    ->build(),
                Fb::create(self::STRINGS_FIELD, T\StringType::create())
                    ->asAMap()
                    ->build(),
                Fb::create(self::TRINARIES_FIELD, T\TrinaryType::create())
                    ->asAMap()
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
