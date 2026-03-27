import { NextResponse } from 'next/server';
import { getSystemStatus } from '@/lib/status';

export async function GET() {
  return NextResponse.json(getSystemStatus());
}
