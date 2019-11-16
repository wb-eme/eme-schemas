// @link http://schemas.wbeme.com/json-schema/eme/solicits/event/submissions-blocked/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsPbjxEventV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Mixin';
import GdbotsPbjxEventV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class SubmissionsBlockedV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:event:submissions-blocked:1-0-0', SubmissionsBlockedV1,
      [
        Fb.create('email', T.StringType.create())
          .build(),
        Fb.create('ipv4', T.StringType.create())
          .format(Format.IPV4)
          .build(),
      ],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxEventV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxEventV1Trait(SubmissionsBlockedV1);
MessageResolver.register('eme:solicits:event:submissions-blocked', SubmissionsBlockedV1);
Object.freeze(SubmissionsBlockedV1);
Object.freeze(SubmissionsBlockedV1.prototype);
