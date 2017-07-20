import UuidIdentifier from '@gdbots/pbj/well-known/UuidIdentifier';
import NodeRef from '@gdbots/schemas/gdbots/ncr/NodeRef';

export default class UserId extends UuidIdentifier {
  /**
   * @returns {NodeRef}
   */
  toNodeRef() {
    return NodeRef.fromString(`eme:user:${this.value}`);
  }
}
