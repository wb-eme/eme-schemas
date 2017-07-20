// @link http://schemas.wbeme.com/json-schema/eme/solicits/edge/submissions/1-0-0.json#
import EdgeMultiplicity from '@gdbots/schemas/gdbots/ncr/enums/EdgeMultiplicity';
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsNcrEdgeV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/edge/EdgeV1Mixin';
import GdbotsNcrEdgeV1Trait from '@gdbots/schemas/gdbots/ncr/mixin/edge/EdgeV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class SubmissionsV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:edge:submissions:1-0-0', SubmissionsV1,
      [
        Fb.create('multiplicity', T.StringEnumType.create())
          .withDefault(EdgeMultiplicity.ONE2MANY)
          .classProto(EdgeMultiplicity)
          .build(),
      ],
      [
        GdbotsNcrEdgeV1Mixin.create(),
      ],
    );
  }
}

GdbotsNcrEdgeV1Trait(SubmissionsV1);
MessageResolver.register('eme:solicits:edge:submissions', SubmissionsV1);
Object.freeze(SubmissionsV1);
Object.freeze(SubmissionsV1.prototype);
