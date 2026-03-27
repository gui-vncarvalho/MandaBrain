# Opções para evoluir UI do MandaBrain v2

## Opção 1 — CSS Modules + tokens (baixo risco)

- **Como funciona:** manter Next.js puro e estilizar com CSS Modules e variáveis globais.
- **Prós:** simples, sem dependências extras, ótimo para começar rápido.
- **Contras:** pode exigir mais esforço manual em componentes complexos.
- **Indicação:** boa para bootstrap inicial.

## Opção 2 — Tailwind CSS + shadcn/ui (equilíbrio)

- **Como funciona:** utilitários Tailwind + biblioteca de componentes copiáveis (shadcn).
- **Prós:** produtividade alta, visual moderno, consistência entre telas.
- **Contras:** curva de aprendizado e setup inicial maior.
- **Indicação:** melhor custo-benefício para produto crescer com velocidade.

## Opção 3 — Material UI (MUI) completo (enterprise)

- **Como funciona:** biblioteca madura com muitos componentes prontos.
- **Prós:** rapidez em telas administrativas e formulários.
- **Contras:** bundle maior e customização visual pode ficar mais trabalhosa.
- **Indicação:** útil se prioridade for painel administrativo robusto rapidamente.

## Decisão registrada

**Selecionada: Opção 2 (Tailwind CSS + shadcn/ui).**

Aplicada no frontend v2 para iniciar as próximas features com base visual e componentes reutilizáveis.
