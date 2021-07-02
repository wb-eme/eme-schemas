import Enum from '@gdbots/pbj/Enum';

export default class SearchSubmissionsSort extends Enum {
}

SearchSubmissionsSort.configure({
  UNKNOWN: 'unknown',
  RELEVANCE: 'relevance',
  CREATED_AT_DESC: 'created-at-desc',
  CREATED_AT_ASC: 'created-at-asc',
  UPDATED_AT_DESC: 'updated-at-desc',
  UPDATED_AT_ASC: 'updated-at-asc',
}, 'eme:collector:search-submissions-sort');
