// @link http://schemas.wbeme.com/json-schema/eme/users/node/user/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import Fb from '@gdbots/pbj/FieldBuilder';
import Format from '@gdbots/pbj/enums/Format';
import GdbotsCommonTaggableV1Mixin from '@gdbots/schemas/gdbots/common/mixin/taggable/TaggableV1Mixin';
import GdbotsNcrIndexedV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/indexed/IndexedV1Mixin';
import GdbotsNcrNodeV1Mixin from '@gdbots/schemas/gdbots/ncr/mixin/node/NodeV1Mixin';
import GdbotsNcrNodeV1Trait from '@gdbots/schemas/gdbots/ncr/mixin/node/NodeV1Trait';
import Gender from '@gdbots/schemas/gdbots/common/enums/Gender';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';
import T from '@gdbots/pbj/types';
import UserId from '@wbeme/schemas/eme/users/UserId';

export default class UserV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:users:node:user:1-0-0', UserV1,
      [
        Fb.create('_id', T.IdentifierType.create())
          .required()
          .withDefault(() => UserId.generate())
          .classProto(UserId)
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
          .pattern('^\\+?[1-9]\\d{1,14}$')
          .build(),
        Fb.create('dob', T.DateType.create())
          .build(),
        Fb.create('gender', T.IntEnumType.create())
          .withDefault(Gender.UNKNOWN)
          .classProto(Gender)
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
        Fb.create('hashtags', T.StringType.create())
          .asASet()
          .format(Format.HASHTAG)
          .build(),
        Fb.create('is_blocked', T.BooleanType.create())
          .build(),
        /*
         * Indicates that the user is a staff member and has access to the dashboard.
         */
        Fb.create('is_staff', T.BooleanType.create())
          .build(),
        /*
         * A user's roles determine what permissions they'll have when using the system.
         */
        Fb.create('roles', T.StringType.create())
          .asASet()
          .pattern('^[\\w_]+$')
          .build(),
      ],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsNcrNodeV1Mixin.create(),
        GdbotsNcrIndexedV1Mixin.create(),
        GdbotsCommonTaggableV1Mixin.create(),
      ],
    );
  }

  /**
   * @returns {Object}
   */
  getUriTemplateVars() {
    return { user_id: `${this.get('_id', '')}` };
  }
}

GdbotsNcrNodeV1Trait(UserV1);
MessageResolver.register('eme:users:node:user', UserV1);
Object.freeze(UserV1);
Object.freeze(UserV1.prototype);
