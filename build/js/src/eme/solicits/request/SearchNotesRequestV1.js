// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/search-notes-request/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import GdbotsPbjxRequestV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Mixin';
import GdbotsPbjxRequestV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Trait';
import GdbotsPbjxSearchEventsRequestV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/search-events-request/SearchEventsRequestV1Mixin';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class SearchNotesRequestV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:request:search-notes-request:1-0-0', SearchNotesRequestV1,
      [],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxRequestV1Mixin.create(),
        GdbotsPbjxSearchEventsRequestV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxRequestV1Trait(SearchNotesRequestV1);
MessageResolver.register('eme:solicits:request:search-notes-request', SearchNotesRequestV1);
Object.freeze(SearchNotesRequestV1);
Object.freeze(SearchNotesRequestV1.prototype);
