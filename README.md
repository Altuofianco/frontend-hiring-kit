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
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
npm install
```

**TypeScript:**

```bash
npm create vite@latest client -- --template react-ts
cd client
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
npm install
```

Then configure `tailwind.config.js`:

```js
export default {
  content: ["./index.html", "./src/**/*.{js,ts,jsx,tsx}"],
  theme: { extend: {} },
  plugins: [],
};
```

Add to `src/index.css`:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
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
npx create-next-app@latest client --ts --tailwind --eslint --app --src-dir --import-alias "@/*" --no-turbopack --use-npm
cd client
npm install
```

### Start Development

```bash
cd client
npm run dev
```
