// @link http://schemas.wbeme.com/json-schema/eme/common/search-filter/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Message from '@gdbots/pbj/Message';
import MessageRef from '@gdbots/pbj/well-known/MessageRef';
import Schema from '@gdbots/pbj/Schema';
import SearchFilterOperator from '@wbeme/schemas/eme/common/enums/SearchFilterOperator';
import T from '@gdbots/pbj/types';

export default class SearchFilterV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema(this.SCHEMA_ID, this,
      [
        Fb.create(this.NAME_FIELD, T.StringType.create())
          .required()
          .maxLength(127)
          .pattern('^[a-zA-Z_]{1}[\\w-]*$')
          .build(),
        Fb.create(this.OPERATOR_FIELD, T.StringEnumType.create())
          .withDefault(SearchFilterOperator.EQUAL_TO)
          .classProto(SearchFilterOperator)
          .build(),
        Fb.create(this.BOOL_VALS_FIELD, T.BooleanType.create())
          .asAList()
          .build(),
        Fb.create(this.DATE_VALS_FIELD, T.DateType.create())
          .asAList()
          .build(),
        Fb.create(this.INT_VALS_FIELD, T.IntType.create())
          .asAList()
          .build(),
        Fb.create(this.STRING_VALS_FIELD, T.StringType.create())
          .asAList()
          .build(),
      ],
      this.MIXINS,
    );
  }

  /**
   * @param {?string} tag
   * @returns {MessageRef}
   */
  generateMessageRef(tag = null) {
    return new MessageRef(this.schema().getCurie(), this.get(this.NAME_FIELD), tag);
  }
  
  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return {
      name: this.get(this.NAME_FIELD),
    };
  }
}

const M = SearchFilterV1;
M.prototype.SCHEMA_ID = M.SCHEMA_ID = 'pbj:eme:common::search-filter:1-0-0';
M.prototype.SCHEMA_CURIE = M.SCHEMA_CURIE = 'eme:common::search-filter';
M.prototype.SCHEMA_CURIE_MAJOR = M.SCHEMA_CURIE_MAJOR = 'eme:common::search-filter:v1';

M.prototype.MIXINS = M.MIXINS = [];

M.prototype.NAME_FIELD = M.NAME_FIELD = 'name';
M.prototype.OPERATOR_FIELD = M.OPERATOR_FIELD = 'operator';
M.prototype.BOOL_VALS_FIELD = M.BOOL_VALS_FIELD = 'bool_vals';
M.prototype.DATE_VALS_FIELD = M.DATE_VALS_FIELD = 'date_vals';
M.prototype.INT_VALS_FIELD = M.INT_VALS_FIELD = 'int_vals';
M.prototype.STRING_VALS_FIELD = M.STRING_VALS_FIELD = 'string_vals';

M.prototype.FIELDS = M.FIELDS = [
  M.NAME_FIELD,
  M.OPERATOR_FIELD,
  M.BOOL_VALS_FIELD,
  M.DATE_VALS_FIELD,
  M.INT_VALS_FIELD,
  M.STRING_VALS_FIELD,
];

Object.freeze(M);
Object.freeze(M.prototype);
