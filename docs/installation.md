---
title: Installation and setup
section: Getting Started
weight: 201
featherIcon: download
---

## Basic installation

You can install this package via composer using this command:

```bash
composer require coderello/laravel-dynamic-rendering
```

To publish the config file to `config/dynamic-rendering.php` run:

```bash
php artisan vendor:publish --tag="dynamic-rendering-config"
```

## Choosing the renderer

After the installation you need to choose and setup the renderer.

These ones are shipped out of the box:

- [Prerender]({{base}}/{{version}}/prerender)
- [Rendertron]({{base}}/{{version}}/rendertron)
