// @link http://schemas.wbeme.com/json-schema/eme/forms/request/search-submissions-request/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsPbjxRequestV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Trait';
import Gender from '@gdbots/schemas/gdbots/common/enums/Gender';
import Message from '@gdbots/pbj/Message';
import Schema from '@gdbots/pbj/Schema';
import SearchEventsSort from '@gdbots/schemas/gdbots/pbjx/enums/SearchEventsSort';
import SexualOrientation from '@gdbots/schemas/gdbots/common/enums/SexualOrientation';
import T from '@gdbots/pbj/types';

export default class SearchSubmissionsRequestV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create(this.REQUEST_ID_FIELD, T.UuidType.create())
          .required()
          .build(),
        Fb.create(this.OCCURRED_AT_FIELD, T.MicrotimeType.create())
          .build(),
        /*
         * Multi-tenant apps can use this field to track the tenant id.
         */
        Fb.create(this.CTX_TENANT_ID_FIELD, T.StringType.create())
          .pattern('^[\\w\\/\\.:-]+$')
          .build(),
        /*
         * The "ctx_retries" field is used to keep track of how many attempts were
         * made to handle this request. In some cases, the service or transport
         * that handles the request may be down or over capacity and is being retried.
         */
        Fb.create(this.CTX_RETRIES_FIELD, T.TinyIntType.create())
          .build(),
        Fb.create(this.CTX_CAUSATOR_REF_FIELD, T.MessageRefType.create())
          .build(),
        Fb.create(this.CTX_CORRELATOR_REF_FIELD, T.MessageRefType.create())
          .build(),
        Fb.create(this.CTX_USER_REF_FIELD, T.MessageRefType.create())
          .build(),
        /*
         * The "ctx_app" refers to the application used to make the request. This is
         * different from ctx_ua (user_agent) because the agent used (Safari, Firefox)
         * is not necessarily the app used (cms, iOS app, website)
         */
        Fb.create(this.CTX_APP_FIELD, T.MessageType.create())
          .anyOfCuries([
            'gdbots:contexts::app',
          ])
          .build(),
        /*
         * The "ctx_cloud" is set by the server making the request and is generally
         * only used internally for tracking and performance monitoring.
         */
        Fb.create(this.CTX_CLOUD_FIELD, T.MessageType.create())
          .anyOfCuries([
            'gdbots:contexts::cloud',
          ])
          .build(),
        Fb.create(this.CTX_IP_FIELD, T.StringType.create())
          .format(Format.IPV4)
          .overridable(true)
          .build(),
        Fb.create(this.CTX_IPV6_FIELD, T.StringType.create())
          .format(Format.IPV6)
          .overridable(true)
          .build(),
        Fb.create(this.CTX_UA_FIELD, T.TextType.create())
          .overridable(true)
          .build(),
        /*
         * Field names to dereference, this serves as a hint to the server and is not
         * necessarily gauranteed since authorization, availability, etc. are determined
         * by the server not the client.
         */
        Fb.create(this.DEREFS_FIELD, T.StringType.create())
          .asASet()
          .pattern('^[\\w\\.-]+$')
          .build(),
        Fb.create(this.Q_FIELD, T.TextType.create())
          .maxLength(2000)
          .build(),
        /*
         * The number of results to return.
         */
        Fb.create(this.COUNT_FIELD, T.TinyIntType.create())
          .withDefault(25)
          .build(),
        Fb.create(this.PAGE_FIELD, T.TinyIntType.create())
          .min(1)
          .withDefault(1)
          .build(),
        /*
         * A cursor is a string (normally base64 encoded) which marks a specific item in a list of data.
         * When cursor is present it should be used instead of "page".
         */
        Fb.create(this.CURSOR_FIELD, T.StringType.create())
          .build(),
        Fb.create(this.SORT_FIELD, T.StringEnumType.create())
          .withDefault("relevance")
          .classProto(SearchEventsSort)
          .build(),
        Fb.create(this.OCCURRED_AFTER_FIELD, T.DateTimeType.create())
          .build(),
        Fb.create(this.OCCURRED_BEFORE_FIELD, T.DateTimeType.create())
          .build(),
        /*
         * The fields that are being queried as determined by parsing the "q" field.
         */
        Fb.create(this.FIELDS_USED_FIELD, T.StringType.create())
          .asASet()
          .pattern('^[\\w\\.-]+$')
          .build(),
        Fb.create(this.PARSED_QUERY_JSON_FIELD, T.TextType.create())
          .build(),
        Fb.create(this.FORM_REF_FIELD, T.NodeRefType.create())
          .build(),
        Fb.create(this.IDS_FIELD, T.TimeUuidType.create())
          .asASet()
          .build(),
        Fb.create(this.CF_FILTERS_FIELD, T.MessageType.create())
          .asAList()
          .anyOfCuries([
            'eme:common::search-filter',
          ])
          .build(),
        Fb.create(this.FIRST_NAME_FIELD, T.StringType.create())
          .build(),
        Fb.create(this.LAST_NAME_FIELD, T.StringType.create())
          .build(),
        Fb.create(this.EMAIL_FIELD, T.StringType.create())
          .format(Format.EMAIL)
          .build(),
        Fb.create(this.EMAIL_DOMAIN_FIELD, T.StringType.create())
          .format(Format.HOSTNAME)
          .build(),
        Fb.create(this.ADDRESS_FIELD, T.MessageType.create())
          .anyOfCuries([
            'gdbots:geo::address',
          ])
          .build(),
        Fb.create(this.AGE_MIN_FIELD, T.TinyIntType.create())
          .max(120)
          .build(),
        Fb.create(this.AGE_MAX_FIELD, T.TinyIntType.create())
          .max(120)
          .build(),
        Fb.create(this.HEIGHT_MIN_FIELD, T.TinyIntType.create())
          .max(120)
          .build(),
        Fb.create(this.HEIGHT_MAX_FIELD, T.TinyIntType.create())
          .max(120)
          .build(),
        Fb.create(this.GENDER_FIELD, T.IntEnumType.create())
          .classProto(Gender)
          .build(),
        Fb.create(this.SEXUAL_ORIENTATION_FIELD, T.StringEnumType.create())
          .classProto(SexualOrientation)
          .build(),
        Fb.create(this.HAS_NOTES_FIELD, T.TrinaryType.create())
          .build(),
        Fb.create(this.IS_BLOCKED_FIELD, T.TrinaryType.create())
          .build(),
        Fb.create(this.IS_READ_FIELD, T.TrinaryType.create())
          .build(),
        Fb.create(this.LAST_READ_AFTER_FIELD, T.DateTimeType.create())
          .build(),
        Fb.create(this.LAST_READ_BEFORE_FIELD, T.DateTimeType.create())
          .build(),
        Fb.create(this.LAST_READ_BY_REF_FIELD, T.MessageRefType.create())
          .build(),
        Fb.create(this.IS_VERIFIED_FIELD, T.TrinaryType.create())
          .build(),
        Fb.create(this.IS_REJECTED_FIELD, T.TrinaryType.create())
          .build(),
      ],
      this.MIXINS,
    );
  }
}

