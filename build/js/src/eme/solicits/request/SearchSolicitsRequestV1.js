// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/search-solicits-request/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import GdbotsFormsSearchFormsRequestV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/search-forms-request/SearchFormsRequestV1Mixin';
import GdbotsPbjxRequestV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Mixin';
import GdbotsPbjxRequestV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class SearchSolicitsRequestV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:request:search-solicits-request:1-0-0', SearchSolicitsRequestV1,
      [],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxRequestV1Mixin.create(),
        GdbotsFormsSearchFormsRequestV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxRequestV1Trait(SearchSolicitsRequestV1);
MessageResolver.register('eme:solicits:request:search-solicits-request', SearchSolicitsRequestV1);
Object.freeze(SearchSolicitsRequestV1);
Object.freeze(SearchSolicitsRequestV1.prototype);
