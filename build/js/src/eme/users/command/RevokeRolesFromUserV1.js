// @link http://schemas.wbeme.com/json-schema/eme/users/command/revoke-roles-from-user/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxCommandV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Mixin';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';
import UserId from '@wbeme/schemas/eme/users/UserId';

export default class RevokeRolesFromUserV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:users:command:revoke-roles-from-user:1-0-0', RevokeRolesFromUserV1,
      [
        Fb.create('user_id', T.IdentifierType.create())
          .required()
          .classProto(UserId)
          .build(),
        /*
         * The roles to revoke from the user.
         */
        Fb.create('roles', T.StringType.create())
          .asASet()
          .pattern('^[\\w_]+$')
          .build(),
      ],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxCommandV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxCommandV1Trait(RevokeRolesFromUserV1);
MessageResolver.register('eme:users:command:revoke-roles-from-user', RevokeRolesFromUserV1);
Object.freeze(RevokeRolesFromUserV1);
Object.freeze(RevokeRolesFromUserV1.prototype);
