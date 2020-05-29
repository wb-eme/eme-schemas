// @link http://schemas.wbeme.com/json-schema/eme/sys/node/tenant/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsNcrNodeV1Trait from '@gdbots/schemas/gdbots/ncr/mixin/node/NodeV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
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
    return new Schema('pbj:eme:sys:node:tenant:1-0-0', TenantV1,
      [
        Fb.create('_id', T.IdentifierType.create())
          .required()
          .classProto(TenantId)
          .build(),
        Fb.create('auth0_client_domain', T.StringType.create())
          .format(Format.HOSTNAME)
          .build(),
        /*
         * Auth0 Client ID (or app id) does not require encryption.
         */
        Fb.create('auth0_client_id', T.StringType.create())
          .pattern('^[\\w\\/\\.:-]+$')
          .build(),
        /*
         * Auth0 Client Secret MUST be encrypted when stored.
         */
        Fb.create('auth0_client_secret', T.TextType.create())
          .build(),
      ],
      [
        GdbotsNcrNodeV1Mixin.create(),
        GdbotsNcrSluggableV1Mixin.create(),
        GdbotsCommonTaggableV1Mixin.create(),
      ],
    );
  }

  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return { _id: `${this.get('_id', '')}` };
  }
}

GdbotsNcrNodeV1Trait(TenantV1);
MessageResolver.register('eme:sys:node:tenant', TenantV1);
Object.freeze(TenantV1);
Object.freeze(TenantV1.prototype);
