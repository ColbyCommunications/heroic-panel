# heroic-panel

A shortcode for a panel with a background image and a superimposed content block. [Demo.](https://colbycommunications.github.io/heroic-panel/demo/index.html)

## Install

### Option 1: Composer

Install this package in your PHP project with Composer:

```
composer require colbycomms/heroic-panel
```

This will make the non-WordPress-dependent [`ColbyComms\HeroicPanel\Block`](heroic-panel/Block.php) class available along with the `[heroic-panel]` shortcode (see below) in WordPress.

### Option 2: WordPress plugin

Clone this repository into your plugins directory and activate it through the WordPress admin.

## Usage

### Shortcode

```
[heroic-panel background-image="http://your-image-url/image.jpeg"]
Your superimposed content. This is required.
[/heroic-panel]
```

#### Shortcode $atts

##### `background-image` (**required**)

The URL of any image. This package doesn't process the image in any way, so make sure it is a web-friendly size but large enough to serve as a background image for a full-width panel.

### In code

#### `ColbyComms\HeroicPanel\Block::render( array $options, string $content )`

##### Example

```PHP
<?php

use ColbyComms\HeroicPanel\Block;

echo Block::render(
    [
        'background-image' => 'http://your-image-url/image.jpeg'
    ],
    'Your superimposed content. This is required.'
);
```

##### `render` arguments

###### `$options` array (**required**)

An options array accepting one required parameter, `background-image`, for the image URL.

###### `$content` string (**required**)

The content that will be superimposed in a rectangle over the background image.
