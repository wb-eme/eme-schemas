// @link http://schemas.wbeme.com/json-schema/eme/accounts/request/get-active-accounts-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxResponseV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Mixin';
import GdbotsPbjxResponseV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class GetActiveAccountsResponseV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:accounts:request:get-active-accounts-response:1-0-0', GetActiveAccountsResponseV1,
      [
        Fb.create('accounts', T.MessageType.create())
          .asAMap()
          .anyOfCuries([
            'eme:accounts:node:account',
          ])
          .build(),
      ],
      [
        GdbotsPbjxResponseV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxResponseV1Trait(GetActiveAccountsResponseV1);
MessageResolver.register('eme:accounts:request:get-active-accounts-response', GetActiveAccountsResponseV1);
Object.freeze(GetActiveAccountsResponseV1);
Object.freeze(GetActiveAccountsResponseV1.prototype);
