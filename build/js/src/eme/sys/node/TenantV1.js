// @link http://schemas.wbeme.com/json-schema/eme/sys/node/tenant/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsNcrNodeV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/node/NodeV1Mixin';
import Message from '@gdbots/pbj/Message';
import NodeStatus from '@gdbots/schemas/gdbots/ncr/enums/NodeStatus';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';
import TenantId from '@wbeme/schemas/eme/sys/TenantId';

export default class TenantV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create('_id', T.IdentifierType.create())
          .required()
          .classProto(TenantId)
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
        /*
         * The "slug" is a secondary identifier, typically used in a url:
         * - MUST be url friendly
         * - SHOULD NOT be case sensitive
         * - SHOULD be unique within the message curie namespace
         * - CAN be changed, but in practice once nodes are published you should avoid it if possible
         */
        Fb.create('slug', T.StringType.create())
          .format(Format.SLUG)
          .build(),
        /*
         * Tags is a map that categorizes data or tracks references in
         * external systems. The tags names should be consistent and descriptive,
         * e.g. fb_user_id:123, salesforce_customer_id:456.
         */
        Fb.create('tags', T.StringType.create())
          .asAMap()
          .pattern('^[\\w\\/\\.:-]+$')
          .build(),
        /*
         * Auth0 Client ID (or app id) does not require encryption.
         */
        Fb.create('auth0_client_id', T.StringType.create())
          .pattern('^[\\w\\/\\.:-]+$')
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

const M = TenantV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:eme:sys:node:tenant:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'eme:sys:node:tenant';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'eme:sys:node:tenant:v1';
M.prototype.MIXINS = M.MIXINS = [
  'gdbots:ncr:mixin:node:v1',
  'gdbots:ncr:mixin:node',
  'gdbots:ncr:mixin:sluggable:v1',
  'gdbots:ncr:mixin:sluggable',
  'gdbots:common:mixin:taggable:v1',
  'gdbots:common:mixin:taggable',
];

GdbotsNcrNodeV1Mixin(M);

Object.freeze(M);
Object.freeze(M.prototype);
