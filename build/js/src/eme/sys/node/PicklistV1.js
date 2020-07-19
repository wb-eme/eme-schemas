// @link http://schemas.wbeme.com/json-schema/eme/sys/node/picklist/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsNcrNodeV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/node/NodeV1Mixin';
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
        Fb.create('tenant_id', T.IdentifierType.create())
          .required()
          .classProto(TenantId)
          .build(),
        Fb.create('_id', T.IdentifierType.create())
          .required()
          .classProto(PicklistId)
          .build(),
        Fb.create('status', T.StringEnumType.create())
          .withDefault("draft")
          .classProto(NodeStatus)
          .build(),
        Fb.create('etag', T.StringType.create())
          .maxLength(100)
          .pattern('^[\\w\\.:-]+$')
          .build(),
        Fb.create('created_at', T.MicrotimeType.create())
          .build(),
        /*
         * A fully qualified reference to what created this node. This is intentionally a message-ref
         * and not a user id because it is often a program that creates nodes, not a user.
         */
        Fb.create('creator_ref', T.MessageRefType.create())
          .build(),
        Fb.create('updated_at', T.MicrotimeType.create())
          .useTypeDefault(false)
          .build(),
        /*
         * A fully qualified reference to what updated this node. This is intentionally a message-ref
         * and not a user id because it is often a program that updates nodes, not a user.
         * E.g. "acme:iam:node:app:cli-scheduler" or "acme:iam:node:user:60c71df0-fda8-11e5-bfb9-30342d363854"
         */
        Fb.create('updater_ref', T.MessageRefType.create())
          .build(),
        /*
         * A reference to the last event that changed the state of this node.
         * E.g. "acme:blog:event:article-published:60c71df0-fda8-11e5-bfb9-30342d363854"
         */
        Fb.create('last_event_ref', T.MessageRefType.create())
          .build(),
        Fb.create('title', T.StringType.create())
          .build(),
        Fb.create('options', T.StringType.create())
          .asAList()
          .build(),
        Fb.create('alpha_sort', T.BooleanType.create())
          .build(),
        Fb.create('allow_other', T.BooleanType.create())
          .build(),
        Fb.create('default_value', T.StringType.create())
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

GdbotsNcrNodeV1Mixin(M);

Object.freeze(M);
Object.freeze(M.prototype);
