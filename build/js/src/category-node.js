/**
 * DO NOT EDIT THIS FILE as it will be overwritten by the Pbj compiler.
 * @link https://github.com/gdbots/pbjc-php
 *
 * Registers all of the pbj schemas with the MessageResolver.
 *
 * @link http://schemas.wbeme.com/
 */

import MessageResolver from '@gdbots/pbj/MessageResolver';
import '@wbeme/schemas/eme/accounts/node/AccountV1';
import '@wbeme/schemas/eme/solicits/node/SolicitV1';
import '@wbeme/schemas/eme/users/node/UserV1';

export default MessageResolver;