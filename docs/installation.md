---
title: Installation and setup
section: Getting Started
weight: 950
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

- [Rendertron]({{base}}/{{version}}/rendertron)
- [Prerender]({{base}}/{{version}}/prerender)

## Installing the Chrome

This step might not be required because:
- some renderers install the Chrome themselves (e.g. Rendertron)
- Chrome might already be installed in your system

But if it is not your case, the instructions are given below.

### Installing the Chrome on Ubuntu

```bash
wget -q -O - https://dl-ssl.google.com/linux/linux_signing_key.pub | sudo apt-key add -
sudo sh -c 'echo "deb [arch=amd64] http://dl.google.com/linux/chrome/deb/ stable main" >> /etc/apt/sources.list.d/google-chrome.list'
sudo apt update
sudo apt install google-chrome-stable
```
