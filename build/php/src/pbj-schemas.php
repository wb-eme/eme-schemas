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
    'eme:accounts:node:account' => 'Eme\Schemas\Accounts\Node\AccountV1',
    'eme:accounts:request:get-account-request' => 'Eme\Schemas\Accounts\Request\GetAccountRequestV1',
    'eme:accounts:request:get-account-response' => 'Eme\Schemas\Accounts\Request\GetAccountResponseV1',
    'eme:accounts:request:get-active-accounts-request' => 'Eme\Schemas\Accounts\Request\GetActiveAccountsRequestV1',
    'eme:accounts:request:get-active-accounts-response' => 'Eme\Schemas\Accounts\Request\GetActiveAccountsResponseV1',
    'eme:solicits::search-filter' => 'Eme\Schemas\Solicits\SearchFilterV1',
    'eme:solicits:command:add-note-to-submission' => 'Eme\Schemas\Solicits\Command\AddNoteToSubmissionV1',
    'eme:solicits:command:create-solicit' => 'Eme\Schemas\Solicits\Command\CreateSolicitV1',
    'eme:solicits:command:delete-solicit' => 'Eme\Schemas\Solicits\Command\DeleteSolicitV1',
    'eme:solicits:command:import-solicit' => 'Eme\Schemas\Solicits\Command\ImportSolicitV1',
    'eme:solicits:command:import-submission' => 'Eme\Schemas\Solicits\Command\ImportSubmissionV1',
    'eme:solicits:command:mark-submissions-as-read' => 'Eme\Schemas\Solicits\Command\MarkSubmissionsAsReadV1',
    'eme:solicits:command:mark-submissions-as-unread' => 'Eme\Schemas\Solicits\Command\MarkSubmissionsAsUnreadV1',
    'eme:solicits:command:publish-solicit' => 'Eme\Schemas\Solicits\Command\PublishSolicitV1',
    'eme:solicits:command:purge-submission' => 'Eme\Schemas\Solicits\Command\PurgeSubmissionV1',
    'eme:solicits:command:reject-submission' => 'Eme\Schemas\Solicits\Command\RejectSubmissionV1',
    'eme:solicits:command:send-submission' => 'Eme\Schemas\Solicits\Command\SendSubmissionV1',
    'eme:solicits:command:unpublish-solicit' => 'Eme\Schemas\Solicits\Command\UnpublishSolicitV1',
    'eme:solicits:command:update-solicit' => 'Eme\Schemas\Solicits\Command\UpdateSolicitV1',
    'eme:solicits:edge:submissions' => 'Eme\Schemas\Solicits\Edge\SubmissionsV1',
    'eme:solicits:event:note-added-to-submission' => 'Eme\Schemas\Solicits\Event\NoteAddedToSubmissionV1',
    'eme:solicits:event:solicit-created' => 'Eme\Schemas\Solicits\Event\SolicitCreatedV1',
    'eme:solicits:event:solicit-deleted' => 'Eme\Schemas\Solicits\Event\SolicitDeletedV1',
    'eme:solicits:event:solicit-published' => 'Eme\Schemas\Solicits\Event\SolicitPublishedV1',
    'eme:solicits:event:solicit-unpublished' => 'Eme\Schemas\Solicits\Event\SolicitUnpublishedV1',
    'eme:solicits:event:solicit-updated' => 'Eme\Schemas\Solicits\Event\SolicitUpdatedV1',
    'eme:solicits:event:submission-marked-as-read' => 'Eme\Schemas\Solicits\Event\SubmissionMarkedAsReadV1',
    'eme:solicits:event:submission-marked-as-unread' => 'Eme\Schemas\Solicits\Event\SubmissionMarkedAsUnreadV1',
    'eme:solicits:event:submission-received' => 'Eme\Schemas\Solicits\Event\SubmissionReceivedV1',
    'eme:solicits:event:submission-rejected' => 'Eme\Schemas\Solicits\Event\SubmissionRejectedV1',
    'eme:solicits:node:solicit' => 'Eme\Schemas\Solicits\Node\SolicitV1',
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
    'eme:users:command:create-user' => 'Eme\Schemas\Users\Command\CreateUserV1',
    'eme:users:command:delete-user' => 'Eme\Schemas\Users\Command\DeleteUserV1',
    'eme:users:command:grant-roles-to-user' => 'Eme\Schemas\Users\Command\GrantRolesToUserV1',
    'eme:users:command:import-user' => 'Eme\Schemas\Users\Command\ImportUserV1',
    'eme:users:command:revoke-roles-from-user' => 'Eme\Schemas\Users\Command\RevokeRolesFromUserV1',
    'eme:users:command:update-user' => 'Eme\Schemas\Users\Command\UpdateUserV1',
    'eme:users:event:user-created' => 'Eme\Schemas\Users\Event\UserCreatedV1',
    'eme:users:event:user-deleted' => 'Eme\Schemas\Users\Event\UserDeletedV1',
    'eme:users:event:user-roles-granted' => 'Eme\Schemas\Users\Event\UserRolesGrantedV1',
    'eme:users:event:user-roles-revoked' => 'Eme\Schemas\Users\Event\UserRolesRevokedV1',
    'eme:users:event:user-updated' => 'Eme\Schemas\Users\Event\UserUpdatedV1',
    'eme:users:node:user' => 'Eme\Schemas\Users\Node\UserV1',
    'eme:users:request:get-user-batch-request' => 'Eme\Schemas\Users\Request\GetUserBatchRequestV1',
    'eme:users:request:get-user-batch-response' => 'Eme\Schemas\Users\Request\GetUserBatchResponseV1',
    'eme:users:request:get-user-history-request' => 'Eme\Schemas\Users\Request\GetUserHistoryRequestV1',
    'eme:users:request:get-user-history-response' => 'Eme\Schemas\Users\Request\GetUserHistoryResponseV1',
    'eme:users:request:get-user-request' => 'Eme\Schemas\Users\Request\GetUserRequestV1',
    'eme:users:request:get-user-response' => 'Eme\Schemas\Users\Request\GetUserResponseV1',
    'eme:users:request:search-users-request' => 'Eme\Schemas\Users\Request\SearchUsersRequestV1',
    'eme:users:request:search-users-response' => 'Eme\Schemas\Users\Request\SearchUsersResponseV1',
    'gdbots:analytics:tracker:keen' => 'Gdbots\Schemas\Analytics\Tracker\KeenV1',
    'gdbots:contexts::app' => 'Gdbots\Schemas\Contexts\AppV1',
    'gdbots:contexts::cloud' => 'Gdbots\Schemas\Contexts\CloudV1',
    'gdbots:contexts::user-agent' => 'Gdbots\Schemas\Contexts\UserAgentV1',
    'gdbots:forms:field:address-field' => 'Gdbots\Schemas\Forms\Field\AddressFieldV1',
    'gdbots:forms:field:age-field' => 'Gdbots\Schemas\Forms\Field\AgeFieldV1',
    'gdbots:forms:field:country-field' => 'Gdbots\Schemas\Forms\Field\CountryFieldV1',
    'gdbots:forms:field:date-field' => 'Gdbots\Schemas\Forms\Field\DateFieldV1',
    'gdbots:forms:field:dob-field' => 'Gdbots\Schemas\Forms\Field\DobFieldV1',
    'gdbots:forms:field:email-field' => 'Gdbots\Schemas\Forms\Field\EmailFieldV1',
    'gdbots:forms:field:facebook-user-field' => 'Gdbots\Schemas\Forms\Field\FacebookUserFieldV1',
    'gdbots:forms:field:gender-field' => 'Gdbots\Schemas\Forms\Field\GenderFieldV1',
    'gdbots:forms:field:height-field' => 'Gdbots\Schemas\Forms\Field\HeightFieldV1',
    'gdbots:forms:field:instagram-user-field' => 'Gdbots\Schemas\Forms\Field\InstagramUserFieldV1',
    'gdbots:forms:field:legal-field' => 'Gdbots\Schemas\Forms\Field\LegalFieldV1',
    'gdbots:forms:field:long-text-field' => 'Gdbots\Schemas\Forms\Field\LongTextFieldV1',
    'gdbots:forms:field:number-field' => 'Gdbots\Schemas\Forms\Field\NumberFieldV1',
    'gdbots:forms:field:phone-field' => 'Gdbots\Schemas\Forms\Field\PhoneFieldV1',
    'gdbots:forms:field:photo-field' => 'Gdbots\Schemas\Forms\Field\PhotoFieldV1',
    'gdbots:forms:field:pinterest-user-field' => 'Gdbots\Schemas\Forms\Field\PinterestUserFieldV1',
    'gdbots:forms:field:select-field' => 'Gdbots\Schemas\Forms\Field\SelectFieldV1',
    'gdbots:forms:field:sexual-orientation-field' => 'Gdbots\Schemas\Forms\Field\SexualOrientationFieldV1',
    'gdbots:forms:field:short-text-field' => 'Gdbots\Schemas\Forms\Field\ShortTextFieldV1',
    'gdbots:forms:field:snapchat-user-field' => 'Gdbots\Schemas\Forms\Field\SnapchatUserFieldV1',
    'gdbots:forms:field:statement-field' => 'Gdbots\Schemas\Forms\Field\StatementFieldV1',
    'gdbots:forms:field:twitter-user-field' => 'Gdbots\Schemas\Forms\Field\TwitterUserFieldV1',
    'gdbots:forms:field:video-field' => 'Gdbots\Schemas\Forms\Field\VideoFieldV1',
    'gdbots:forms:field:website-field' => 'Gdbots\Schemas\Forms\Field\WebsiteFieldV1',
    'gdbots:forms:field:yes-no-field' => 'Gdbots\Schemas\Forms\Field\YesNoFieldV1',
    'gdbots:forms:field:youtube-user-field' => 'Gdbots\Schemas\Forms\Field\YoutubeUserFieldV1',
    'gdbots:forms:field:youtube-video-field' => 'Gdbots\Schemas\Forms\Field\YoutubeVideoFieldV1',
    'gdbots:geo::address' => 'Gdbots\Schemas\Geo\AddressV1',
    'gdbots:ncr:command:create-edge' => 'Gdbots\Schemas\Ncr\Command\CreateEdgeV1',
    'gdbots:ncr:command:delete-edge' => 'Gdbots\Schemas\Ncr\Command\DeleteEdgeV1',
    'gdbots:ncr:event:edge-created' => 'Gdbots\Schemas\Ncr\Event\EdgeCreatedV1',
    'gdbots:ncr:event:edge-deleted' => 'Gdbots\Schemas\Ncr\Event\EdgeDeletedV1',
    'gdbots:ncr:request:get-node-batch-request' => 'Gdbots\Schemas\Ncr\Request\GetNodeBatchRequestV1',
    'gdbots:ncr:request:get-node-batch-response' => 'Gdbots\Schemas\Ncr\Request\GetNodeBatchResponseV1',
    'gdbots:pbjx::envelope' => 'Gdbots\Schemas\Pbjx\EnvelopeV1',
    'gdbots:pbjx:command:check-health' => 'Gdbots\Schemas\Pbjx\Command\CheckHealthV1',
    'gdbots:pbjx:event:event-execution-failed' => 'Gdbots\Schemas\Pbjx\Event\EventExecutionFailedV1',
    'gdbots:pbjx:event:health-checked' => 'Gdbots\Schemas\Pbjx\Event\HealthCheckedV1',
    'gdbots:pbjx:request:echo-request' => 'Gdbots\Schemas\Pbjx\Request\EchoRequestV1',
    'gdbots:pbjx:request:echo-response' => 'Gdbots\Schemas\Pbjx\Request\EchoResponseV1',
    'gdbots:pbjx:request:request-failed-response' => 'Gdbots\Schemas\Pbjx\Request\RequestFailedResponseV1',
]);
