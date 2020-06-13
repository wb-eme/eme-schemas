<?php
declare(strict_types=1);

// @link http://schemas.wbeme.com/json-schema/eme/forms/request/search-submissions-request/1-0-0.json#
namespace Eme\Schemas\Forms\Request;

use Gdbots\Pbj\AbstractMessage;
use Gdbots\Pbj\Enum\Format;
use Gdbots\Pbj\FieldBuilder as Fb;
use Gdbots\Pbj\Schema;
use Gdbots\Pbj\Type as T;
use Gdbots\Schemas\Common\Enum\Gender;
use Gdbots\Schemas\Common\Enum\SexualOrientation;
use Gdbots\Schemas\Pbjx\Enum\SearchEventsSort;
use Gdbots\Schemas\Pbjx\Mixin\Request\RequestV1Trait as GdbotsPbjxRequestV1Trait;

final class SearchSubmissionsRequestV1 extends AbstractMessage
{
    const SCHEMA_ID = 'pbj:eme:forms:request:search-submissions-request:1-0-0';
    const SCHEMA_CURIE = 'eme:forms:request:search-submissions-request';
    const SCHEMA_CURIE_MAJOR = 'eme:forms:request:search-submissions-request:v1';

    const MIXINS = [
      'gdbots:pbjx:mixin:request:v1',
      'gdbots:pbjx:mixin:request',
      'gdbots:pbjx:mixin:search-events-request:v1',
      'gdbots:pbjx:mixin:search-events-request',
      'gdbots:analytics:mixin:tracked-message:v1',
      'gdbots:analytics:mixin:tracked-message',
    ];

    const REQUEST_ID_FIELD = 'request_id';
    const OCCURRED_AT_FIELD = 'occurred_at';
    const CTX_TENANT_ID_FIELD = 'ctx_tenant_id';
    const CTX_RETRIES_FIELD = 'ctx_retries';
    const CTX_CAUSATOR_REF_FIELD = 'ctx_causator_ref';
    const CTX_CORRELATOR_REF_FIELD = 'ctx_correlator_ref';
    const CTX_USER_REF_FIELD = 'ctx_user_ref';
    const CTX_APP_FIELD = 'ctx_app';
    const CTX_CLOUD_FIELD = 'ctx_cloud';
    const CTX_IP_FIELD = 'ctx_ip';
    const CTX_IPV6_FIELD = 'ctx_ipv6';
    const CTX_UA_FIELD = 'ctx_ua';
    const DEREFS_FIELD = 'derefs';
    const Q_FIELD = 'q';
    const COUNT_FIELD = 'count';
    const PAGE_FIELD = 'page';
    const CURSOR_FIELD = 'cursor';
    const SORT_FIELD = 'sort';
    const OCCURRED_AFTER_FIELD = 'occurred_after';
    const OCCURRED_BEFORE_FIELD = 'occurred_before';
    const FIELDS_USED_FIELD = 'fields_used';
    const PARSED_QUERY_JSON_FIELD = 'parsed_query_json';
    const FORM_REF_FIELD = 'form_ref';
    const IDS_FIELD = 'ids';
    const CF_FILTERS_FIELD = 'cf_filters';
    const FIRST_NAME_FIELD = 'first_name';
    const LAST_NAME_FIELD = 'last_name';
    const EMAIL_FIELD = 'email';
    const EMAIL_DOMAIN_FIELD = 'email_domain';
    const ADDRESS_FIELD = 'address';
    const AGE_MIN_FIELD = 'age_min';
    const AGE_MAX_FIELD = 'age_max';
    const HEIGHT_MIN_FIELD = 'height_min';
    const HEIGHT_MAX_FIELD = 'height_max';
    const GENDER_FIELD = 'gender';
    const SEXUAL_ORIENTATION_FIELD = 'sexual_orientation';
    const HAS_NOTES_FIELD = 'has_notes';
    const IS_BLOCKED_FIELD = 'is_blocked';
    const IS_READ_FIELD = 'is_read';
    const LAST_READ_AFTER_FIELD = 'last_read_after';
    const LAST_READ_BEFORE_FIELD = 'last_read_before';
    const LAST_READ_BY_REF_FIELD = 'last_read_by_ref';
    const IS_VERIFIED_FIELD = 'is_verified';
    const IS_REJECTED_FIELD = 'is_rejected';

