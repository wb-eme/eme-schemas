// @link http://schemas.wbeme.com/json-schema/eme/sys/mixin/tenant-id/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';
import TenantId from '@wbeme/schemas/eme/sys/TenantId';

export default class TenantIdV1Mixin {
  /**
   * @returns {SchemaId}
   */
  static getId() {
    return SchemaId.fromString(this.SCHEMA_ID);
  }

  /**
   * @param {string} name
   * @returns {boolean}
   */
  static hasField(name) {
    return this.FIELDS.includes(name);
  }

  /**
   * @returns {Field[]}
   */
  static getFields() {
    return [
      /*
       * The EME tenant that this message is associated with.
       */
      Fb.create(this.TENANT_ID_FIELD, T.IdentifierType.create())
        .required()
        .classProto(TenantId)
        .build(),
    ];
  }
}

const M = TenantIdV1Mixin;
M.SCHEMA_ID = 'pbj:eme:sys:mixin:tenant-id:1-0-0';
M.SCHEMA_CURIE = 'eme:sys:mixin:tenant-id';
M.SCHEMA_CURIE_MAJOR = 'eme:sys:mixin:tenant-id:v1';

M.TENANT_ID_FIELD = 'tenant_id';

M.FIELDS = [
  M.TENANT_ID_FIELD,
];
