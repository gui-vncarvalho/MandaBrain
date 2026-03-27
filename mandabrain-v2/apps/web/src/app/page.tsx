import Link from 'next/link';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';

export default function HomePage() {
  return (
    <main className="mx-auto max-w-5xl px-4 py-8">
      <Card>
        <CardHeader>
          <CardTitle>MandaBrain v2</CardTitle>
          <CardDescription>
            Base moderna do frontend em Next.js + Tailwind + componentes no padrão shadcn/ui.
          </CardDescription>
        </CardHeader>
        <CardContent className="grid gap-5">
          <ul className="list-disc space-y-2 pl-5 text-sm text-slate-700">
            <li>✅ Sessão assinada em cookie httpOnly e proteção de rota.</li>
            <li>✅ Testes automatizados com Vitest para auth e regras de sessão.</li>
            <li>✅ Catálogo de cursos + detalhe + progresso com dados mock.</li>
            <li>✅ Estrutura visual preparada para escalar features com consistência.</li>
          </ul>

          <div className="flex flex-wrap gap-3">
            <Link href="/login" className="no-underline hover:no-underline">
              <Button>Entrar</Button>
            </Link>
            <Link href="/cursos" className="no-underline hover:no-underline">
              <Button variant="ghost">Ver catálogo mock</Button>
            </Link>
          </div>
        </CardContent>
      </Card>
    </main>
  );
}
