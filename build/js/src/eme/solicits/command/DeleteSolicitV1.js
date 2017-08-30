// @link http://schemas.wbeme.com/json-schema/eme/solicits/command/delete-solicit/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import GdbotsFormsDeleteFormV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/delete-form/DeleteFormV1Mixin';
import GdbotsPbjxCommandV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Mixin';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class DeleteSolicitV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:command:delete-solicit:1-0-0', DeleteSolicitV1,
      [],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxCommandV1Mixin.create(),
        GdbotsFormsDeleteFormV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxCommandV1Trait(DeleteSolicitV1);
MessageResolver.register('eme:solicits:command:delete-solicit', DeleteSolicitV1);
Object.freeze(DeleteSolicitV1);
Object.freeze(DeleteSolicitV1.prototype);
