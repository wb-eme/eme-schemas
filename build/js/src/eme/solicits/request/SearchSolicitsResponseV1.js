// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/search-solicits-response/1-0-0.json#
import GdbotsFormsSearchFormsResponseV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/search-forms-response/SearchFormsResponseV1Mixin';
import GdbotsNcrSearchNodesResponseV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/search-nodes-response/SearchNodesResponseV1Mixin';
import GdbotsPbjxResponseV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Mixin';
import GdbotsPbjxResponseV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class SearchSolicitsResponseV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:request:search-solicits-response:1-0-0', SearchSolicitsResponseV1,
      [],
      [
        GdbotsPbjxResponseV1Mixin.create(),
        GdbotsNcrSearchNodesResponseV1Mixin.create(),
        GdbotsFormsSearchFormsResponseV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxResponseV1Trait(SearchSolicitsResponseV1);
MessageResolver.register('eme:solicits:request:search-solicits-response', SearchSolicitsResponseV1);
Object.freeze(SearchSolicitsResponseV1);
Object.freeze(SearchSolicitsResponseV1.prototype);
