import type { Config } from 'tailwindcss';

const config: Config = {
  darkMode: ['class'],
  content: ['./src/**/*.{ts,tsx}'],
  theme: {
    extend: {
      colors: {
        background: '#f4f7fb',
        foreground: '#1f2937',
        card: '#ffffff',
        primary: {
          DEFAULT: '#2563eb',
          foreground: '#ffffff'
        },
        muted: {
          DEFAULT: '#f1f5f9',
          foreground: '#64748b'
        },
        border: '#d1d5db'
      },
      borderRadius: {
        lg: '0.75rem',
        md: '0.625rem',
        sm: '0.5rem'
      }
    }
  },
  plugins: []
};

export default config;
