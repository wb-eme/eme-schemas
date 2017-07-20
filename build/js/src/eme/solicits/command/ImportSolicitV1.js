// @link http://schemas.wbeme.com/json-schema/eme/solicits/command/import-solicit/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsCommonTaggableV1Mixin from '@gdbots/schemas/gdbots/common/mixin/taggable/TaggableV1Mixin';
import GdbotsPbjxCommandV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Mixin';
import GdbotsPbjxCommandV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/command/CommandV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import SolicitId from '@wbeme/schemas/eme/solicits/SolicitId';
import T from '@gdbots/pbj/types';

export default class ImportSolicitV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:command:import-solicit:1-0-0', ImportSolicitV1,
      [
        Fb.create('solicit_id', T.IdentifierType.create())
          .classProto(SolicitId)
          .build(),
        Fb.create('title', T.StringType.create())
          .build(),
        /*
         * A short description (a few sentences) about this solicit. This field should
         * not have html as it is used in metadata.
         */
        Fb.create('description', T.TextType.create())
          .build(),
        Fb.create('hashtags', T.StringType.create())
          .asASet()
          .format(Format.HASHTAG)
          .build(),
        Fb.create('story_enabled', T.BooleanType.create())
          .withDefault(true)
          .build(),
        Fb.create('story_label', T.StringType.create())
          .build(),
        Fb.create('is_active', T.BooleanType.create())
          .build(),
        Fb.create('created_at', T.MicrotimeType.create())
          .useTypeDefault(false)
          .build(),
      ],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxCommandV1Mixin.create(),
        GdbotsCommonTaggableV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxCommandV1Trait(ImportSolicitV1);
MessageResolver.register('eme:solicits:command:import-solicit', ImportSolicitV1);
Object.freeze(ImportSolicitV1);
Object.freeze(ImportSolicitV1.prototype);
