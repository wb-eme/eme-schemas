// @link http://schemas.wbeme.com/json-schema/eme/solicits/search-filter/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import SearchFilterOperator from '@wbeme/schemas/eme/solicits/enums/SearchFilterOperator';
import T from '@gdbots/pbj/types';

export default class SearchFilterV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits::search-filter:1-0-0', SearchFilterV1,
      [
        Fb.create('name', T.StringType.create())
          .build(),
        Fb.create('operator', T.StringEnumType.create())
          .classProto(SearchFilterOperator)
          .build(),
        /*
         * Contains a comma delimited list of values to filter by.
         */
        Fb.create('values', T.DynamicFieldType.create())
          .build(),
      ],
    );
  }
}

MessageResolver.register('eme:solicits::search-filter', SearchFilterV1);
Object.freeze(SearchFilterV1);
Object.freeze(SearchFilterV1.prototype);
