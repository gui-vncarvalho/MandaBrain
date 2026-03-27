import { describe, expect, it } from 'vitest';
import { clampProgress } from '../../src/components/ui/progress';

describe('clampProgress', () => {
  it('limita valores abaixo de 0 para 0', () => {
    expect(clampProgress(-15)).toBe(0);
  });

  it('limita valores acima de 100 para 100', () => {
    expect(clampProgress(185)).toBe(100);
  });

  it('mantém valores válidos', () => {
    expect(clampProgress(67)).toBe(67);
  });
});
