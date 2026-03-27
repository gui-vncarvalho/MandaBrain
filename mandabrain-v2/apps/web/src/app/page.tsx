import Link from 'next/link';

export default function HomePage() {
  return (
    <main className="page">
      <section className="card">
        <h1 className="title">MandaBrain v2</h1>
        <p className="subtitle">
          Esta é a nova base do frontend em Next.js. O sistema legado em PHP continua intacto
          enquanto a migração acontece por etapas.
        </p>

        <ul className="list">
          <li>✅ Fase inicial criada sem alterar o legado.</li>
          <li>
            ✅ Endpoint de health-check disponível em <code>/api/health</code>.
          </li>
          <li>✅ Suite de testes inicial configurada com Vitest.</li>
          <li>
            ✅ Estrutura inicial de autenticação disponível em <code>/login</code>.
          </li>
          <li>
            ✅ Sessão em cookie httpOnly + proteção de rota em <code>/dashboard</code>.
          </li>
        </ul>

        <div className="inline-actions">
          <Link className="button" href="/login">
            Ir para fluxo de login v2 →
          </Link>
        </div>
      </section>
    </main>
  );
}
