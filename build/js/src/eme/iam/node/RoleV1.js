// @link http://schemas.wbeme.com/json-schema/eme/iam/node/role/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsIamRoleV1Trait from '@gdbots/schemas/gdbots/iam/mixin/role/RoleV1Trait';
import GdbotsNcrNodeV1Trait from '@gdbots/schemas/gdbots/ncr/mixin/node/NodeV1Trait';
import Message from '@gdbots/pbj/Message';
import NodeStatus from '@gdbots/schemas/gdbots/ncr/enums/NodeStatus';
import RoleId from '@gdbots/schemas/gdbots/iam/RoleId';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';
import TenantId from '@wbeme/schemas/eme/sys/TenantId';

export default class RoleV1 extends Message {
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
          .classProto(RoleId)
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
        /*
         * The "allowed" field is a set of actions that a user will be granted.
         * Although the string can be anything it is best practice to use the
         * curies of the pbjx commands and requests from your application.
         * E.g. "acme:blog:command:publish-article" or "acme:blog:command:*"
         */
        Fb.create(this.ALLOWED_FIELD, T.StringType.create())
          .asASet()
          .pattern('^[a-z0-9_\\*\\.:-]+$')
          .build(),
        /*
         * The "denied" field works just like the "allowed" field with the
         * exception that these rules take precedence and deny a user's
         * ability to perform the action.
         */
        Fb.create(this.DENIED_FIELD, T.StringType.create())
          .asASet()
          .pattern('^[a-z0-9_\\*\\.:-]+$')
          .build(),
      ],
      this.MIXINS,
    );
  }
}

const M = RoleV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:eme:iam:node:role:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'eme:iam:node:role';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'eme:iam:node:role:v1';

M.prototype.MIXINS = M.MIXINS = [
  'eme:sys:mixin:tenant-id:v1',
  'eme:sys:mixin:tenant-id',
  'gdbots:ncr:mixin:node:v1',
  'gdbots:ncr:mixin:node',
  'gdbots:iam:mixin:role:v1',
  'gdbots:iam:mixin:role',
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
M.prototype.ALLOWED_FIELD = M.ALLOWED_FIELD = 'allowed';
M.prototype.DENIED_FIELD = M.DENIED_FIELD = 'denied';

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
  M.ALLOWED_FIELD,
  M.DENIED_FIELD,
];

GdbotsNcrNodeV1Trait(M);

GdbotsIamRoleV1Trait(M);

Object.freeze(M);
Object.freeze(M.prototype);
