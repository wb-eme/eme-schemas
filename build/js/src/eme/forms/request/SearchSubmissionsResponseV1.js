// @link http://schemas.wbeme.com/json-schema/eme/forms/request/search-submissions-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxResponseV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Trait';
import Message from '@gdbots/pbj/Message';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class SearchSubmissionsResponseV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create(this.RESPONSE_ID_FIELD, T.UuidType.create())
          .required()
          .build(),
        Fb.create(this.CREATED_AT_FIELD, T.MicrotimeType.create())
          .build(),
        /*
         * Multi-tenant apps can use this field to track the tenant id.
         */
        Fb.create(this.CTX_TENANT_ID_FIELD, T.StringType.create())
          .pattern('^[\\w\\/\\.:-]+$')
          .build(),
        Fb.create(this.CTX_REQUEST_REF_FIELD, T.MessageRefType.create())
          .build(),
        /*
         * The "ctx_request" is the actual request object that "ctx_request_ref" refers to.
         * In some cases it's useful for request handlers to copy the request into the response
         * so the requestor has everything in one message. This will NOT always be populated.
         * A common use case is search request/response cycles where you want to know what the
         * search criteria was so you can render that along with the results.
         */
        Fb.create(this.CTX_REQUEST_FIELD, T.MessageType.create())
          .anyOfCuries([
            'gdbots:pbjx:mixin:request',
          ])
          .build(),
        Fb.create(this.CTX_CORRELATOR_REF_FIELD, T.MessageRefType.create())
          .build(),
        /*
         * Responses can include "dereferenced" messages to prevent
         * the consumer from needing to make multiple HTTP requests.
         * It is up to the consumer to make use of the dereferenced
         * messages if/when they are provided.
         */
        Fb.create(this.DEREFS_FIELD, T.MessageType.create())
          .asAMap()
          .build(),
        /*
         * @link https://en.wikipedia.org/wiki/HATEOAS
         */
        Fb.create(this.LINKS_FIELD, T.TextType.create())
          .asAMap()
          .build(),
        Fb.create(this.METAS_FIELD, T.TextType.create())
          .asAMap()
          .build(),
        /*
         * The total number of events matching the search.
         */
        Fb.create(this.TOTAL_FIELD, T.IntType.create())
          .build(),
        Fb.create(this.HAS_MORE_FIELD, T.BooleanType.create())
          .build(),
        /*
         * How long in milliseconds it took to run the query.
         */
        Fb.create(this.TIME_TAKEN_FIELD, T.MediumIntType.create())
          .build(),
        /*
         * The maximum score of a matching event from the entire search.
         */
        Fb.create(this.MAX_SCORE_FIELD, T.FloatType.create())
          .build(),
        /*
         * Cursors are optionally provided by the underlying search system to allow for efficient
         * pagination. In the absense of cursors, paging is done using count and page number.
         */
        Fb.create(this.CURSORS_FIELD, T.StringType.create())
          .asAMap()
          .build(),
        Fb.create(this.EVENTS_FIELD, T.MessageType.create())
          .asAList()
          .anyOfCuries([
            'gdbots:pbjx:mixin:event',
          ])
          .overridable(true)
          .build(),
      ],
      this.MIXINS,
    );
  }
}

const M = SearchSubmissionsResponseV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:eme:forms:request:search-submissions-response:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'eme:forms:request:search-submissions-response';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'eme:forms:request:search-submissions-response:v1';

M.prototype.MIXINS = M.MIXINS = [
  'gdbots:pbjx:mixin:response:v1',
  'gdbots:pbjx:mixin:response',
  'gdbots:pbjx:mixin:search-events-response:v1',
  'gdbots:pbjx:mixin:search-events-response',
];

M.prototype.RESPONSE_ID_FIELD = M.RESPONSE_ID_FIELD = 'response_id';
M.prototype.CREATED_AT_FIELD = M.CREATED_AT_FIELD = 'created_at';
M.prototype.CTX_TENANT_ID_FIELD = M.CTX_TENANT_ID_FIELD = 'ctx_tenant_id';
M.prototype.CTX_REQUEST_REF_FIELD = M.CTX_REQUEST_REF_FIELD = 'ctx_request_ref';
M.prototype.CTX_REQUEST_FIELD = M.CTX_REQUEST_FIELD = 'ctx_request';
M.prototype.CTX_CORRELATOR_REF_FIELD = M.CTX_CORRELATOR_REF_FIELD = 'ctx_correlator_ref';
M.prototype.DEREFS_FIELD = M.DEREFS_FIELD = 'derefs';
M.prototype.LINKS_FIELD = M.LINKS_FIELD = 'links';
M.prototype.METAS_FIELD = M.METAS_FIELD = 'metas';
M.prototype.TOTAL_FIELD = M.TOTAL_FIELD = 'total';
M.prototype.HAS_MORE_FIELD = M.HAS_MORE_FIELD = 'has_more';
M.prototype.TIME_TAKEN_FIELD = M.TIME_TAKEN_FIELD = 'time_taken';
M.prototype.MAX_SCORE_FIELD = M.MAX_SCORE_FIELD = 'max_score';
M.prototype.CURSORS_FIELD = M.CURSORS_FIELD = 'cursors';
M.prototype.EVENTS_FIELD = M.EVENTS_FIELD = 'events';

M.prototype.FIELDS = M.FIELDS = [
  M.RESPONSE_ID_FIELD,
  M.CREATED_AT_FIELD,
  M.CTX_TENANT_ID_FIELD,
  M.CTX_REQUEST_REF_FIELD,
  M.CTX_REQUEST_FIELD,
  M.CTX_CORRELATOR_REF_FIELD,
  M.DEREFS_FIELD,
  M.LINKS_FIELD,
  M.METAS_FIELD,
  M.TOTAL_FIELD,
  M.HAS_MORE_FIELD,
  M.TIME_TAKEN_FIELD,
  M.MAX_SCORE_FIELD,
  M.CURSORS_FIELD,
  M.EVENTS_FIELD,
];

GdbotsPbjxResponseV1Trait(M);

Object.freeze(M);
Object.freeze(M.prototype);
