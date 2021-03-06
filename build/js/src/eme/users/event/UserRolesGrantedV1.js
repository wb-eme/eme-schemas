// @link http://schemas.wbeme.com/json-schema/eme/users/event/user-roles-granted/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxEventV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Mixin';
import GdbotsPbjxEventV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';
import UserId from '@wbeme/schemas/eme/users/UserId';

export default class UserRolesGrantedV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:users:event:user-roles-granted:1-0-0', UserRolesGrantedV1,
      [
        Fb.create('user_id', T.IdentifierType.create())
          .required()
          .classProto(UserId)
          .build(),
        /*
         * The roles granted to the user.
         */
        Fb.create('roles', T.StringType.create())
          .asASet()
          .pattern('^[\\w_]+$')
          .build(),
      ],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxEventV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxEventV1Trait(UserRolesGrantedV1);
MessageResolver.register('eme:users:event:user-roles-granted', UserRolesGrantedV1);
Object.freeze(UserRolesGrantedV1);
Object.freeze(UserRolesGrantedV1.prototype);