    const FIELDS = [
      self::REQUEST_ID_FIELD,
      self::OCCURRED_AT_FIELD,
      self::CTX_TENANT_ID_FIELD,
      self::CTX_RETRIES_FIELD,
      self::CTX_CAUSATOR_REF_FIELD,
      self::CTX_CORRELATOR_REF_FIELD,
      self::CTX_USER_REF_FIELD,
      self::CTX_APP_FIELD,
      self::CTX_CLOUD_FIELD,
      self::CTX_IP_FIELD,
      self::CTX_IPV6_FIELD,
      self::CTX_UA_FIELD,
      self::DEREFS_FIELD,
      self::Q_FIELD,
      self::COUNT_FIELD,
      self::PAGE_FIELD,
      self::CURSOR_FIELD,
      self::SORT_FIELD,
      self::OCCURRED_AFTER_FIELD,
      self::OCCURRED_BEFORE_FIELD,
      self::FIELDS_USED_FIELD,
      self::PARSED_QUERY_JSON_FIELD,
      self::FORM_REF_FIELD,
      self::IDS_FIELD,
      self::CF_FILTERS_FIELD,
      self::FIRST_NAME_FIELD,
      self::LAST_NAME_FIELD,
      self::EMAIL_FIELD,
      self::EMAIL_DOMAIN_FIELD,
      self::ADDRESS_FIELD,
      self::AGE_MIN_FIELD,
      self::AGE_MAX_FIELD,
      self::HEIGHT_MIN_FIELD,
      self::HEIGHT_MAX_FIELD,
      self::GENDER_FIELD,
      self::SEXUAL_ORIENTATION_FIELD,
      self::HAS_NOTES_FIELD,
      self::IS_BLOCKED_FIELD,
      self::IS_READ_FIELD,
      self::LAST_READ_AFTER_FIELD,
      self::LAST_READ_BEFORE_FIELD,
      self::LAST_READ_BY_REF_FIELD,
      self::IS_VERIFIED_FIELD,
      self::IS_REJECTED_FIELD,
    ];

    use GdbotsPbjxRequestV1Trait;

