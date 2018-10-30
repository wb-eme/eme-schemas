// @link http://schemas.wbeme.com/json-schema/eme/solicits/search-filter/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Message from '@gdbots/pbj/Message';
import MessageRef from '@gdbots/pbj/MessageRef';
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
        Fb.create('bool_vals', T.BooleanType.create())
          .asAList()
          .build(),
        Fb.create('date_vals', T.DateType.create())
          .asAList()
          .build(),
        Fb.create('int_vals', T.IntType.create())
          .asAList()
          .build(),
        Fb.create('string_vals', T.StringType.create())
          .asAList()
          .build(),
      ],
    );
  }

  /**
   * @param {?string} tag
   * @returns {MessageRef}
   */
  generateMessageRef(tag = null) {
    return new MessageRef(this.schema().getCurie(), this.get('name'), tag);
  }
  
  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return {
      name: this.get('name'),
    };
  }
}

MessageResolver.register('eme:solicits::search-filter', SearchFilterV1);
Object.freeze(SearchFilterV1);
Object.freeze(SearchFilterV1.prototype);
