import { describe, expect, it } from 'vitest';
import { cn } from '../../src/lib/utils';

describe('cn', () => {
  it('mescla classes corretamente', () => {
    expect(cn('p-2', 'text-sm')).toBe('p-2 text-sm');
  });

  it('resolve conflitos tailwind mantendo a última regra', () => {
    expect(cn('p-2', 'p-4')).toBe('p-4');
  });
});
