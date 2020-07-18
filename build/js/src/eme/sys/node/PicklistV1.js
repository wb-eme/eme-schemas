// @link http://schemas.wbeme.com/json-schema/eme/sys/node/picklist/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsNcrNodeV1Trait from '@gdbots/schemas/gdbots/ncr/mixin/node/NodeV1Trait';
import Message from '@gdbots/pbj/Message';
import NodeStatus from '@gdbots/schemas/gdbots/ncr/enums/NodeStatus';
import PicklistId from '@wbeme/schemas/eme/sys/PicklistId';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';
import TenantId from '@wbeme/schemas/eme/sys/TenantId';

export default class PicklistV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        /*
         * The EME tenant that this message is associated with.
         */
        Fb.create(this.TENANT_ID_FIELD, T.IdentifierType.create())
          .required()
          .classProto(TenantId)
          .build(),
        Fb.create(this._ID_FIELD, T.IdentifierType.create())
          .required()
          .classProto(PicklistId)
          .build(),
        Fb.create(this.STATUS_FIELD, T.StringEnumType.create())
          .withDefault("draft")
          .classProto(NodeStatus)
          .build(),
        Fb.create(this.ETAG_FIELD, T.StringType.create())
          .maxLength(100)
          .pattern('^[\\w\\.:-]+$')
          .build(),
        Fb.create(this.CREATED_AT_FIELD, T.MicrotimeType.create())
          .build(),
        /*
         * A fully qualified reference to what created this node. This is intentionally a message-ref
         * and not a user id because it is often a program that creates nodes, not a user.
         */
        Fb.create(this.CREATOR_REF_FIELD, T.MessageRefType.create())
          .build(),
        Fb.create(this.UPDATED_AT_FIELD, T.MicrotimeType.create())
          .useTypeDefault(false)
          .build(),
        /*
         * A fully qualified reference to what updated this node. This is intentionally a message-ref
         * and not a user id because it is often a program that updates nodes, not a user.
         * E.g. "acme:iam:node:app:cli-scheduler" or "acme:iam:node:user:60c71df0-fda8-11e5-bfb9-30342d363854"
         */
        Fb.create(this.UPDATER_REF_FIELD, T.MessageRefType.create())
          .build(),
        /*
         * A reference to the last event that changed the state of this node.
         * E.g. "acme:blog:event:article-published:60c71df0-fda8-11e5-bfb9-30342d363854"
         */
        Fb.create(this.LAST_EVENT_REF_FIELD, T.MessageRefType.create())
          .build(),
        Fb.create(this.TITLE_FIELD, T.StringType.create())
          .build(),
        Fb.create(this.OPTIONS_FIELD, T.StringType.create())
          .asAList()
          .build(),
        Fb.create(this.ALPHA_SORT_FIELD, T.BooleanType.create())
          .build(),
        Fb.create(this.ALLOW_OTHER_FIELD, T.BooleanType.create())
          .build(),
        Fb.create(this.DEFAULT_VALUE_FIELD, T.StringType.create())
          .build(),
      ],
      this.MIXINS,
    );
  }

  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return { _id: `${this.get('_id', '')}` };
  }
}

const M = PicklistV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:eme:sys:node:picklist:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'eme:sys:node:picklist';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'eme:sys:node:picklist:v1';

M.prototype.MIXINS = M.MIXINS = [
  'eme:sys:mixin:tenant-id:v1',
  'eme:sys:mixin:tenant-id',
  'gdbots:ncr:mixin:node:v1',
  'gdbots:ncr:mixin:node',
];

M.prototype.TENANT_ID_FIELD = M.TENANT_ID_FIELD = 'tenant_id';
M.prototype._ID_FIELD = M._ID_FIELD = '_id';
M.prototype.STATUS_FIELD = M.STATUS_FIELD = 'status';
M.prototype.ETAG_FIELD = M.ETAG_FIELD = 'etag';
M.prototype.CREATED_AT_FIELD = M.CREATED_AT_FIELD = 'created_at';
M.prototype.CREATOR_REF_FIELD = M.CREATOR_REF_FIELD = 'creator_ref';
M.prototype.UPDATED_AT_FIELD = M.UPDATED_AT_FIELD = 'updated_at';
M.prototype.UPDATER_REF_FIELD = M.UPDATER_REF_FIELD = 'updater_ref';
M.prototype.LAST_EVENT_REF_FIELD = M.LAST_EVENT_REF_FIELD = 'last_event_ref';
M.prototype.TITLE_FIELD = M.TITLE_FIELD = 'title';
M.prototype.OPTIONS_FIELD = M.OPTIONS_FIELD = 'options';
M.prototype.ALPHA_SORT_FIELD = M.ALPHA_SORT_FIELD = 'alpha_sort';
M.prototype.ALLOW_OTHER_FIELD = M.ALLOW_OTHER_FIELD = 'allow_other';
M.prototype.DEFAULT_VALUE_FIELD = M.DEFAULT_VALUE_FIELD = 'default_value';

M.prototype.FIELDS = M.FIELDS = [
  M.TENANT_ID_FIELD,
  M._ID_FIELD,
  M.STATUS_FIELD,
  M.ETAG_FIELD,
  M.CREATED_AT_FIELD,
  M.CREATOR_REF_FIELD,
  M.UPDATED_AT_FIELD,
  M.UPDATER_REF_FIELD,
  M.LAST_EVENT_REF_FIELD,
  M.TITLE_FIELD,
  M.OPTIONS_FIELD,
  M.ALPHA_SORT_FIELD,
  M.ALLOW_OTHER_FIELD,
  M.DEFAULT_VALUE_FIELD,
];

GdbotsNcrNodeV1Trait(M);

Object.freeze(M);
Object.freeze(M.prototype);
