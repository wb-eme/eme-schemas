<?php
declare(strict_types=1);

// @link http://schemas.wbeme.com/json-schema/eme/forms/node/casting-form/1-0-0.json#
namespace Eme\Schemas\Forms\Node;

use Eme\Schemas\Sys\TenantId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Pbj\WellKnown\UuidIdentifier;
use Gdbots\Schemas\Common\FileId;
use Gdbots\Schemas\Forms\Enum\PiiImpact;
use Gdbots\Schemas\Ncr\Enum\NodeStatus;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1Trait as GdbotsNcrNodeV1Trait;

final class CastingFormV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:eme:forms:node:casting-form:1-0-0';
    const SCHEMA_CURIE = 'eme:forms:node:casting-form';
    const SCHEMA_CURIE_MAJOR = 'eme:forms:node:casting-form:v1';

    const MIXINS = [
      'eme:sys:mixin:tenant-id:v1',
      'eme:sys:mixin:tenant-id',
      'gdbots:ncr:mixin:node:v1',
      'gdbots:ncr:mixin:node',
      'gdbots:forms:mixin:form:v1',
      'gdbots:forms:mixin:form',
      'gdbots:ncr:mixin:expirable:v1',
      'gdbots:ncr:mixin:expirable',
      'gdbots:ncr:mixin:publishable:v1',
      'gdbots:ncr:mixin:publishable',
      'gdbots:common:mixin:labelable:v1',
      'gdbots:common:mixin:labelable',
      'gdbots:common:mixin:taggable:v1',
      'gdbots:common:mixin:taggable',
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
    const DESCRIPTION_FIELD = 'description';
    const THANK_YOU_HEADER_FIELD = 'thank_you_header';
    const THANK_YOU_TEXT_FIELD = 'thank_you_text';
    const THANK_YOU_URL_FIELD = 'thank_you_url';
    const TEMPLATE_FIELD = 'template';
    const CUSTOM_CODE_FIELD = 'custom_code';
    const FIELDS_FIELD = 'fields';
    const HASHTAGS_FIELD = 'hashtags';
    const DISCLAIMER_FIELD = 'disclaimer';
    const IMAGE_ID_FIELD = 'image_id';
    const PII_IMPACT_FIELD = 'pii_impact';
    const EXPIRES_AT_FIELD = 'expires_at';
    const PUBLISHED_AT_FIELD = 'published_at';
    const LABELS_FIELD = 'labels';
    const TAGS_FIELD = 'tags';

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
      self::DESCRIPTION_FIELD,
      self::THANK_YOU_HEADER_FIELD,
      self::THANK_YOU_TEXT_FIELD,
      self::THANK_YOU_URL_FIELD,
      self::TEMPLATE_FIELD,
      self::CUSTOM_CODE_FIELD,
      self::FIELDS_FIELD,
      self::HASHTAGS_FIELD,
      self::DISCLAIMER_FIELD,
      self::IMAGE_ID_FIELD,
      self::PII_IMPACT_FIELD,
      self::EXPIRES_AT_FIELD,
      self::PUBLISHED_AT_FIELD,
      self::LABELS_FIELD,
      self::TAGS_FIELD,
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
                /*
                 * The "_id" value:
                 * - MUST NOT change for the life of the node.
                 * - SHOULD be globally unique
                 * - SHOULD be generated by the app (ideally in default value closure... e.g. UuidIdentifier::generate())
                 */
                Fb::create(self::_ID_FIELD, T\IdentifierType::create())
                    ->required()
                    ->withDefault(function() { return UuidIdentifier::generate(); })
                    ->className(UuidIdentifier::class)
                    ->overridable(true)
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
                 * A short description (a few sentences) about this form. This field should
                 * not have html as it is used in metadata.
                 */
                Fb::create(self::DESCRIPTION_FIELD, T\TextType::create())
                    ->build(),
                Fb::create(self::THANK_YOU_HEADER_FIELD, T\StringType::create())
                    ->build(),
                /*
                 * A short thank you message (a few sentences) a user will see after
                 * they submit this form. This field should have little to no html
                 * as it can be used in various contexts.
                 */
                Fb::create(self::THANK_YOU_TEXT_FIELD, T\TextType::create())
                    ->build(),
                Fb::create(self::THANK_YOU_URL_FIELD, T\StringType::create())
                    ->format(Format::URL())
                    ->build(),
                Fb::create(self::TEMPLATE_FIELD, T\StringType::create())
                    ->format(Format::SLUG())
                    ->build(),
                /*
                 * A map containing (HTML, JavaScript, CSS, etc.) that is injected into
                 * a template at a named insertion point, e.g. "html_head" or "footer".
                 */
                Fb::create(self::CUSTOM_CODE_FIELD, T\TextType::create())
                    ->asAMap()
                    ->build(),
                Fb::create(self::FIELDS_FIELD, T\MessageType::create())
                    ->asAList()
                    ->anyOfCuries([
                        'gdbots:forms:mixin:field',
                    ])
                    ->build(),
                Fb::create(self::HASHTAGS_FIELD, T\StringType::create())
                    ->asASet()
                    ->format(Format::HASHTAG())
                    ->build(),
                Fb::create(self::DISCLAIMER_FIELD, T\TextType::create())
                    ->build(),
                Fb::create(self::IMAGE_ID_FIELD, T\IdentifierType::create())
                    ->className(FileId::class)
                    ->build(),
                Fb::create(self::PII_IMPACT_FIELD, T\StringEnumType::create())
                    ->className(PiiImpact::class)
                    ->build(),
                Fb::create(self::EXPIRES_AT_FIELD, T\DateTimeType::create())
                    ->build(),
                Fb::create(self::PUBLISHED_AT_FIELD, T\DateTimeType::create())
                    ->build(),
                /*
                 * A set of strings used for categorization or workflow.
                 * Similar to slack channels, github or gmail labels.
                 */
                Fb::create(self::LABELS_FIELD, T\StringType::create())
                    ->asASet()
                    ->pattern('^[\w-]+$')
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
            ],
            self::MIXINS
        );
    }

    public function getUriTemplateVars(): array
    {
        return ['_id' => $this->fget('_id')];
    }
}