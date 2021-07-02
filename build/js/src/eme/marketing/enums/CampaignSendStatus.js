import Enum from '@gdbots/pbj/Enum';

export default class CampaignSendStatus extends Enum {
}

CampaignSendStatus.configure({
  UNKNOWN: 'unknown',
  DRAFT: 'draft',
  SCHEDULED: 'scheduled',
  SENDING: 'sending',
  SENT: 'sent',
  CANCELED: 'canceled',
  PAUSED: 'paused',
  FAILED: 'failed',
}, 'eme:marketing:campaign-send-status');
