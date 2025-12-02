# Parallax Cover Video

A lightweight WordPress plugin that adds smooth parallax scrolling effects to video backgrounds in WordPress Cover blocks.

## Features

- ✨ **One-click toggle** - Enable parallax effect directly from the block editor styles panel
- 🎬 **Smooth scrolling** - Optimized parallax animation using `requestAnimationFrame`
- 🎯 **No gaps** - Video always fills the container with no bars or gaps during scrolling
- 🎨 **Theme independent** - Works with any WordPress theme
- ⚡ **Lightweight** - Minimal code, maximum performance
- 🔧 **Easy to use** - No configuration needed, just toggle the style

## Installation

1. Upload the `parallax-cover-video` folder to `/wp-content/plugins/`
2. Activate the plugin through the 'Plugins' menu in WordPress
3. That's it! No configuration needed.

## Usage

1. Add a **Cover block** to your page/post
2. Add a **video background** to the Cover block
3. In the block settings panel, go to the **Styles** section
4. Click **"Parallax Video"** to enable the effect
5. The video will now scroll with a smooth parallax effect!

## How It Works

The plugin:
- Registers a block style for the Cover block
- Adds CSS to ensure the video always covers the full container
- Uses JavaScript to calculate scroll position and apply parallax transforms
- Clamps the parallax offset to prevent visual gaps

## Technical Details

- **Video container size**: 130% height to ensure full coverage
- **Parallax intensity**: 0.3 (30% of scroll distance)
- **Max offset**: 15% of container height (prevents gaps)
- **Performance**: Uses `requestAnimationFrame` and viewport detection

## Requirements

- WordPress 5.8 or higher
- PHP 7.2 or higher
- A theme that supports the Cover block (most modern themes)

## Changelog

### 1.0.0
- Initial release
- Parallax video effect for Cover blocks
- Block editor style toggle
- Smooth scrolling with no visual gaps

## License

GPL v2 or later

## Credits

Developed by Derek Hanson for smooth parallax video effects in WordPress Cover blocks.

**Plugin URL**: https://derekhanson.blog/parallax-cover-video/

