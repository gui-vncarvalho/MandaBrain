export type SystemStatus = {
  service: 'mandabrain-web';
  status: 'ok';
  timestamp: string;
  version: string;
};

export function getSystemStatus(version = 'v2-bootstrap'): SystemStatus {
  return {
    service: 'mandabrain-web',
    status: 'ok',
    timestamp: new Date().toISOString(),
    version
  };
}
