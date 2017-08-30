// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/get-solicit-response/1-0-0.json#
import GdbotsFormsGetFormResponseV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/get-form-response/GetFormResponseV1Mixin';
import GdbotsPbjxResponseV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Mixin';
import GdbotsPbjxResponseV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class GetSolicitResponseV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:request:get-solicit-response:1-0-0', GetSolicitResponseV1,
      [],
      [
        GdbotsPbjxResponseV1Mixin.create(),
        GdbotsFormsGetFormResponseV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxResponseV1Trait(GetSolicitResponseV1);
MessageResolver.register('eme:solicits:request:get-solicit-response', GetSolicitResponseV1);
Object.freeze(GetSolicitResponseV1);
Object.freeze(GetSolicitResponseV1.prototype);
