import { describe, expect, it } from 'vitest';
import { getSystemStatus } from '../src/lib/status';

describe('getSystemStatus', () => {
  it('retorna payload base de health-check', () => {
    const result = getSystemStatus('test-version');

    expect(result.service).toBe('mandabrain-web');
    expect(result.status).toBe('ok');
    expect(result.version).toBe('test-version');
    expect(new Date(result.timestamp).toString()).not.toBe('Invalid Date');
  });
});