const M = SearchSubmissionsRequestV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:eme:forms:request:search-submissions-request:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'eme:forms:request:search-submissions-request';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'eme:forms:request:search-submissions-request:v1';

M.prototype.MIXINS = M.MIXINS = [
  'gdbots:pbjx:mixin:request:v1',
  'gdbots:pbjx:mixin:request',
  'gdbots:pbjx:mixin:search-events-request:v1',
  'gdbots:pbjx:mixin:search-events-request',
  'gdbots:analytics:mixin:tracked-message:v1',
  'gdbots:analytics:mixin:tracked-message',
];

M.prototype.REQUEST_ID_FIELD = M.REQUEST_ID_FIELD = 'request_id';
M.prototype.OCCURRED_AT_FIELD = M.OCCURRED_AT_FIELD = 'occurred_at';
M.prototype.CTX_TENANT_ID_FIELD = M.CTX_TENANT_ID_FIELD = 'ctx_tenant_id';
M.prototype.CTX_RETRIES_FIELD = M.CTX_RETRIES_FIELD = 'ctx_retries';
M.prototype.CTX_CAUSATOR_REF_FIELD = M.CTX_CAUSATOR_REF_FIELD = 'ctx_causator_ref';
M.prototype.CTX_CORRELATOR_REF_FIELD = M.CTX_CORRELATOR_REF_FIELD = 'ctx_correlator_ref';
M.prototype.CTX_USER_REF_FIELD = M.CTX_USER_REF_FIELD = 'ctx_user_ref';
M.prototype.CTX_APP_FIELD = M.CTX_APP_FIELD = 'ctx_app';
M.prototype.CTX_CLOUD_FIELD = M.CTX_CLOUD_FIELD = 'ctx_cloud';
M.prototype.CTX_IP_FIELD = M.CTX_IP_FIELD = 'ctx_ip';
M.prototype.CTX_IPV6_FIELD = M.CTX_IPV6_FIELD = 'ctx_ipv6';
M.prototype.CTX_UA_FIELD = M.CTX_UA_FIELD = 'ctx_ua';
M.prototype.DEREFS_FIELD = M.DEREFS_FIELD = 'derefs';
M.prototype.Q_FIELD = M.Q_FIELD = 'q';
M.prototype.COUNT_FIELD = M.COUNT_FIELD = 'count';
M.prototype.PAGE_FIELD = M.PAGE_FIELD = 'page';
M.prototype.CURSOR_FIELD = M.CURSOR_FIELD = 'cursor';
M.prototype.SORT_FIELD = M.SORT_FIELD = 'sort';
M.prototype.OCCURRED_AFTER_FIELD = M.OCCURRED_AFTER_FIELD = 'occurred_after';
M.prototype.OCCURRED_BEFORE_FIELD = M.OCCURRED_BEFORE_FIELD = 'occurred_before';
M.prototype.FIELDS_USED_FIELD = M.FIELDS_USED_FIELD = 'fields_used';
M.prototype.PARSED_QUERY_JSON_FIELD = M.PARSED_QUERY_JSON_FIELD = 'parsed_query_json';
M.prototype.FORM_REF_FIELD = M.FORM_REF_FIELD = 'form_ref';
M.prototype.IDS_FIELD = M.IDS_FIELD = 'ids';
M.prototype.CF_FILTERS_FIELD = M.CF_FILTERS_FIELD = 'cf_filters';
M.prototype.FIRST_NAME_FIELD = M.FIRST_NAME_FIELD = 'first_name';
M.prototype.LAST_NAME_FIELD = M.LAST_NAME_FIELD = 'last_name';
M.prototype.EMAIL_FIELD = M.EMAIL_FIELD = 'email';
M.prototype.EMAIL_DOMAIN_FIELD = M.EMAIL_DOMAIN_FIELD = 'email_domain';
M.prototype.ADDRESS_FIELD = M.ADDRESS_FIELD = 'address';
M.prototype.AGE_MIN_FIELD = M.AGE_MIN_FIELD = 'age_min';
M.prototype.AGE_MAX_FIELD = M.AGE_MAX_FIELD = 'age_max';
M.prototype.HEIGHT_MIN_FIELD = M.HEIGHT_MIN_FIELD = 'height_min';
M.prototype.HEIGHT_MAX_FIELD = M.HEIGHT_MAX_FIELD = 'height_max';
M.prototype.GENDER_FIELD = M.GENDER_FIELD = 'gender';
M.prototype.SEXUAL_ORIENTATION_FIELD = M.SEXUAL_ORIENTATION_FIELD = 'sexual_orientation';
M.prototype.HAS_NOTES_FIELD = M.HAS_NOTES_FIELD = 'has_notes';
M.prototype.IS_BLOCKED_FIELD = M.IS_BLOCKED_FIELD = 'is_blocked';
M.prototype.IS_READ_FIELD = M.IS_READ_FIELD = 'is_read';
M.prototype.LAST_READ_AFTER_FIELD = M.LAST_READ_AFTER_FIELD = 'last_read_after';
M.prototype.LAST_READ_BEFORE_FIELD = M.LAST_READ_BEFORE_FIELD = 'last_read_before';
M.prototype.LAST_READ_BY_REF_FIELD = M.LAST_READ_BY_REF_FIELD = 'last_read_by_ref';
M.prototype.IS_VERIFIED_FIELD = M.IS_VERIFIED_FIELD = 'is_verified';
M.prototype.IS_REJECTED_FIELD = M.IS_REJECTED_FIELD = 'is_rejected';

