// @link http://schemas.wbeme.com/json-schema/eme/solicits/event/note-added-to-submission/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsPbjxEventV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Mixin';
import GdbotsPbjxEventV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Trait';
import GdbotsPbjxIndexedV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/indexed/IndexedV1Mixin';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class NoteAddedToSubmissionV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:event:note-added-to-submission:1-0-0', NoteAddedToSubmissionV1,
      [
        Fb.create('submission_id', T.TimeUuidType.create())
          .required()
          .build(),
        Fb.create('note', T.TextType.create())
          .build(),
        Fb.create('hashtags_added', T.StringType.create())
          .asASet()
          .format(Format.HASHTAG)
          .build(),
        Fb.create('hashtags_removed', T.StringType.create())
          .asASet()
          .format(Format.HASHTAG)
          .build(),
      ],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxEventV1Mixin.create(),
        GdbotsPbjxIndexedV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxEventV1Trait(NoteAddedToSubmissionV1);
MessageResolver.register('eme:solicits:event:note-added-to-submission', NoteAddedToSubmissionV1);
Object.freeze(NoteAddedToSubmissionV1);
Object.freeze(NoteAddedToSubmissionV1.prototype);
