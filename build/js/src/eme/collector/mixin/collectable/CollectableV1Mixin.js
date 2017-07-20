// @link http://schemas.wbeme.com/json-schema/eme/collector/mixin/collectable/1-0-0.json#
import Fb from '@gdbots/pbj/FieldBuilder';
import Mixin from '@gdbots/pbj/Mixin';
import SchemaId from '@gdbots/pbj/SchemaId';
import T from '@gdbots/pbj/types';

export default class CollectableV1Mixin extends Mixin {
  /**
   * @returns {SchemaId}
   */
  getId() {
    return SchemaId.fromString('pbj:eme:collector:mixin:collectable:1-0-0');
  }

  /**
   * @returns {Field[]}
   */
  getFields() {
    return [
      /*
       * The application collecting the message. This is set on the
       * server by the collector app itself.
       */
      Fb.create('collector', T.MessageType.create())
        .anyOfCuries([
          'gdbots:contexts::app',
        ])
        .build(),
    ];
  }
}
