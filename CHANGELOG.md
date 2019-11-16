# CHANGELOG


## v0.2.4
* __Add Schemas:__
  * `eme:solicits::search-filter`
  * `eme:solicits:command:block-submissions`
  * `eme:solicits:command:export-submissions`
  * `eme:solicits:command:process-irr`
  * `eme:solicits:command:restore-submission`
  * `eme:solicits:event:submission-restored`
  * `eme:solicits:event:submissions-blocked`
  * `eme:solicits:search-filter-operator`
* __Modify Schemas:__ left versions as is (still in beta)
  * `eme:solicits:request:search-submissions-request`
    * Add `cf_filters` message field list.
  * `eme:solicits:node:solicit`
    * Add `cc_email` string field with format email.


## v0.2.3
* Use gdbots/schemas v1.5.4.
* __Modify Schemas:__ left versions as is (still in beta)
  * `eme:solicits:command:add-note-to-submission`
    * Add `interview_id` identifier field.
  * `eme:solicits:event:note-added-to-submission`
    * Add `interview_id` identifier field.
  * `eme:solicits:event:submission-received`
    * Add `interview_id` identifier field.


## v0.2.2
* __Add Schemas:__
  * `eme:solicits:command:purge-submission`


## v0.2.1
* __Modify Schemas:__ left versions as is (still in beta)
  * `eme:solicits:command:reject-submission`
    * Add `hashtags` string set field with format hashtag.
  * `eme:solicits:event:submission-rejected`
    * Add `hashtags` string set field with format hashtag.


## v0.2.0
* Eliminate use of `gdbots:forms:mixin:*` ncr crud schemas.
* Upgrade to `"gdbots/schemas": "1.5.0"`.
* __Add Schemas:__
  * `eme:solicits:request:search-notes-request`
  * `eme:solicits:request:search-notes-response`
* __Modify Schemas:__ left versions as is (still in beta)
  * `eme:solicits:command:import-submission`
    * Add `sexual_orientation` string-enum field using `gdbots:common:sexual-orientation`
  * `eme:solicits:command:send-submission`
    * Add `sexual_orientation` string-enum field using `gdbots:common:sexual-orientation`
  * `eme:solicits:command:submission-received`
    * Add `sexual_orientation` string-enum field using `gdbots:common:sexual-orientation`
  * `eme:solicits:request:search-submissions-request`
    * Add `ids` time-uuid set field. 


## v0.1.5
* __Modify Schemas:__ left versions as is (still in beta)
  * `eme:solicits:command:import-solicit` 
    * Add `thank_you_url` string field.
  * `eme:solicits:command:import-submission`
    * Add `is_rejected` boolean field.


## v0.1.4
* __Modify Schemas:__ left versions as is (still in beta)
  * `eme:solicits:node:solicit`
    * Add `thank_you_url` string field.


## v0.1.3
* __Add Schemas:__
  * `eme:solicits:command:create-solicit`
  * `eme:solicits:command:delete-solicit`
  * `eme:solicits:command:import-solicit`
  * `eme:solicits:command:publish-solicit`
  * `eme:solicits:command:unpublish-solicit`
  * `eme:solicits:command:update-solicit`
  * `eme:solicits:event:solicit-created`
  * `eme:solicits:event:solicit-deleted`
  * `eme:solicits:event:solicit-published`
  * `eme:solicits:event:solicit-unpublished`
  * `eme:solicits:event:solicit-updated`
  * `eme:solicits:request:get-solicit-batch-request`
  * `eme:solicits:request:get-solicit-batch-response`
  * `eme:solicits:request:get-solicit-history-request`
  * `eme:solicits:request:get-solicit-history-response`
  * `eme:solicits:request:get-solicit-request`
  * `eme:solicits:request:get-solicit-response`
  * `eme:solicits:request:search-solicits-request`
  * `eme:solicits:request:search-solicits-response`


## v0.1.2
* __Modify Schemas:__ left versions as is (still in beta)
  * `eme:solicits:request:search-submissions-request`
    * Add `gender` int-enum field using enum `gdbots:common:gender`.


## v0.1.1
* __Modify Schemas:__ left versions as is (still in beta)
  * `eme:solicits:command:send-submission`
    * Add `height` tiny-int field for recording physical height.
  * `eme:solicits:event:submission-received`
    * Add `height` tiny-int field for recording physical height.


## v0.1.0
* __Add Schemas:__
  * `eme:accounts:mixin:account-ref`
  * `eme:accounts:node:account`
  * `eme:accounts:request:get-account-request`
  * `eme:accounts:request:get-account-response`
  * `eme:accounts:request:get-active-accounts-request`
  * `eme:accounts:request:get-active-accounts-response`
  * `eme:collector:mixin:collectable`
  * `eme:solicits:command:add-note-to-submission`
  * `eme:solicits:command:import-submission`
  * `eme:solicits:command:mark-submissions-as-read`
  * `eme:solicits:command:mark-submissions-as-unread`
  * `eme:solicits:command:reject-submission`
  * `eme:solicits:command:send-submission`
  * `eme:solicits:edge:submissions`
  * `eme:solicits:event:note-added-to-submission`
  * `eme:solicits:event:submission-marked-as-read`
  * `eme:solicits:event:submission-marked-as-unread`
  * `eme:solicits:event:submission-received`
  * `eme:solicits:event:submission-rejected`
  * `eme:solicits:node:solicit`
  * `eme:solicits:request:get-submission-history-request`
  * `eme:solicits:request:get-submission-history-response`
  * `eme:solicits:request:search-submissions-request`
  * `eme:solicits:request:search-submissions-response`
  * `eme:users:command:create-user`
  * `eme:users:command:delete-user`
  * `eme:users:command:grant-roles-to-user`
  * `eme:users:command:import-user`
  * `eme:users:command:revoke-roles-from-user`
  * `eme:users:command:update-user`
  * `eme:users:event:user-created`
  * `eme:users:event:user-deleted`
  * `eme:users:event:user-roles-granted`
  * `eme:users:event:user-roles-revoked`
  * `eme:users:event:user-updated`
  * `eme:users:node:user`
  * `eme:users:request:get-user-batch-request`
  * `eme:users:request:get-user-batch-response`
  * `eme:users:request:get-user-history-request`
  * `eme:users:request:get-user-history-response`
  * `eme:users:request:get-user-request`
  * `eme:users:request:get-user-response`
  * `eme:users:request:search-users-request`
  * `eme:users:request:search-users-response`
  * `eme:users:search-sort`
