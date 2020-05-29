// @link http://schemas.wbeme.com/json-schema/eme/iam/node/role/1-0-0.json#
import GdbotsIamRoleV1Trait from '@gdbots/schemas/gdbots/iam/mixin/role/RoleV1Trait';
import GdbotsNcrNodeV1Trait from '@gdbots/schemas/gdbots/ncr/mixin/node/NodeV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class RoleV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:iam:node:role:1-0-0', RoleV1,
      [],
      [
        EmeSysTenantIdV1Mixin.create(),
        GdbotsNcrNodeV1Mixin.create(),
        GdbotsIamRoleV1Mixin.create(),
      ],
    );
  }
}

GdbotsNcrNodeV1Trait(RoleV1);
GdbotsIamRoleV1Trait(RoleV1);
MessageResolver.register('eme:iam:node:role', RoleV1);
Object.freeze(RoleV1);
Object.freeze(RoleV1.prototype);
