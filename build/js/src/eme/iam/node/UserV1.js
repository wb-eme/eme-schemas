// @link http://schemas.wbeme.com/json-schema/eme/iam/node/user/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsIamUserV1Trait from '@gdbots/schemas/gdbots/iam/mixin/user/UserV1Trait';
import GdbotsNcrNodeV1Trait from '@gdbots/schemas/gdbots/ncr/mixin/node/NodeV1Trait';
import Message from '@gdbots/pbj/Message';
import NodeStatus from '@gdbots/schemas/gdbots/ncr/enums/NodeStatus';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';
import TenantId from '@wbeme/schemas/eme/sys/TenantId';
import UuidIdentifier from '@gdbots/pbj/well-known/UuidIdentifier';

export default class UserV1 extends Message {
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
        /*
         * The "_id" value:
         * - MUST NOT change for the life of the node.
         * - SHOULD be globally unique
         * - SHOULD be generated by the app (ideally in default value closure... e.g. UuidIdentifier::generate())
         */
        Fb.create(this._ID_FIELD, T.IdentifierType.create())
          .required()
          .withDefault(() => UuidIdentifier.generate())
          .classProto(UuidIdentifier)
          .overridable(true)
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
        /*
         * A general format for international telephone numbers.
         * @link https://en.wikipedia.org/wiki/E.164
         */
        Fb.create(this.PHONE_FIELD, T.StringType.create())
          .asAMap()
          .pattern('^\\+?[1-9]\\d{1,14}$')
          .build(),
        /*
         * Networks is a map that contains handles/usernames on a social network.
         * E.g. facebook:homer, twitter:stackoverflow, youtube:coltrane78.
         */
        Fb.create(this.NETWORKS_FIELD, T.StringType.create())
          .asAMap()
          .maxLength(50)
          .pattern('^[\\w\\.-]+$')
          .build(),
        Fb.create(this.IS_BLOCKED_FIELD, T.BooleanType.create())
          .build(),
        /*
         * Indicates that the user is a staff member and has access to the cms, dashboard, etc.
         */
        Fb.create(this.IS_STAFF_FIELD, T.BooleanType.create())
          .build(),
        /*
         * A user's roles determine what permissions they'll have when using the system.
         * The role itself is a node which has a set of "allow" and "deny" rules.
         */
        Fb.create(this.ROLES_FIELD, T.NodeRefType.create())
          .asASet()
          .build(),
        /*
         * A set of strings used for categorization or workflow.
         * Similar to slack channels, github or gmail labels.
         */
        Fb.create(this.LABELS_FIELD, T.StringType.create())
          .asASet()
          .pattern('^[\\w-]+$')
          .build(),
        /*
         * Tags is a map that categorizes data or tracks references in
         * external systems. The tags names should be consistent and descriptive,
         * e.g. fb_user_id:123, salesforce_customer_id:456.
         */
        Fb.create(this.TAGS_FIELD, T.StringType.create())
          .asAMap()
          .pattern('^[\\w\\/\\.:-]+$')
          .build(),
      ],
      this.MIXINS,
    );
  }
}

const M = UserV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:eme:iam:node:user:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'eme:iam:node:user';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'eme:iam:node:user:v1';

M.prototype.MIXINS = M.MIXINS = [
  'eme:sys:mixin:tenant-id:v1',
  'eme:sys:mixin:tenant-id',
  'gdbots:ncr:mixin:node:v1',
  'gdbots:ncr:mixin:node',
  'gdbots:iam:mixin:user:v1',
  'gdbots:iam:mixin:user',
  'gdbots:common:mixin:labelable:v1',
  'gdbots:common:mixin:labelable',
  'gdbots:common:mixin:taggable:v1',
  'gdbots:common:mixin:taggable',
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
M.prototype.FIRST_NAME_FIELD = M.FIRST_NAME_FIELD = 'first_name';
M.prototype.LAST_NAME_FIELD = M.LAST_NAME_FIELD = 'last_name';
M.prototype.EMAIL_FIELD = M.EMAIL_FIELD = 'email';
M.prototype.EMAIL_DOMAIN_FIELD = M.EMAIL_DOMAIN_FIELD = 'email_domain';
M.prototype.PHONE_FIELD = M.PHONE_FIELD = 'phone';
M.prototype.NETWORKS_FIELD = M.NETWORKS_FIELD = 'networks';
M.prototype.IS_BLOCKED_FIELD = M.IS_BLOCKED_FIELD = 'is_blocked';
M.prototype.IS_STAFF_FIELD = M.IS_STAFF_FIELD = 'is_staff';
M.prototype.ROLES_FIELD = M.ROLES_FIELD = 'roles';
M.prototype.LABELS_FIELD = M.LABELS_FIELD = 'labels';
M.prototype.TAGS_FIELD = M.TAGS_FIELD = 'tags';

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
  M.FIRST_NAME_FIELD,
  M.LAST_NAME_FIELD,
  M.EMAIL_FIELD,
  M.EMAIL_DOMAIN_FIELD,
  M.PHONE_FIELD,
  M.NETWORKS_FIELD,
  M.IS_BLOCKED_FIELD,
  M.IS_STAFF_FIELD,
  M.ROLES_FIELD,
  M.LABELS_FIELD,
  M.TAGS_FIELD,
];

GdbotsNcrNodeV1Trait(M);

GdbotsIamUserV1Trait(M);

Object.freeze(M);
Object.freeze(M.prototype);
