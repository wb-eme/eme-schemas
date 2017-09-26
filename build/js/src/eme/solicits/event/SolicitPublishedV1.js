// @link http://schemas.wbeme.com/json-schema/eme/solicits/event/solicit-published/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import GdbotsFormsFormPublishedV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/form-published/FormPublishedV1Mixin';
import GdbotsNcrNodePublishedV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/node-published/NodePublishedV1Mixin';
import GdbotsPbjxEventV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Mixin';
import GdbotsPbjxEventV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class SolicitPublishedV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:event:solicit-published:1-0-0', SolicitPublishedV1,
      [],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxEventV1Mixin.create(),
        GdbotsNcrNodePublishedV1Mixin.create(),
        GdbotsFormsFormPublishedV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxEventV1Trait(SolicitPublishedV1);
MessageResolver.register('eme:solicits:event:solicit-published', SolicitPublishedV1);
Object.freeze(SolicitPublishedV1);
Object.freeze(SolicitPublishedV1.prototype);
