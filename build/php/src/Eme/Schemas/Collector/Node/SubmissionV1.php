<?php
declare(strict_types=1);

// @link http://schemas.wbeme.com/json-schema/eme/collector/node/submission/1-0-0.json#
namespace Eme\Schemas\Collector\Node;

use Eme\Schemas\Sys\TenantId;
use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Pbj\WellKnown\UuidIdentifier;
use Gdbots\Schemas\Common\Enum\DayOfWeek;
use Gdbots\Schemas\Common\Enum\Gender;
use Gdbots\Schemas\Common\Enum\Month;
use Gdbots\Schemas\Common\Enum\SexualOrientation;
use Gdbots\Schemas\Common\FileId;
use Gdbots\Schemas\Ncr\Enum\NodeStatus;
use Gdbots\Schemas\Ncr\Mixin\Node\NodeV1Mixin as GdbotsNcrNodeV1Mixin;

final class SubmissionV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:eme:collector:node:submission:1-0-0';
    const SCHEMA_CURIE = 'eme:collector:node:submission';
    const SCHEMA_CURIE_MAJOR = 'eme:collector:node:submission:v1';
    const MIXINS = [
      'eme:sys:mixin:tenant-id:v1',
      'eme:sys:mixin:tenant-id',
      'gdbots:ncr:mixin:node:v1',
      'gdbots:ncr:mixin:node',
      'gdbots:common:mixin:labelable:v1',
      'gdbots:common:mixin:labelable',
      'gdbots:common:mixin:taggable:v1',
      'gdbots:common:mixin:taggable',
      'gdbots:enrichments:mixin:ip-to-geo:v1',
      'gdbots:enrichments:mixin:ip-to-geo',
      'gdbots:enrichments:mixin:time-parting:v1',
      'gdbots:enrichments:mixin:time-parting',
      'gdbots:enrichments:mixin:time-sampling:v1',
      'gdbots:enrichments:mixin:time-sampling',
      'gdbots:enrichments:mixin:ua-parser:v1',
      'gdbots:enrichments:mixin:ua-parser',
      'gdbots:enrichments:mixin:utm:v1',
      'gdbots:enrichments:mixin:utm',
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
                /*
                 * The "_id" value:
                 * - MUST NOT change for the life of the node.
                 * - SHOULD be globally unique
                 * - SHOULD be generated by the app (ideally in default value closure... e.g. UuidIdentifier::generate())
                 */
                Fb::create('_id', T\IdentifierType::create())
                    ->required()
                    ->withDefault(function() { return UuidIdentifier::generate(); })
                    ->className(UuidIdentifier::class)
                    ->overridable(true)
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
                 * A set of strings used for categorization or workflow.
                 * Similar to slack channels, github or gmail labels.
                 */
                Fb::create('labels', T\StringType::create())
                    ->asASet()
                    ->pattern('^[\w-]+$')
                    ->build(),
                /*
                 * Tags is a map that categorizes data or tracks references in
                 * external systems. The tags names should be consistent and descriptive,
                 * e.g. fb_user_id:123, salesforce_customer_id:456.
                 */
                Fb::create('tags', T\StringType::create())
                    ->asAMap()
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create('ctx_ip', T\StringType::create())
                    ->format(Format::IPV4())
                    ->overridable(true)
                    ->build(),
                Fb::create('ctx_ipv6', T\StringType::create())
                    ->format(Format::IPV6())
                    ->overridable(true)
                    ->build(),
                Fb::create('ctx_ip_geo', T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:geo::address',
                    ])
                    ->build(),
                Fb::create('month_of_year', T\IntEnumType::create())
                    ->withDefault(0)
                    ->className(Month::class)
                    ->build(),
                Fb::create('day_of_month', T\TinyIntType::create())
                    ->max(31)
                    ->build(),
                Fb::create('day_of_week', T\IntEnumType::create())
                    ->withDefault(0)
                    ->className(DayOfWeek::class)
                    ->build(),
                Fb::create('is_weekend', T\BooleanType::create())
                    ->build(),
                Fb::create('hour_of_day', T\TinyIntType::create())
                    ->max(23)
                    ->build(),
                Fb::create('ts_ymdh', T\IntType::create())
                    ->build(),
                Fb::create('ts_ymd', T\IntType::create())
                    ->build(),
                Fb::create('ts_ym', T\MediumIntType::create())
                    ->build(),
                Fb::create('ctx_ua', T\TextType::create())
                    ->overridable(true)
                    ->build(),
                Fb::create('ctx_ua_parsed', T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:contexts::user-agent',
                    ])
                    ->build(),
                Fb::create('utm_source', T\StringType::create())
                    ->maxLength(50)
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create('utm_medium', T\StringType::create())
                    ->maxLength(50)
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create('utm_term', T\StringType::create())
                    ->maxLength(100)
                    ->pattern('^[\w\s\/\.,:-]+$')
                    ->build(),
                Fb::create('utm_content', T\StringType::create())
                    ->maxLength(50)
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create('utm_campaign', T\StringType::create())
                    ->maxLength(50)
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create('form_ref', T\NodeRefType::create())
                    ->required()
                    ->build(),
                /*
                 * The application that collected the message. This is set on the
                 * server by the collector app itself.
                 */
                Fb::create('collector', T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:contexts::app',
                    ])
                    ->build(),
                Fb::create('first_name', T\StringType::create())
                    ->build(),
                Fb::create('last_name', T\StringType::create())
                    ->build(),
                Fb::create('email', T\StringType::create())
                    ->format(Format::EMAIL())
                    ->build(),
                Fb::create('email_domain', T\StringType::create())
                    ->format(Format::HOSTNAME())
                    ->build(),
                Fb::create('address', T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:geo::address',
                    ])
                    ->build(),
                /*
                 * A general format for international telephone numbers.
                 * @link https://en.wikipedia.org/wiki/E.164
                 */
                Fb::create('phone', T\StringType::create())
                    ->asAMap()
                    ->maxLength(20)
                    ->pattern('^\+?[1-9]\d{1,14}$')
                    ->build(),
                Fb::create('dob', T\DateType::create())
                    ->build(),
                /*
                 * The "age" is generally populated if "dob" is present by using the difference of
                 * "dob" and "occurred_at" to determine the age at the time of the submission.
                 */
                Fb::create('age', T\TinyIntType::create())
                    ->max(120)
                    ->build(),
                /*
                 * The person's physical height recorded in inches.
                 */
                Fb::create('height', T\TinyIntType::create())
                    ->max(120)
                    ->build(),
                /*
                 * The person's physical weight recorded in pounds.
                 */
                Fb::create('weight', T\SmallIntType::create())
                    ->max(1500)
                    ->build(),
                Fb::create('gender', T\IntEnumType::create())
                    ->withDefault(Gender::UNKNOWN())
                    ->className(Gender::class)
                    ->build(),
                Fb::create('sexual_orientation', T\StringEnumType::create())
                    ->withDefault(SexualOrientation::UNKNOWN())
                    ->className(SexualOrientation::class)
                    ->build(),
                Fb::create('story', T\TextType::create())
                    ->build(),
                Fb::create('file_ids', T\IdentifierType::create())
                    ->asASet()
                    ->className(FileId::class)
                    ->build(),
                /*
                 * Networks is a map that contains handles/usernames on a social network.
                 * E.g. facebook:homer, twitter:stackoverflow, youtube:coltrane78.
                 */
                Fb::create('networks', T\StringType::create())
                    ->asAMap()
                    ->maxLength(50)
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                /*
                 * Mentions contains the usernames extracted from the "networks" map and possibly
                 * parsed from other text fields. Makes it possible to search @mentions.
                 */
                Fb::create('mentions', T\StringType::create())
                    ->asASet()
                    ->maxLength(50)
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                /*
                 * Publisher provided identifier (PPID)
                 */
                Fb::create('ppid', T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                Fb::create('hashtags', T\StringType::create())
                    ->asASet()
                    ->format(Format::HASHTAG())
                    ->build(),
                Fb::create('has_notes', T\BooleanType::create())
                    ->build(),
                Fb::create('interview_id', T\IdentifierType::create())
                    ->className(FileId::class)
                    ->build(),
                Fb::create('is_blocked', T\BooleanType::create())
                    ->build(),
                Fb::create('is_read', T\BooleanType::create())
                    ->build(),
                Fb::create('last_read_at', T\MicrotimeType::create())
                    ->useTypeDefault(false)
                    ->build(),
                /*
                 * The user who last read this submission.
                 */
                Fb::create('last_read_by_ref', T\NodeRefType::create())
                    ->build(),
                /*
                 * If true this submission was verified to be from the associated ctx_user_ref or email.
                 * Verification can be secure cookie, email confirmation, phone verification, login, etc.
                 * If the submission was accepted without any kind of verification this should be false.
                 */
                Fb::create('is_verified', T\BooleanType::create())
                    ->build(),
                Fb::create('is_rejected', T\BooleanType::create())
                    ->build(),
                Fb::create('verified_at', T\MicrotimeType::create())
                    ->useTypeDefault(false)
                    ->build(),
                /*
                 * The percentage (whole number) of text in the "story" that is ALL CAPS.
                 */
                Fb::create('allcaps', T\TinyIntType::create())
                    ->max(100)
                    ->build(),
                /*
                 * The maximum number of contiguous exclamation points in the "story" text.
                 */
                Fb::create('exclaims', T\TinyIntType::create())
                    ->build(),
                /*
                 * Contains all of the answers submitted from the custom fields on the form.
                 */
                Fb::create('cf', T\DynamicFieldType::create())
                    ->asAList()
                    ->build(),
                Fb::create('signature', T\TextType::create())
                    ->build(),
                /*
                 * "s256" means shard 256. Used to distribute read/write from storage and speed up
                 * replay/reindex processes. It can also be used to distribute workload in front end
                 * user interfaces or notifications (like isles in a grocery store).
                 * This value should NOT change once set.
                 */
                Fb::create('s256', T\TinyIntType::create())
                    ->build(),
                /*
                 * "s32" means shard 32. See field "s256" for explanation.
                 */
                Fb::create('s32', T\TinyIntType::create())
                    ->build(),
                /*
                 * "s16" means shard 16. See field "s256" for explanation.
                 */
                Fb::create('s16', T\TinyIntType::create())
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
