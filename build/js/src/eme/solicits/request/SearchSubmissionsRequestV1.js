// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/search-submissions-request/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsAnalyticsTrackedMessageV1Mixin from '@gdbots/schemas/gdbots/analytics/mixin/tracked-message/TrackedMessageV1Mixin';
import GdbotsPbjxRequestV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Mixin';
import GdbotsPbjxRequestV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Trait';
import GdbotsPbjxSearchEventsRequestV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/search-events-request/SearchEventsRequestV1Mixin';
import Gender from '@gdbots/schemas/gdbots/common/enums/Gender';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import SolicitId from '@wbeme/schemas/eme/solicits/SolicitId';
import T from '@gdbots/pbj/types';

export default class SearchSubmissionsRequestV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:request:search-submissions-request:1-0-0', SearchSubmissionsRequestV1,
      [
        Fb.create('ids', T.TimeUuidType.create())
          .asASet()
          .build(),
        Fb.create('solicit_id', T.IdentifierType.create())
          .classProto(SolicitId)
          .build(),
        Fb.create('first_name', T.StringType.create())
          .build(),
        Fb.create('last_name', T.StringType.create())
          .build(),
        Fb.create('email', T.StringType.create())
          .format(Format.EMAIL)
          .build(),
        Fb.create('email_domain', T.StringType.create())
          .format(Format.HOSTNAME)
          .build(),
        Fb.create('address', T.MessageType.create())
          .anyOfCuries([
            'gdbots:geo::address',
          ])
          .build(),
        Fb.create('age_min', T.TinyIntType.create())
          .max(120)
          .build(),
        Fb.create('age_max', T.TinyIntType.create())
          .max(120)
          .build(),
        Fb.create('height_min', T.TinyIntType.create())
          .max(120)
          .build(),
        Fb.create('height_max', T.TinyIntType.create())
          .max(120)
          .build(),
        Fb.create('gender', T.IntEnumType.create())
          .classProto(Gender)
          .build(),
        Fb.create('has_notes', T.TrinaryType.create())
          .build(),
        Fb.create('is_blocked', T.TrinaryType.create())
          .build(),
        Fb.create('is_read', T.TrinaryType.create())
          .build(),
        Fb.create('last_read_after', T.DateTimeType.create())
          .build(),
        Fb.create('last_read_before', T.DateTimeType.create())
          .build(),
        Fb.create('last_read_by_ref', T.MessageRefType.create())
          .build(),
        Fb.create('is_verified', T.TrinaryType.create())
          .build(),
        Fb.create('is_rejected', T.TrinaryType.create())
          .build(),
      ],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxRequestV1Mixin.create(),
        GdbotsPbjxSearchEventsRequestV1Mixin.create(),
        GdbotsAnalyticsTrackedMessageV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxRequestV1Trait(SearchSubmissionsRequestV1);
MessageResolver.register('eme:solicits:request:search-submissions-request', SearchSubmissionsRequestV1);
Object.freeze(SearchSubmissionsRequestV1);
Object.freeze(SearchSubmissionsRequestV1.prototype);
