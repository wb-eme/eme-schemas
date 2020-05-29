// @link http://schemas.wbeme.com/json-schema/eme/sys/node/picklist/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsNcrNodeV1Trait from '@gdbots/schemas/gdbots/ncr/mixin/node/NodeV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import PicklistId from '@wbeme/schemas/eme/sys/PicklistId';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class PicklistV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:sys:node:picklist:1-0-0', PicklistV1,
      [
        Fb.create('_id', T.IdentifierType.create())
          .required()
          .classProto(PicklistId)
          .build(),
        Fb.create('options', T.StringType.create())
          .asAList()
          .build(),
        Fb.create('alpha_sort', T.BooleanType.create())
          .build(),
        Fb.create('allow_other', T.BooleanType.create())
          .build(),
        Fb.create('default_value', T.StringType.create())
          .build(),
      ],
      [
        EmeSysTenantIdV1Mixin.create(),
        GdbotsNcrNodeV1Mixin.create(),
      ],
    );
  }

  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return { _id: `${this.get('_id', '')}` };
  }
}

GdbotsNcrNodeV1Trait(PicklistV1);
MessageResolver.register('eme:sys:node:picklist', PicklistV1);
Object.freeze(PicklistV1);
Object.freeze(PicklistV1.prototype);
