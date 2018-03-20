// @link http://schemas.wbeme.com/json-schema/eme/solicits/command/add-note-to-submission/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsPbjxCommandV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Mixin';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class AddNoteToSubmissionV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:command:add-note-to-submission:1-0-0', AddNoteToSubmissionV1,
      [
        Fb.create('submission_id', T.TimeUuidType.create())
          .required()
          .build(),
        Fb.create('note', T.TextType.create())
          .build(),
        Fb.create('hashtags_to_add', T.StringType.create())
          .asASet()
          .format(Format.HASHTAG)
          .build(),
        Fb.create('hashtags_to_remove', T.StringType.create())
          .asASet()
          .format(Format.HASHTAG)
          .build(),
        Fb.create('submissions', T.MessageType.create())
          .asAMap()
          .build(),
      ],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxCommandV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxCommandV1Trait(AddNoteToSubmissionV1);
MessageResolver.register('eme:solicits:command:add-note-to-submission', AddNoteToSubmissionV1);
Object.freeze(AddNoteToSubmissionV1);
Object.freeze(AddNoteToSubmissionV1.prototype);
