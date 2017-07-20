// @link http://schemas.wbeme.com/json-schema/eme/accounts/node/account/1-0-0.json#
import AccountId from '@wbeme/schemas/eme/accounts/AccountId';
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsNcrNodeV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/node/NodeV1Mixin';
import GdbotsNcrNodeV1Trait from '@gdbots/schemas/gdbots/ncr/mixin/node/NodeV1Trait';
import GdbotsNcrSluggableV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/sluggable/SluggableV1Mixin';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class AccountV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:accounts:node:account:1-0-0', AccountV1,
      [
        Fb.create('_id', T.IdentifierType.create())
          .required()
          .classProto(AccountId)
          .overridable(true)
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
        Fb.create('trackers', T.MessageType.create())
          .asAMap()
          .anyOfCuries([
            'gdbots:analytics:mixin:tracker',
          ])
          .build(),
      ],
      [
        GdbotsNcrNodeV1Mixin.create(),
        GdbotsNcrSluggableV1Mixin.create(),
      ],
    );
  }

  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return {
      account_id: `${this.get('_id', '')}`,
      slug: this.get('slug'),
    };
  }
}

GdbotsNcrNodeV1Trait(AccountV1);
MessageResolver.register('eme:accounts:node:account', AccountV1);
Object.freeze(AccountV1);
Object.freeze(AccountV1.prototype);
