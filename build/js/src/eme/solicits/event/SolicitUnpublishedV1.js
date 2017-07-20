// @link http://schemas.wbeme.com/json-schema/eme/solicits/event/solicit-unpublished/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import Fb from '@gdbots/pbj/FieldBuilder';
import GdbotsPbjxEventV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Mixin';
import GdbotsPbjxEventV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';

export default class SolicitUnpublishedV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:event:solicit-unpublished:1-0-0', SolicitUnpublishedV1,
      [
        Fb.create('solicit_id', T.IdentifierType.create())
          .required()
          .build(),
      ],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxEventV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxEventV1Trait(SolicitUnpublishedV1);
MessageResolver.register('eme:solicits:event:solicit-unpublished', SolicitUnpublishedV1);
Object.freeze(SolicitUnpublishedV1);
Object.freeze(SolicitUnpublishedV1.prototype);