    protected static function defineSchema(): Schema
    {
        return new Schema(self::SCHEMA_ID, __CLASS__,
            [
                Fb::create(self::REQUEST_ID_FIELD, T\UuidType::create())
                    ->required()
                    ->build(),
                Fb::create(self::OCCURRED_AT_FIELD, T\MicrotimeType::create())
                    ->build(),
                /*
                 * Multi-tenant apps can use this field to track the tenant id.
                 */
                Fb::create(self::CTX_TENANT_ID_FIELD, T\StringType::create())
                    ->pattern('^[\w\/\.:-]+$')
                    ->build(),
                /*
                 * The "ctx_retries" field is used to keep track of how many attempts were
                 * made to handle this request. In some cases, the service or transport
                 * that handles the request may be down or over capacity and is being retried.
                 */
                Fb::create(self::CTX_RETRIES_FIELD, T\TinyIntType::create())
                    ->build(),
                Fb::create(self::CTX_CAUSATOR_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                Fb::create(self::CTX_CORRELATOR_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                Fb::create(self::CTX_USER_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                /*
                 * The "ctx_app" refers to the application used to make the request. This is
                 * different from ctx_ua (user_agent) because the agent used (Safari, Firefox)
                 * is not necessarily the app used (cms, iOS app, website)
                 */
                Fb::create(self::CTX_APP_FIELD, T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:contexts::app',
                    ])
                    ->build(),
                /*
                 * The "ctx_cloud" is set by the server making the request and is generally
                 * only used internally for tracking and performance monitoring.
                 */
                Fb::create(self::CTX_CLOUD_FIELD, T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:contexts::cloud',
                    ])
                    ->build(),
                Fb::create(self::CTX_IP_FIELD, T\StringType::create())
                    ->format(Format::IPV4())
                    ->overridable(true)
                    ->build(),
                Fb::create(self::CTX_IPV6_FIELD, T\StringType::create())
                    ->format(Format::IPV6())
                    ->overridable(true)
                    ->build(),
                Fb::create(self::CTX_UA_FIELD, T\TextType::create())
                    ->overridable(true)
                    ->build(),
                /*
                 * Field names to dereference, this serves as a hint to the server and is not
                 * necessarily gauranteed since authorization, availability, etc. are determined
                 * by the server not the client.
                 */
                Fb::create(self::DEREFS_FIELD, T\StringType::create())
                    ->asASet()
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                Fb::create(self::Q_FIELD, T\TextType::create())
                    ->maxLength(2000)
                    ->build(),
                /*
                 * The number of results to return.
                 */
                Fb::create(self::COUNT_FIELD, T\TinyIntType::create())
                    ->withDefault(25)
                    ->build(),
                Fb::create(self::PAGE_FIELD, T\TinyIntType::create())
                    ->min(1)
                    ->withDefault(1)
                    ->build(),
                /*
                 * A cursor is a string (normally base64 encoded) which marks a specific item in a list of data.
                 * When cursor is present it should be used instead of "page".
                 */
                Fb::create(self::CURSOR_FIELD, T\StringType::create())
                    ->build(),
                Fb::create(self::SORT_FIELD, T\StringEnumType::create())
                    ->withDefault("relevance")
                    ->className(SearchEventsSort::class)
                    ->build(),
                Fb::create(self::OCCURRED_AFTER_FIELD, T\DateTimeType::create())
                    ->build(),
                Fb::create(self::OCCURRED_BEFORE_FIELD, T\DateTimeType::create())
                    ->build(),
                /*
                 * The fields that are being queried as determined by parsing the "q" field.
                 */
                Fb::create(self::FIELDS_USED_FIELD, T\StringType::create())
                    ->asASet()
                    ->pattern('^[\w\.-]+$')
                    ->build(),
                Fb::create(self::PARSED_QUERY_JSON_FIELD, T\TextType::create())
                    ->build(),
                Fb::create(self::FORM_REF_FIELD, T\NodeRefType::create())
                    ->build(),
                Fb::create(self::IDS_FIELD, T\TimeUuidType::create())
                    ->asASet()
                    ->build(),
                Fb::create(self::CF_FILTERS_FIELD, T\MessageType::create())
                    ->asAList()
                    ->anyOfCuries([
                        'eme:common::search-filter',
                    ])
                    ->build(),
                Fb::create(self::FIRST_NAME_FIELD, T\StringType::create())
                    ->build(),
                Fb::create(self::LAST_NAME_FIELD, T\StringType::create())
                    ->build(),
                Fb::create(self::EMAIL_FIELD, T\StringType::create())
                    ->format(Format::EMAIL())
                    ->build(),
                Fb::create(self::EMAIL_DOMAIN_FIELD, T\StringType::create())
                    ->format(Format::HOSTNAME())
                    ->build(),
                Fb::create(self::ADDRESS_FIELD, T\MessageType::create())
                    ->anyOfCuries([
                        'gdbots:geo::address',
                    ])
                    ->build(),
                Fb::create(self::AGE_MIN_FIELD, T\TinyIntType::create())
                    ->max(120)
                    ->build(),
                Fb::create(self::AGE_MAX_FIELD, T\TinyIntType::create())
                    ->max(120)
                    ->build(),
                Fb::create(self::HEIGHT_MIN_FIELD, T\TinyIntType::create())
                    ->max(120)
                    ->build(),
                Fb::create(self::HEIGHT_MAX_FIELD, T\TinyIntType::create())
                    ->max(120)
                    ->build(),
                Fb::create(self::GENDER_FIELD, T\IntEnumType::create())
                    ->className(Gender::class)
                    ->build(),
                Fb::create(self::SEXUAL_ORIENTATION_FIELD, T\StringEnumType::create())
                    ->className(SexualOrientation::class)
                    ->build(),
                Fb::create(self::HAS_NOTES_FIELD, T\TrinaryType::create())
                    ->build(),
                Fb::create(self::IS_BLOCKED_FIELD, T\TrinaryType::create())
                    ->build(),
                Fb::create(self::IS_READ_FIELD, T\TrinaryType::create())
                    ->build(),
                Fb::create(self::LAST_READ_AFTER_FIELD, T\DateTimeType::create())
                    ->build(),
                Fb::create(self::LAST_READ_BEFORE_FIELD, T\DateTimeType::create())
                    ->build(),
                Fb::create(self::LAST_READ_BY_REF_FIELD, T\MessageRefType::create())
                    ->build(),
                Fb::create(self::IS_VERIFIED_FIELD, T\TrinaryType::create())
                    ->build(),
                Fb::create(self::IS_REJECTED_FIELD, T\TrinaryType::create())
                    ->build(),
            ],
            self::MIXINS
        );
    }
}
