// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/get-solicit-history-response/1-0-0.json#
import GdbotsFormsGetFormHistoryResponseV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/get-form-history-response/GetFormHistoryResponseV1Mixin';
import GdbotsPbjxGetEventsResponseV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/get-events-response/GetEventsResponseV1Mixin';
import GdbotsPbjxResponseV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Mixin';
import GdbotsPbjxResponseV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class GetSolicitHistoryResponseV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:request:get-solicit-history-response:1-0-0', GetSolicitHistoryResponseV1,
      [],
      [
        GdbotsPbjxResponseV1Mixin.create(),
        GdbotsPbjxGetEventsResponseV1Mixin.create(),
        GdbotsFormsGetFormHistoryResponseV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxResponseV1Trait(GetSolicitHistoryResponseV1);
MessageResolver.register('eme:solicits:request:get-solicit-history-response', GetSolicitHistoryResponseV1);
Object.freeze(GetSolicitHistoryResponseV1);
Object.freeze(GetSolicitHistoryResponseV1.prototype);
