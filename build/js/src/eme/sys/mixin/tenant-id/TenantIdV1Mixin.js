// @link http://schemas.wbeme.com/json-schema/eme/sys/mixin/tenant-id/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';
import TenantId from '@wbeme/schemas/eme/sys/TenantId';

export default class TenantIdV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:eme:sys:mixin:tenant-id:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      /*
       * The EME tenant that this message is associated with.
       */
      Fb.create('tenant_id', T.IdentifierType.create())
        .required()
        .classProto(TenantId)
        .build(),
    ];
  }
}
