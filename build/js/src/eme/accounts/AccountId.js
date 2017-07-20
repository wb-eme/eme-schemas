import AssertionFailed from '@gdbots/pbj/exceptions/AssertionFailed';
import Identifier from '@gdbots/pbj/well-known/Identifier';
import NodeRef from '@gdbots/schemas/gdbots/ncr/NodeRef';

export default class AccountId extends Identifier {
  /**
   * @param {string} value
   */
  constructor(value) {
    super(value);

    if (!/^[A-Za-z0-9]+$/.test(this.value)) {
      throw new AssertionFailed(`Value "${this.value}" is not a valid AccountId.`);
    }

    Object.freeze(this);
  }

  /**
   * @returns {NodeRef}
   */
  toNodeRef() {
    return NodeRef.fromString(`eme:account:${this.value}`);
  }
}
