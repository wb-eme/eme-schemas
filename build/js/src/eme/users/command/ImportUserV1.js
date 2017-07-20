// @link http://schemas.wbeme.com/json-schema/eme/users/command/import-user/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsCommonTaggableV1Mixin from '@gdbots/schemas/gdbots/common/mixin/taggable/TaggableV1Mixin';
import GdbotsPbjxCommandV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Mixin';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';
import UserId from '@wbeme/schemas/eme/users/UserId';

export default class ImportUserV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:users:command:import-user:1-0-0', ImportUserV1,
      [
        Fb.create('user_id', T.IdentifierType.create())
          .classProto(UserId)
          .build(),
        Fb.create('first_name', T.StringType.create())
          .build(),
        Fb.create('last_name', T.StringType.create())
          .build(),
        Fb.create('email', T.StringType.create())
          .required()
          .format(Format.EMAIL)
          .build(),
        Fb.create('is_staff', T.BooleanType.create())
          .build(),
        Fb.create('is_active', T.BooleanType.create())
          .build(),
        Fb.create('created_at', T.MicrotimeType.create())
          .useTypeDefault(false)
          .build(),
      ],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxCommandV1Mixin.create(),
        GdbotsCommonTaggableV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxCommandV1Trait(ImportUserV1);
MessageResolver.register('eme:users:command:import-user', ImportUserV1);
Object.freeze(ImportUserV1);
Object.freeze(ImportUserV1.prototype);
