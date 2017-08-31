// @link http://schemas.wbeme.com/json-schema/eme/solicits/event/solicit-deleted/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import GdbotsFormsFormDeletedV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/form-deleted/FormDeletedV1Mixin';
import GdbotsNcrNodeDeletedV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/node-deleted/NodeDeletedV1Mixin';
import GdbotsPbjxEventV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Mixin';
import GdbotsPbjxEventV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class SolicitDeletedV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:event:solicit-deleted:1-0-0', SolicitDeletedV1,
      [],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxEventV1Mixin.create(),
        GdbotsNcrNodeDeletedV1Mixin.create(),
        GdbotsFormsFormDeletedV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxEventV1Trait(SolicitDeletedV1);
MessageResolver.register('eme:solicits:event:solicit-deleted', SolicitDeletedV1);
Object.freeze(SolicitDeletedV1);
Object.freeze(SolicitDeletedV1.prototype);
