---
title: Rendertron
section: Renderers
weight: 205
featherIcon: activity
---

[Rendertron](https://github.com/GoogleChrome/rendertron) is a Headless Chrome rendering solution by Google.

## Installing and configuring the renderer

```bash
npm install rendertron
```

```bash
./node_modules/rendertron/bin/rendertron
```

The default port is `3000`.

## Configuring your application

All you have to do on the application side is to put these variables into the `.env` file.

```
DYNAMIC_RENDERER_DRIVER=rendertron
RENDERTRON_URL=http://localhost:3000
```
