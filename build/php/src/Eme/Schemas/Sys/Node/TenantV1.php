<?php
declare(strict_types=1);

// @link http://schemas.wbeme.com/json-schema/eme/sys/node/tenant/1-0-0.json#
namespace Eme\Schemas\Sys\Node;

use Eme\Schemas\Sys\TenantId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Ncr\Enum\NodeStatus;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1Trait as GdbotsNcrNodeV1Trait;

final class TenantV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:eme:sys:node:tenant:1-0-0';
    const SCHEMA_CURIE = 'eme:sys:node:tenant';
    const SCHEMA_CURIE_MAJOR = 'eme:sys:node:tenant:v1';

    const MIXINS = [
      'gdbots:ncr:mixin:node:v1',
      'gdbots:ncr:mixin:node',
      'gdbots:ncr:mixin:sluggable:v1',
      'gdbots:ncr:mixin:sluggable',
      'gdbots:common:mixin:taggable:v1',
      'gdbots:common:mixin:taggable',
    ];

    const _ID_FIELD = '_id';
    const STATUS_FIELD = 'status';
    const ETAG_FIELD = 'etag';
    const CREATED_AT_FIELD = 'created_at';
    const CREATOR_REF_FIELD = 'creator_ref';
    const UPDATED_AT_FIELD = 'updated_at';
    const UPDATER_REF_FIELD = 'updater_ref';
    const LAST_EVENT_REF_FIELD = 'last_event_ref';
    const TITLE_FIELD = 'title';
    const SLUG_FIELD = 'slug';
    const TAGS_FIELD = 'tags';
    const AUTH0_CLIENT_ID_FIELD = 'auth0_client_id';

    const FIELDS = [
      self::_ID_FIELD,
      self::STATUS_FIELD,
      self::ETAG_FIELD,
      self::CREATED_AT_FIELD,
      self::CREATOR_REF_FIELD,
      self::UPDATED_AT_FIELD,
      self::UPDATER_REF_FIELD,
      self::LAST_EVENT_REF_FIELD,
      self::TITLE_FIELD,
      self::SLUG_FIELD,
      self::TAGS_FIELD,
      self::AUTH0_CLIENT_ID_FIELD,
    ];

    use GdbotsNcrNodeV1Trait;

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create(self::_ID_FIELD, T\IdentifierType::create())
                    ->required()
                    ->className(TenantId::class)
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
                /*
                 * The "slug" is a secondary identifier, typically used in a url:
                 * - MUST be url friendly
                 * - SHOULD NOT be case sensitive
                 * - SHOULD be unique within the message curie namespace
                 * - CAN be changed, but in practice once nodes are published you should avoid it if possible
                 */
                Fb::create(self::SLUG_FIELD, T\StringType::create())
                    ->format(Format::SLUG())
                    ->build(),
                /*
                 * Tags is a map that categorizes data or tracks references in
                 * external systems. The tags names should be consistent and descriptive,
                 * e.g. fb_user_id:123, salesforce_customer_id:456.
                 */
                Fb::create(self::TAGS_FIELD, T\StringType::create())
                    ->asAMap()
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                /*
                 * Auth0 Client ID (or app id) does not require encryption.
                 */
                Fb::create(self::AUTH0_CLIENT_ID_FIELD, T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
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
