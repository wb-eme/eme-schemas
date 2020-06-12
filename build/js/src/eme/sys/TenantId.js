import AssertionFailed from '@gdbots/pbj/exceptions/AssertionFailed';
import Identifier from '@gdbots/pbj/well-known/Identifier';

export default class TenantId extends Identifier {
  /**
   * @param {string} value
   */
  constructor(value) {
    super(value);

    if (!/^[A-Za-z0-9]+$/.test(this.value)) {
      throw new AssertionFailed(`Value "${this.value}" is not a valid TenantId.`);
    }

    Object.freeze(this);
  }
}
