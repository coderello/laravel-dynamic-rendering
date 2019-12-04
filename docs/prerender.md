---
title: Prerender
section: Renderers
weight: 200
featherIcon: activity
---

[Prerender](https://github.com/prerender/prerender) is a rendering solution by [Prerender.IO](https://prerender.io/).

## Installing and configuring the renderer

```bash
npm install prerender
```

```bash
node node_modules/prerender/server.js
```

The default port is `3000`. Change the server port with `export PORT=3005` if needed.

## Configuring your application

All you have to do on the application side is to put these variables into the `.env` file.

```
DYNAMIC_RENDERER=prerender
PRERENDER_URL=http://localhost:3000
```
