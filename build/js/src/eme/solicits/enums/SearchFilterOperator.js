import Enum from '@gdbots/common/Enum';

export default class SearchFilterOperator extends Enum {
}

SearchFilterOperator.configure({
  UNKNOWN: 'unknown',
  EQUAL_TO: 'eq',
  NOT_EQUAL_TO: 'ne',
  GREATER_THAN: 'gt',
  GREATER_THAN_OR_EQUAL_TO: 'gte',
  LESS_THAN: 'lt',
  LESS_THAN_OR_EQUAL_TO: 'lte',
  EXISTS: 'exists',
  IN: 'in',
  CONTAINS: 'contains',
  NOT_CONTAINS: 'not_contains',
}, 'eme:solicits:search-filter-operator');
