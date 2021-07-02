import Enum from '@gdbots/pbj/Enum';

export default class SearchPicklistsSort extends Enum {
}

SearchPicklistsSort.configure({
  UNKNOWN: 'unknown',
  CREATED_AT_ASC: 'created-at-asc',
  CREATED_AT_DESC: 'created-at-desc',
  UPDATED_AT_ASC: 'updated-at-asc',
  UPDATED_AT_DESC: 'updated-at-desc',
  TITLE_ASC: 'title-asc',
  TITLE_DESC: 'title-desc',
}, 'eme:sys:search-picklists-sort');
