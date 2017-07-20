// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/search-solicits-request/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsNcrSearchNodesRequestV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/search-nodes-request/SearchNodesRequestV1Mixin';
import GdbotsPbjxRequestV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Mixin';
import GdbotsPbjxRequestV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import SearchSort from '@wbeme/schemas/eme/solicits/enums/SearchSort';
import T from '@gdbots/pbj/types';

export default class SearchSolicitsRequestV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:request:search-solicits-request:1-0-0', SearchSolicitsRequestV1,
      [
        Fb.create('sort', T.StringEnumType.create())
          .withDefault(SearchSort.RELEVANCE)
          .classProto(SearchSort)
          .build(),
      ],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxRequestV1Mixin.create(),
        GdbotsNcrSearchNodesRequestV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxRequestV1Trait(SearchSolicitsRequestV1);
MessageResolver.register('eme:solicits:request:search-solicits-request', SearchSolicitsRequestV1);
Object.freeze(SearchSolicitsRequestV1);
Object.freeze(SearchSolicitsRequestV1.prototype);
