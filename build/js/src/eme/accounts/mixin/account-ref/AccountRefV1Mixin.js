// @link http://schemas.wbeme.com/json-schema/eme/accounts/mixin/account-ref/1-0-0.json#
import AccountId from '@wbeme/schemas/eme/accounts/AccountId';
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class AccountRefV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:eme:accounts:mixin:account-ref:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      /*
       * The EME account that this message is associated with.
       */
      Fb.create('account_id', T.IdentifierType.create())
        .classProto(AccountId)
        .build(),
    ];
  }
}
