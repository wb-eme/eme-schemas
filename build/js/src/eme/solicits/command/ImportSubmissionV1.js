// @link http://schemas.wbeme.com/json-schema/eme/solicits/command/import-submission/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import EmeCollectorCollectableV1Mixin from '@wbeme/schemas/eme/collector/mixin/collectable/CollectableV1Mixin';
import Fb from '@gdbots/pbj/FieldBuilder';
import FileId from '@gdbots/schemas/gdbots/files/FileId';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsCommonTaggableV1Mixin from '@gdbots/schemas/gdbots/common/mixin/taggable/TaggableV1Mixin';
import GdbotsEnrichmentsTimePartingV1Mixin from '@gdbots/schemas/gdbots/enrichments/mixin/time-parting/TimePartingV1Mixin';
import GdbotsEnrichmentsTimeSamplingV1Mixin from '@gdbots/schemas/gdbots/enrichments/mixin/time-sampling/TimeSamplingV1Mixin';
import GdbotsEnrichmentsUtmV1Mixin from '@gdbots/schemas/gdbots/enrichments/mixin/utm/UtmV1Mixin';
import GdbotsPbjxCommandV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Mixin';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Gender from '@gdbots/schemas/gdbots/common/enums/Gender';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import SexualOrientation from '@gdbots/schemas/gdbots/common/enums/SexualOrientation';
import SolicitId from '@wbeme/schemas/eme/solicits/SolicitId';
import T from '@gdbots/pbj/types';

export default class ImportSubmissionV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:command:import-submission:1-0-0', ImportSubmissionV1,
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
        Fb.create('age', T.TinyIntType.create())
          .max(120)
          .build(),
        /*
         * The person's physical height recorded in inches.
         */
        Fb.create('height', T.TinyIntType.create())
          .max(120)
          .build(),
        Fb.create('gender', T.IntEnumType.create())
          .classProto(Gender)
          .build(),
        Fb.create('sexual_orientation', T.StringEnumType.create())
          .classProto(SexualOrientation)
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
         * Publisher provided identifier (PPID)
         */
        Fb.create('ppid', T.StringType.create())
          .pattern('^[\\w\\/\\.:-]+$')
          .build(),
        /*
         * Contains all of the answers submitted from the custom fields on the solicit.
         */
        Fb.create('cf', T.DynamicFieldType.create())
          .asAList()
          .build(),
        Fb.create('hashtags', T.StringType.create())
          .asASet()
          .format(Format.HASHTAG)
          .build(),
        Fb.create('is_blocked', T.BooleanType.create())
          .build(),
        Fb.create('is_read', T.BooleanType.create())
          .build(),
        Fb.create('is_rejected', T.BooleanType.create())
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
        Fb.create('verified_at', T.MicrotimeType.create())
          .useTypeDefault(false)
          .build(),
      ],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxCommandV1Mixin.create(),
        EmeCollectorCollectableV1Mixin.create(),
        GdbotsEnrichmentsTimePartingV1Mixin.create(),
        GdbotsEnrichmentsTimeSamplingV1Mixin.create(),
        GdbotsEnrichmentsUtmV1Mixin.create(),
        GdbotsCommonTaggableV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxCommandV1Trait(ImportSubmissionV1);
MessageResolver.register('eme:solicits:command:import-submission', ImportSubmissionV1);
Object.freeze(ImportSubmissionV1);
Object.freeze(ImportSubmissionV1.prototype);
