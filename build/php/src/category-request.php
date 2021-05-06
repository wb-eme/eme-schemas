<?php
/**
 * DO NOT EDIT THIS FILE as it will be overwritten by the Pbj compiler.
 * @link https://github.com/gdbots/pbjc-php
 *
 * Registers all of the pbj schemas with the MessageResolver.
 *
 * @link http://schemas.wbeme.com/
 */

\Gdbots\Pbj\MessageResolver::registerMap([
    'eme:accounts:request:get-account-request' => 'Eme\Schemas\Accounts\Request\GetAccountRequestV1',
    'eme:accounts:request:get-account-response' => 'Eme\Schemas\Accounts\Request\GetAccountResponseV1',
    'eme:accounts:request:get-active-accounts-request' => 'Eme\Schemas\Accounts\Request\GetActiveAccountsRequestV1',
    'eme:accounts:request:get-active-accounts-response' => 'Eme\Schemas\Accounts\Request\GetActiveAccountsResponseV1',
    'eme:solicits:request:get-solicit-batch-request' => 'Eme\Schemas\Solicits\Request\GetSolicitBatchRequestV1',
    'eme:solicits:request:get-solicit-batch-response' => 'Eme\Schemas\Solicits\Request\GetSolicitBatchResponseV1',
    'eme:solicits:request:get-solicit-history-request' => 'Eme\Schemas\Solicits\Request\GetSolicitHistoryRequestV1',
    'eme:solicits:request:get-solicit-history-response' => 'Eme\Schemas\Solicits\Request\GetSolicitHistoryResponseV1',
    'eme:solicits:request:get-solicit-request' => 'Eme\Schemas\Solicits\Request\GetSolicitRequestV1',
    'eme:solicits:request:get-solicit-response' => 'Eme\Schemas\Solicits\Request\GetSolicitResponseV1',
    'eme:solicits:request:get-submission-history-request' => 'Eme\Schemas\Solicits\Request\GetSubmissionHistoryRequestV1',
    'eme:solicits:request:get-submission-history-response' => 'Eme\Schemas\Solicits\Request\GetSubmissionHistoryResponseV1',
    'eme:solicits:request:search-notes-request' => 'Eme\Schemas\Solicits\Request\SearchNotesRequestV1',
    'eme:solicits:request:search-notes-response' => 'Eme\Schemas\Solicits\Request\SearchNotesResponseV1',
    'eme:solicits:request:search-solicits-request' => 'Eme\Schemas\Solicits\Request\SearchSolicitsRequestV1',
    'eme:solicits:request:search-solicits-response' => 'Eme\Schemas\Solicits\Request\SearchSolicitsResponseV1',
    'eme:solicits:request:search-submissions-request' => 'Eme\Schemas\Solicits\Request\SearchSubmissionsRequestV1',
    'eme:solicits:request:search-submissions-response' => 'Eme\Schemas\Solicits\Request\SearchSubmissionsResponseV1',
    'eme:users:request:get-user-batch-request' => 'Eme\Schemas\Users\Request\GetUserBatchRequestV1',
    'eme:users:request:get-user-batch-response' => 'Eme\Schemas\Users\Request\GetUserBatchResponseV1',
    'eme:users:request:get-user-history-request' => 'Eme\Schemas\Users\Request\GetUserHistoryRequestV1',
    'eme:users:request:get-user-history-response' => 'Eme\Schemas\Users\Request\GetUserHistoryResponseV1',
    'eme:users:request:get-user-request' => 'Eme\Schemas\Users\Request\GetUserRequestV1',
    'eme:users:request:get-user-response' => 'Eme\Schemas\Users\Request\GetUserResponseV1',
    'eme:users:request:search-users-request' => 'Eme\Schemas\Users\Request\SearchUsersRequestV1',
    'eme:users:request:search-users-response' => 'Eme\Schemas\Users\Request\SearchUsersResponseV1',
    'gdbots:ncr:request:get-node-batch-request' => 'Gdbots\Schemas\Ncr\Request\GetNodeBatchRequestV1',
    'gdbots:ncr:request:get-node-batch-response' => 'Gdbots\Schemas\Ncr\Request\GetNodeBatchResponseV1',
    'gdbots:pbjx:request:echo-request' => 'Gdbots\Schemas\Pbjx\Request\EchoRequestV1',
    'gdbots:pbjx:request:echo-response' => 'Gdbots\Schemas\Pbjx\Request\EchoResponseV1',
    'gdbots:pbjx:request:request-failed-response' => 'Gdbots\Schemas\Pbjx\Request\RequestFailedResponseV1',
]);