// @link http://schemas.wbeme.com/json-schema/eme/solicits/command/publish-solicit/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import GdbotsFormsPublishFormV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/publish-form/PublishFormV1Mixin';
import GdbotsNcrPublishNodeV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/publish-node/PublishNodeV1Mixin';
import GdbotsPbjxCommandV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Mixin';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class PublishSolicitV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:command:publish-solicit:1-0-0', PublishSolicitV1,
      [],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxCommandV1Mixin.create(),
        GdbotsNcrPublishNodeV1Mixin.create(),
        GdbotsFormsPublishFormV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxCommandV1Trait(PublishSolicitV1);
MessageResolver.register('eme:solicits:command:publish-solicit', PublishSolicitV1);
Object.freeze(PublishSolicitV1);
Object.freeze(PublishSolicitV1.prototype);
