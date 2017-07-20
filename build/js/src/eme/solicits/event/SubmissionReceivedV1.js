// @link http://schemas.wbeme.com/json-schema/eme/solicits/event/submission-received/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import EmeCollectorCollectableV1Mixin from '@wbeme/schemas/eme/collector/mixin/collectable/CollectableV1Mixin';
import Fb from '@gdbots/pbj/FieldBuilder';
import FileId from '@gdbots/schemas/gdbots/files/FileId';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsAnalyticsTrackedMessageV1Mixin from '@gdbots/schemas/gdbots/analytics/mixin/tracked-message/TrackedMessageV1Mixin';
import GdbotsCommonTaggableV1Mixin from '@gdbots/schemas/gdbots/common/mixin/taggable/TaggableV1Mixin';
import GdbotsEnrichmentsIpToGeoV1Mixin from '@gdbots/schemas/gdbots/enrichments/mixin/ip-to-geo/IpToGeoV1Mixin';
import GdbotsEnrichmentsTimePartingV1Mixin from '@gdbots/schemas/gdbots/enrichments/mixin/time-parting/TimePartingV1Mixin';
import GdbotsEnrichmentsTimeSamplingV1Mixin from '@gdbots/schemas/gdbots/enrichments/mixin/time-sampling/TimeSamplingV1Mixin';
import GdbotsEnrichmentsUaParserV1Mixin from '@gdbots/schemas/gdbots/enrichments/mixin/ua-parser/UaParserV1Mixin';
import GdbotsEnrichmentsUtmV1Mixin from '@gdbots/schemas/gdbots/enrichments/mixin/utm/UtmV1Mixin';
import GdbotsPbjxEventV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Mixin';
import GdbotsPbjxEventV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/event/EventV1Trait';
import GdbotsPbjxIndexedV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/indexed/IndexedV1Mixin';
import Gender from '@gdbots/schemas/gdbots/common/enums/Gender';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import SolicitId from '@wbeme/schemas/eme/solicits/SolicitId';
import T from '@gdbots/pbj/types';

export default class SubmissionReceivedV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:event:submission-received:1-0-0', SubmissionReceivedV1,
      [
        Fb.create('solicit_id', T.IdentifierType.create())
          .required()
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
        /*
         * A general format for international telephone numbers.
         * @link https://en.wikipedia.org/wiki/E.164
         */
        Fb.create('phone', T.StringType.create())
          .asAMap()
          .maxLength(20)
          .pattern('^\\+?[1-9]\\d{1,14}$')
          .build(),
        Fb.create('dob', T.DateType.create())
          .build(),
        /*
         * The "age" is generally populated if "dob" is present by using the difference of
         * "dob" and "occurred_at" to determine the age at the time of the submission.
         */
        Fb.create('age', T.TinyIntType.create())
          .max(120)
          .build(),
        Fb.create('gender', T.IntEnumType.create())
          .withDefault(Gender.UNKNOWN)
          .classProto(Gender)
          .build(),
        Fb.create('story', T.TextType.create())
          .build(),
        Fb.create('file_ids', T.IdentifierType.create())
          .asASet()
          .classProto(FileId)
          .build(),
        /*
         * Networks is a map that contains handles/usernames on a social network.
         * E.g. facebook:homer, twitter:stackoverflow, youtube:coltrane78.
         */
        Fb.create('networks', T.StringType.create())
          .asAMap()
          .maxLength(50)
          .pattern('^[\\w\\.-]+$')
          .build(),
        /*
         * Mentions contains the usernames extracted from the "networks" map and possibly
         * parsed from other text fields. Makes it possible to search @mentions.
         */
        Fb.create('mentions', T.StringType.create())
          .asASet()
          .maxLength(50)
          .pattern('^[\\w\\.-]+$')
          .build(),
        /*
         * Publisher provided identifier (PPID)
         */
        Fb.create('ppid', T.StringType.create())
          .pattern('^[\\w\\/\\.:-]+$')
          .build(),
        Fb.create('hashtags', T.StringType.create())
          .asASet()
          .format(Format.HASHTAG)
          .build(),
        Fb.create('has_notes', T.BooleanType.create())
          .build(),
        Fb.create('is_blocked', T.BooleanType.create())
          .build(),
        Fb.create('is_read', T.BooleanType.create())
          .build(),
        Fb.create('last_read_at', T.MicrotimeType.create())
          .useTypeDefault(false)
          .build(),
        /*
         * A fully qualified reference to the user who last read this submission.
         */
        Fb.create('last_read_by_ref', T.MessageRefType.create())
          .build(),
        /*
         * If true this submission was verified to be from the associated ctx_user_ref or email.
         * Verification can be secure cookie, email confirmation, phone verification, login, etc.
         * If the submission was accepted without any kind of verification this should be false.
         */
        Fb.create('is_verified', T.BooleanType.create())
          .build(),
        Fb.create('is_rejected', T.BooleanType.create())
          .build(),
        Fb.create('verified_at', T.MicrotimeType.create())
          .useTypeDefault(false)
          .build(),
        /*
         * The percentage (whole number) of text in the "story" that is ALL CAPS.
         */
        Fb.create('allcaps', T.TinyIntType.create())
          .max(100)
          .build(),
        /*
         * The maximum number of contiguous exclamation points in the "story" text.
         */
        Fb.create('exclaims', T.TinyIntType.create())
          .build(),
        /*
         * Contains all of the answers submitted from the custom fields on the solicit.
         */
        Fb.create('cf', T.DynamicFieldType.create())
          .asAList()
          .build(),
        /*
         * "s256" means shard 256. Used to distribute read/write from storage and speed up
         * replay/reindex processes. It can also be used to distribute workload in front end
         * user interfaces or notifications (like isles in a grocery store).
         * This value should NOT change once set.
         */
        Fb.create('s256', T.TinyIntType.create())
          .build(),
        /*
         * "s32" means shard 32. See field "s256" for explanation.
         */
        Fb.create('s32', T.TinyIntType.create())
          .build(),
        /*
         * "s16" means shard 16. See field "s256" for explanation.
         */
        Fb.create('s16', T.TinyIntType.create())
          .build(),
      ],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxEventV1Mixin.create(),
        GdbotsPbjxIndexedV1Mixin.create(),
        GdbotsAnalyticsTrackedMessageV1Mixin.create(),
        EmeCollectorCollectableV1Mixin.create(),
        GdbotsEnrichmentsIpToGeoV1Mixin.create(),
        GdbotsEnrichmentsTimePartingV1Mixin.create(),
        GdbotsEnrichmentsTimeSamplingV1Mixin.create(),
        GdbotsEnrichmentsUaParserV1Mixin.create(),
        GdbotsEnrichmentsUtmV1Mixin.create(),
        GdbotsCommonTaggableV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxEventV1Trait(SubmissionReceivedV1);
MessageResolver.register('eme:solicits:event:submission-received', SubmissionReceivedV1);
Object.freeze(SubmissionReceivedV1);
Object.freeze(SubmissionReceivedV1.prototype);
