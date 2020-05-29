// @link http://schemas.wbeme.com/json-schema/eme/iam/node/user/1-0-0.json#
import GdbotsIamUserV1Trait from '@gdbots/schemas/gdbots/iam/mixin/user/UserV1Trait';
import GdbotsNcrNodeV1Trait from '@gdbots/schemas/gdbots/ncr/mixin/node/NodeV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class UserV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:iam:node:user:1-0-0', UserV1,
      [],
      [
        EmeSysTenantIdV1Mixin.create(),
        GdbotsNcrNodeV1Mixin.create(),
        GdbotsIamUserV1Mixin.create(),
        GdbotsCommonTaggableV1Mixin.create(),
      ],
    );
  }
}

GdbotsNcrNodeV1Trait(UserV1);
GdbotsIamUserV1Trait(UserV1);
MessageResolver.register('eme:iam:node:user', UserV1);
Object.freeze(UserV1);
Object.freeze(UserV1.prototype);
