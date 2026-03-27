import Link from 'next/link';

export default function HomePage() {
  return (
    <main style={{ maxWidth: 900, margin: '0 auto', padding: 24, fontFamily: 'sans-serif' }}>
      <h1>MandaBrain v2</h1>
      <p>
        Esta é a nova base do frontend em Next.js. O sistema legado em PHP continua intacto enquanto
        a migração acontece por etapas.
      </p>
      <ul>
        <li>✅ Fase inicial criada sem alterar o legado.</li>
        <li>✅ Endpoint de health-check disponível em <code>/api/health</code>.</li>
        <li>✅ Suite de testes inicial configurada com Vitest.</li>
        <li>✅ Estrutura inicial de autenticação disponível em <code>/login</code>.</li>
        <li>✅ Sessão em cookie httpOnly + proteção de rota em <code>/dashboard</code>.</li>
      </ul>

      <p>
        <Link href="/login">Ir para fluxo de login v2 →</Link>
      </p>
    </main>
  );
}
