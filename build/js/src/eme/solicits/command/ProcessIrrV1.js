// @link http://schemas.wbeme.com/json-schema/eme/solicits/command/process-irr/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsFormsProcessIrrV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/process-irr/ProcessIrrV1Mixin';
import GdbotsPbjxCommandV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Mixin';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class ProcessIrrV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:command:process-irr:1-0-0', ProcessIrrV1,
      [
        Fb.create('wb_subject_request_id', T.UuidType.create())
          .build(),
        Fb.create('wb_status_callback_uri', T.TextType.create())
          .format(Format.URL)
          .build(),
        Fb.create('wb_fulfillment_callback_uri', T.TextType.create())
          .format(Format.URL)
          .build(),
        Fb.create('onetrust_subtask_id', T.UuidType.create())
          .build(),
      ],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxCommandV1Mixin.create(),
        GdbotsFormsProcessIrrV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxCommandV1Trait(ProcessIrrV1);
MessageResolver.register('eme:solicits:command:process-irr', ProcessIrrV1);
Object.freeze(ProcessIrrV1);
Object.freeze(ProcessIrrV1.prototype);
