import Enum from '@gdbots/common/Enum';

export default class SearchSort extends Enum {
}

SearchSort.configure({
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
}, 'eme:users:search-sort');
