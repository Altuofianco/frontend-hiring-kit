# Project Setup

## API Mock Server

### Available Commands

```bash
make help          # Show all available commands
make update        # Update CodeIgniter dependencies via Composer
make start         # Start development server on http://localhost:8080
make stop          # Stop development server (Ctrl+C)
make data-init     # Initialize customer.txt from sample.customer
make data-refresh  # Reset customer.txt from sample.customer
```

### Quick Start

1. Initialize data files:

   ```bash
   make data-init
   ```

2. Start the server:
   ```bash
   make start
   ```

## Client

### Setup: React + Vite + Tailwind CSS

**JavaScript:**

```bash
npm create vite@latest client -- --template react
cd client
npm install tailwindcss @tailwindcss/vite
```

**TypeScript:**

```bash
npm create vite@latest client -- --template react-ts
cd client
npm install tailwindcss @tailwindcss/vite
```

Then configure `vite.config.js`/`vite.config.ts`/:

```js
import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
  plugins: [
    tailwindcss(),
  ],
})
```

Add to `src/index.css`:

```css
@import "tailwindcss";
```

### Setup: Next.js + Tailwind CSS

**JavaScript:**

```bash
npx create-next-app@latest client --js --tailwind --eslint --app --src-dir --import-alias "@/*" --no-turbopack --use-npm
cd client
npm install
```

**TypeScript:**

```bash
npx create-next-app@15 client --ts --tailwind --eslint --app --src-dir --import-alias "@/*" --no-turbopack --use-npm
cd client
npm install
```

### Start Development

```bash
cd client
npm run dev
```
