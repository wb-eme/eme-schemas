// @link http://schemas.wbeme.com/json-schema/eme/accounts/request/get-active-accounts-request/1-0-0.json#
import GdbotsPbjxRequestV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Mixin';
import GdbotsPbjxRequestV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class GetActiveAccountsRequestV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:accounts:request:get-active-accounts-request:1-0-0', GetActiveAccountsRequestV1,
      [],
      [
        GdbotsPbjxRequestV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxRequestV1Trait(GetActiveAccountsRequestV1);
MessageResolver.register('eme:accounts:request:get-active-accounts-request', GetActiveAccountsRequestV1);
Object.freeze(GetActiveAccountsRequestV1);
Object.freeze(GetActiveAccountsRequestV1.prototype);
