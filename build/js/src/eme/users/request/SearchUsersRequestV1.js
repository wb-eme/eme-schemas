// @link http://schemas.wbeme.com/json-schema/eme/users/request/search-users-request/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsNcrSearchNodesRequestV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/search-nodes-request/SearchNodesRequestV1Mixin';
import GdbotsPbjxRequestV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Mixin';
import GdbotsPbjxRequestV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import SearchSort from '@wbeme/schemas/eme/users/enums/SearchSort';
import T from '@gdbots/pbj/types';

export default class SearchUsersRequestV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:users:request:search-users-request:1-0-0', SearchUsersRequestV1,
      [
        Fb.create('sort', T.StringEnumType.create())
          .withDefault(SearchSort.RELEVANCE)
          .classProto(SearchSort)
          .build(),
        Fb.create('is_staff', T.TrinaryType.create())
          .build(),
        Fb.create('is_blocked', T.TrinaryType.create())
          .withDefault(2)
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

GdbotsPbjxRequestV1Trait(SearchUsersRequestV1);
MessageResolver.register('eme:users:request:search-users-request', SearchUsersRequestV1);
Object.freeze(SearchUsersRequestV1);
Object.freeze(SearchUsersRequestV1.prototype);
