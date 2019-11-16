// @link http://schemas.wbeme.com/json-schema/eme/solicits/command/block-submissions/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsPbjxCommandV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Mixin';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class BlockSubmissionsV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:command:block-submissions:1-0-0', BlockSubmissionsV1,
      [
        Fb.create('email', T.StringType.create())
          .build(),
        Fb.create('ipv4', T.StringType.create())
          .format(Format.IPV4)
          .build(),
      ],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxCommandV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxCommandV1Trait(BlockSubmissionsV1);
MessageResolver.register('eme:solicits:command:block-submissions', BlockSubmissionsV1);
Object.freeze(BlockSubmissionsV1);
Object.freeze(BlockSubmissionsV1.prototype);
