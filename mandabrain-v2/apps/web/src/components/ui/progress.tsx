import { cn } from '@/lib/utils';

type ProgressProps = {
  value: number;
  className?: string;
};

export function clampProgress(value: number) {
  return Math.min(100, Math.max(0, value));
}

export function Progress({ value, className }: ProgressProps) {
  const safeValue = clampProgress(value);

  return (
    <div className={cn('relative h-2 w-full overflow-hidden rounded-full bg-slate-200', className)}>
      <div className="h-full bg-gradient-to-r from-blue-500 to-indigo-500" style={{ width: `${safeValue}%` }} />
    </div>
  );
}
