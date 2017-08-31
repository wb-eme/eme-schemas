// @link http://schemas.wbeme.com/json-schema/eme/solicits/command/unpublish-solicit/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import GdbotsFormsUnpublishFormV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/unpublish-form/UnpublishFormV1Mixin';
import GdbotsNcrUnpublishNodeV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/unpublish-node/UnpublishNodeV1Mixin';
import GdbotsPbjxCommandV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Mixin';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class UnpublishSolicitV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:command:unpublish-solicit:1-0-0', UnpublishSolicitV1,
      [],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxCommandV1Mixin.create(),
        GdbotsNcrUnpublishNodeV1Mixin.create(),
        GdbotsFormsUnpublishFormV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxCommandV1Trait(UnpublishSolicitV1);
MessageResolver.register('eme:solicits:command:unpublish-solicit', UnpublishSolicitV1);
Object.freeze(UnpublishSolicitV1);
Object.freeze(UnpublishSolicitV1.prototype);
