import Enum from '@gdbots/pbj/Enum';

export default class SearchProfilesSort extends Enum {
}

SearchProfilesSort.configure({
  UNKNOWN: 'unknown',
  RELEVANCE: 'relevance',
  CREATED_AT_DESC: 'created-at-desc',
  CREATED_AT_ASC: 'created-at-asc',
  UPDATED_AT_DESC: 'updated-at-desc',
  UPDATED_AT_ASC: 'updated-at-asc',
  FIRST_NAME_DESC: 'first-name-desc',
  FIRST_NAME_ASC: 'first-name-asc',
  LAST_NAME_DESC: 'last-name-desc',
  LAST_NAME_ASC: 'last-name-asc',
}, 'eme:marketing:search-profiles-sort');
