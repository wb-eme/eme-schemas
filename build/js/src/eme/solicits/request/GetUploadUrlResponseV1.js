// @link http://schemas.wbeme.com/json-schema/eme/solicits/request/get-upload-url-response/1-0-0.json#
import GdbotsFormsGetUploadUrlResponseV1Mixin from '@gdbots/schemas/gdbots/forms/mixin/get-upload-url-response/GetUploadUrlResponseV1Mixin';
import GdbotsPbjxResponseV1Mixin from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Mixin';
import GdbotsPbjxResponseV1Trait from '@gdbots/schemas/gdbots/pbjx/mixin/response/ResponseV1Trait';
import Message from '@gdbots/pbj/Message';
import MessageResolver from '@gdbots/pbj/MessageResolver';
import Schema from '@gdbots/pbj/Schema';

export default class GetUploadUrlResponseV1 extends Message {
  /**
   * @private
   *
   * @returns {Schema}
   */
  static defineSchema() {
    return new Schema('pbj:eme:solicits:request:get-upload-url-response:1-0-0', GetUploadUrlResponseV1,
      [],
      [
        GdbotsPbjxResponseV1Mixin.create(),
        GdbotsFormsGetUploadUrlResponseV1Mixin.create(),
      ],
    );
  }
}

GdbotsPbjxResponseV1Trait(GetUploadUrlResponseV1);
MessageResolver.register('eme:solicits:request:get-upload-url-response', GetUploadUrlResponseV1);
Object.freeze(GetUploadUrlResponseV1);
Object.freeze(GetUploadUrlResponseV1.prototype);
