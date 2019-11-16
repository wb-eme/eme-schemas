// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/get-upload-url-request/1-0-0.json#
import EmeAccountsAccountRefV1Mixin from '@wbeme/schemas/eme/accounts/mixin/account-ref/AccountRefV1Mixin';
import GdbotsFormsGetUploadUrlRequestV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/get-upload-url-request/GetUploadUrlRequestV1Mixin';
import GdbotsPbjxRequestV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Mixin';
import GdbotsPbjxRequestV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/request/RequestV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class GetUploadUrlRequestV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:request:get-upload-url-request:1-0-0', GetUploadUrlRequestV1,
      [],
      [
        EmeAccountsAccountRefV1Mixin.create(),
        GdbotsPbjxRequestV1Mixin.create(),
        GdbotsFormsGetUploadUrlRequestV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxRequestV1Trait(GetUploadUrlRequestV1);
MessageResolver.register('eme:solicits:request:get-upload-url-request', GetUploadUrlRequestV1);
Object.freeze(GetUploadUrlRequestV1);
Object.freeze(GetUploadUrlRequestV1.prototype);
