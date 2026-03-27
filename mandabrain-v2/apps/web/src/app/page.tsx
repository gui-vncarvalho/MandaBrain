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
      </ul>
    </main>
  );
}
