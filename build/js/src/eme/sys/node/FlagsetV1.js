// @link http://schemas.wbeme.com/json-schema/eme/sys/node/flagset/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import FlagsetId from '@wbeme/schemas/eme/sys/FlagsetId';
import GdbotsNcrNodeV1Trait from '@gdbots/schemas/gdbots/ncr/mixin/node/NodeV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class FlagsetV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:sys:node:flagset:1-0-0', FlagsetV1,
      [
        Fb.create('_id', T.IdentifierType.create())
          .required()
          .classProto(FlagsetId)
          .build(),
        Fb.create('booleans', T.BooleanType.create())
          .asAMap()
          .build(),
        Fb.create('floats', T.FloatType.create())
          .asAMap()
          .build(),
        Fb.create('ints', T.IntType.create())
          .asAMap()
          .build(),
        Fb.create('strings', T.StringType.create())
          .asAMap()
          .build(),
        Fb.create('trinaries', T.TrinaryType.create())
          .asAMap()
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

GdbotsNcrNodeV1Trait(FlagsetV1);
MessageResolver.register('eme:sys:node:flagset', FlagsetV1);
Object.freeze(FlagsetV1);
Object.freeze(FlagsetV1.prototype);
