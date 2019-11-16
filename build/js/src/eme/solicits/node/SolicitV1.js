// @link http://schemas.wbeme.com/json-schema/eme/solicits/node/solicit/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsCommonTaggableV1Mixin from '@gdbots/schemas/gdbots/common/mixin/taggable/TaggableV1Mixin';
import GdbotsFormsFormV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/form/FormV1Mixin';
import GdbotsNcrExpirableV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/expirable/ExpirableV1Mixin';
import GdbotsNcrIndexedV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/indexed/IndexedV1Mixin';
import GdbotsNcrNodeV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/node/NodeV1Mixin';
import GdbotsNcrNodeV1Trait from '@gdbots/schemas/gdbots/ncr/mixin/node/NodeV1Trait';
import GdbotsNcrPublishableV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/publishable/PublishableV1Mixin';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import SolicitId from '@wbeme/schemas/eme/solicits/SolicitId';
import T from '@gdbots/pbj/types';

export default class SolicitV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:node:solicit:1-0-0', SolicitV1,
      [
        Fb.create('_id', T.IdentifierType.create())
          .required()
          .withDefault(() => SolicitId.generate())
          .classProto(SolicitId)
          .build(),
        Fb.create('category', T.StringType.create())
          .build(),
        Fb.create('cc_email', T.StringType.create())
          .format(Format.EMAIL)
          .build(),
      ],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsNcrNodeV1Mixin.create(),
        GdbotsFormsFormV1Mixin.create(),
        GdbotsNcrExpirableV1Mixin.create(),
        GdbotsNcrIndexedV1Mixin.create(),
        GdbotsNcrPublishableV1Mixin.create(),
        GdbotsCommonTaggableV1Mixin.create(),
      ],
    );
  }

  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return { solicit_id: `${this.get('_id', '')}` };
  }
}

GdbotsNcrNodeV1Trait(SolicitV1);
MessageResolver.register('eme:solicits:node:solicit', SolicitV1);
Object.freeze(SolicitV1);
Object.freeze(SolicitV1.prototype);