M.prototype.FIELDS = M.FIELDS = [
  M.REQUEST_ID_FIELD,
  M.OCCURRED_AT_FIELD,
  M.CTX_TENANT_ID_FIELD,
  M.CTX_RETRIES_FIELD,
  M.CTX_CAUSATOR_REF_FIELD,
  M.CTX_CORRELATOR_REF_FIELD,
  M.CTX_USER_REF_FIELD,
  M.CTX_APP_FIELD,
  M.CTX_CLOUD_FIELD,
  M.CTX_IP_FIELD,
  M.CTX_IPV6_FIELD,
  M.CTX_UA_FIELD,
  M.DEREFS_FIELD,
  M.Q_FIELD,
  M.COUNT_FIELD,
  M.PAGE_FIELD,
  M.CURSOR_FIELD,
  M.SORT_FIELD,
  M.OCCURRED_AFTER_FIELD,
  M.OCCURRED_BEFORE_FIELD,
  M.FIELDS_USED_FIELD,
  M.PARSED_QUERY_JSON_FIELD,
  M.FORM_REF_FIELD,
  M.IDS_FIELD,
  M.CF_FILTERS_FIELD,
  M.FIRST_NAME_FIELD,
  M.LAST_NAME_FIELD,
  M.EMAIL_FIELD,
  M.EMAIL_DOMAIN_FIELD,
  M.ADDRESS_FIELD,
  M.AGE_MIN_FIELD,
  M.AGE_MAX_FIELD,
  M.HEIGHT_MIN_FIELD,
  M.HEIGHT_MAX_FIELD,
  M.GENDER_FIELD,
  M.SEXUAL_ORIENTATION_FIELD,
  M.HAS_NOTES_FIELD,
  M.IS_BLOCKED_FIELD,
  M.IS_READ_FIELD,
  M.LAST_READ_AFTER_FIELD,
  M.LAST_READ_BEFORE_FIELD,
  M.LAST_READ_BY_REF_FIELD,
  M.IS_VERIFIED_FIELD,
  M.IS_REJECTED_FIELD,
];

GdbotsPbjxRequestV1Trait(M);

Object.freeze(M);
Object.freeze(M.prototype);
