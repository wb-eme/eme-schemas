// @link http://schemas.wbeme.com/json-schema/eme/solicits/event/submission-marked-as-read/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsAnalyticsTrackedMessageV1Mixin from '@gdbots/schemas/gdbots/analytics/mixin/tracked-message/TrackedMessageV1Mixin';
import GdbotsPbjxEventV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Mixin';
import GdbotsPbjxEventV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class SubmissionMarkedAsReadV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:event:submission-marked-as-read:1-0-0', SubmissionMarkedAsReadV1,
      [
        Fb.create('submission_id', T.TimeUuidType.create())
          .required()
          .build(),
      ],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxEventV1Mixin.create(),
        GdbotsAnalyticsTrackedMessageV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxEventV1Trait(SubmissionMarkedAsReadV1);
MessageResolver.register('eme:solicits:event:submission-marked-as-read', SubmissionMarkedAsReadV1);
Object.freeze(SubmissionMarkedAsReadV1);
Object.freeze(SubmissionMarkedAsReadV1.prototype);
