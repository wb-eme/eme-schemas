// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/get-solicit-batch-response/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import GdbotsFormsGetFormBatchResponseV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/get-form-batch-response/GetFormBatchResponseV1Mixin';
import GdbotsNcrGetNodeBatchResponseV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/get-node-batch-response/GetNodeBatchResponseV1Mixin';
import GdbotsPbjxResponseV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Mixin';
import GdbotsPbjxResponseV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class GetSolicitBatchResponseV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:request:get-solicit-batch-response:1-0-0', GetSolicitBatchResponseV1,
      [],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxResponseV1Mixin.create(),
        GdbotsNcrGetNodeBatchResponseV1Mixin.create(),
        GdbotsFormsGetFormBatchResponseV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxResponseV1Trait(GetSolicitBatchResponseV1);
MessageResolver.register('eme:solicits:request:get-solicit-batch-response', GetSolicitBatchResponseV1);
Object.freeze(GetSolicitBatchResponseV1);
Object.freeze(GetSolicitBatchResponseV1.prototype);
