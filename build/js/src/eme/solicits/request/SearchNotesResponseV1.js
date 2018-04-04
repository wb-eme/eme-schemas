// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/search-notes-response/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxResponseV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Mixin';
import GdbotsPbjxResponseV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Trait';
import GdbotsPbjxSearchEventsResponseV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/search-events-response/SearchEventsResponseV1Mixin';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class SearchNotesResponseV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:request:search-notes-response:1-0-0', SearchNotesResponseV1,
      [
        Fb.create('submissions', T.MessageType.create())
          .asAMap()
          .build(),
      ],
      [
        GdbotsPbjxResponseV1Mixin.create(),
        GdbotsPbjxSearchEventsResponseV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxResponseV1Trait(SearchNotesResponseV1);
MessageResolver.register('eme:solicits:request:search-notes-response', SearchNotesResponseV1);
Object.freeze(SearchNotesResponseV1);
Object.freeze(SearchNotesResponseV1.prototype);
