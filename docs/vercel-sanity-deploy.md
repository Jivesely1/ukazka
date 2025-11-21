# Deploying a Next.js + Sanity project to Vercel

This guide summarizes the most common issues that make a locally working Next.js + Sanity setup fail when deployed to Vercel, plus the fixes that typically resolve them.

## 1) Align dependency versions
- Use a consistent set of packages: `next@^14`, `react@^18`, `react-dom@^18`, `sanity@^3`, and (if applicable) `next-sanity@^5`.
- Delete lockfiles produced by older package managers (`package-lock.json` vs. `yarn.lock`), reinstall with one tool, and commit the resulting lockfile.
- In Vercel, set the **Build & Development Settings → Install Command** to match the lockfile (e.g., `npm install`, `pnpm install`, or `yarn install`).

## 2) Sanity Studio routing on Vercel
- Host Studio as a Next.js route instead of a standalone build. With the App Router, expose it via `app/studio/[[...index]]/page.tsx` using `Studio` from `sanity` and the config exported from `sanity.config.ts`.
- In the Pages Router, export Studio from `pages/studio/[[...index]].tsx` using the same `sanity.config.ts`.
- Avoid `sanity start` on Vercel; the build should use `next build` only.

## 3) Environment variables
- Use `NEXT_PUBLIC_SANITY_PROJECT_ID` and `NEXT_PUBLIC_SANITY_DATASET` in the client bundle; server-only secrets (tokens, write keys) should be unprefixed.
- Configure the **Environment Variables** section in Vercel for all required keys. Ensure preview and production environments both have them.
- If Sanity CORS is enabled, add your Vercel domain to the Sanity project CORS origins (including `https://<project>.vercel.app`).

## 4) Image and asset loading
- For `@sanity/image-url` or `next-sanity`, set `projectId` and `dataset` from env vars at module load time.
- Add your Sanity CDN domains to `next.config.js` under `images.remotePatterns` (e.g., `cdn.sanity.io`).

## 5) Revalidation and drafts
- If using draft previews, expose `/api/preview` and `/api/exit-preview` routes. Protect them with a secret token stored in Vercel env vars.
- For ISR/`revalidateTag`, ensure `NEXT_PUBLIC_SANITY_API_VERSION` matches your dataset and that the build uses the same value.

## 6) Build and runtime flags
- In Vercel project settings, set **Framework** to Next.js and **Build Command** to `next build`.
- Do not use `next export` with Sanity Studio; it requires a server or edge runtime.
- If you see `Module not found: next-sanity` errors, clear `.next/` locally, reinstall dependencies, and redeploy.

## 7) Debugging failed deploys
- Open **Deploy Logs** in Vercel and search for missing env vars, peer dependency warnings, or `next-sanity` import failures.
- Reproduce with `vercel dev` locally (after `npm i -g vercel`) to spot config errors before pushing.

Following these steps resolves the majority of “works locally but not on Vercel” issues for Next.js + Sanity projects, especially around Studio routes and environment configuration.

## Minimal working example

If you need a concrete reference, here is a pared-down setup that deploys cleanly to Vercel with the App Router:

**package.json (core versions)**

```json
{
  "name": "next-sanity-vercel-sample",
  "private": true,
  "scripts": {
    "dev": "next dev",
    "build": "next build",
    "start": "next start"
  },
  "dependencies": {
    "next": "^14.2.4",
    "react": "^18.3.1",
    "react-dom": "^18.3.1",
    "sanity": "^3.52.1",
    "next-sanity": "^5.6.4"
  }
}
```

**`sanity.config.ts` (shared Studio configuration)**

```ts
import { defineConfig } from "sanity";
import { deskTool } from "sanity/desk";

export default defineConfig({
  projectId: process.env.NEXT_PUBLIC_SANITY_PROJECT_ID!,
  dataset: process.env.NEXT_PUBLIC_SANITY_DATASET!,
  title: "Vercel Sample Studio",
  plugins: [deskTool()],
});
```

**`app/studio/[[...index]]/page.tsx` (App Router Studio route)**

```tsx
import { Studio } from "sanity";
import config from "../../sanity.config";

export default function StudioPage() {
  return <Studio config={config} />;
}
```

**`next.config.js` (remote images and Vercel defaults)**

```js
/** @type {import("next").NextConfig} */
const nextConfig = {
  images: {
    remotePatterns: [
      {
        protocol: "https",
        hostname: "cdn.sanity.io",
      },
    ],
  },
};

module.exports = nextConfig;
```

**Environment variables (add in Vercel → Settings → Environment Variables)**

```
NEXT_PUBLIC_SANITY_PROJECT_ID=yourProjectId
NEXT_PUBLIC_SANITY_DATASET=production
SANITY_STUDIO_PREVIEW_SECRET=yourLongRandomString
```

Deploy this repository to Vercel with the default **Build Command** (`next build`) and no custom output directory. The Studio will be reachable at `/studio`, while your regular pages live under `app/` alongside it.
