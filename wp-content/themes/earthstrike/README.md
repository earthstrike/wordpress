# [Earth Strike Custom WP Theme](http://earthstrike.org)

## Local Development

1. Set up your local WP environment, I used [this guide](https://torquemag.io/2015/11/install-wordpress-locally-xampp-windows-mac/).
2. Add this theme to your wp-content/themes directory.
3. Install dependencies with `npm install`.
4. Watch image/scss/js files with `npm run watch`.

All of the tooling is done using npm, in a manner akin to [this guide](https://css-tricks.com/why-npm-scripts/). (Simple, fast, and you never have to use the word *piping*.) Check *package.json* to see the other npm scripts.

The src directory architecture looks like this:

```
src
├img
│ └icons
├js
└scss
```

* You **MUST** run one of the npm build scripts to compile your `src/` code into one of the `dist/` folders that the theme actually uses. (This is done automatically with `npm run watch`.)
* There's no browser-sync installed at the moment, mostly because I haven't bothered to see how well it plays with the WP theme files.
* Some good resources for understanding WP custom themes:
	* [WP Codex entry for theme development](https://codex.wordpress.org/Theme_Development) — check the 
	* [WP Theming Handbook](https://developer.wordpress.org/themes/getting-started/)
	* [Template heirarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/)
* Reach out to @avinoamsn with any questions.

### WordPress theming

Developing within the WP framework can seem daunting (or frustratingly limiting) at first, but once you wrap your head around the [WP template heirarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/) and the [theme development guide](https://codex.wordpress.org/Theme_Development) (<- this one can take some time) things become a lot more intuitive. Our website is being built using the the [HTML5Blank](http://html5blank.com/) boilerplate, and I'll document some of the important things to know below. (TODO) If you have any questions, please reach out to me (@avinoamsn).

* don't change the gitignore
* the package.json is in the wordpress root folder, which is where the node_modules dir will be installed
* below is the features list from the default HTML5Blank readme

## HTML5Blank Features

### HTML5
* Basic Semantic HTML5 Markup
* W3C Valid Code Foundations
* Responsive Ready, ViewPort meta data
* HTML Class support for IE7, IE8, IE9 Conditionals (HTML5 Boilerplate)
* Clean, neatly organised code, with PHP annotations

### jQuery + JavaScript
* Replaced built-in WordPress enqueue with Google CDN
* Protocol relative jQuery if Google CDN offline (HTML5 Boilerplate)
* Conditionizr for cross-platform/device detects and enhancements
* Modernizr feature detection, HTML5 element support for legacy, progressive enhancement (HTML5 Boilerplate)
* DOM Ready JavaScript file setup (scripts.js) for instant JavaScript development
* JavaScript files enqueued using WordPress functions into wp_head

### CSS3
* HTML5 Boilerplate reset
* Media Queries framework for instant development using @media
* @font-face empty framework with Fonts folder setup ready for new custom fonts
* CSS3 custom selection styles
* Inline print styles (HTML5 Boilerplate)
* Body element config, including Optimize Legibility for kerning and font-smoothing
* Replaced focus styles to avoid blue blur in field elements, replaced with border
* Stylesheet enqueued using WordPress functions into wp_head

### Preloaded Functions (functions.php)
* Enqueue Scripts functions setup
* Enqueue Styles functions setup
* Dynamic WordPress Menu Navigation Support, preloaded with 3 Dynamic menus
* Cleaned up dynamic nav output (Remove outer 'div')
* Remove all injected classes from nav items, ID's, Page ID's
* Custom Post Type x1 preloaded for demonstration, supporting: Category, Tags, Post Thumbnails, Excerpts
* Dynamic Sidebar with x2 Widget Areas, and sidebar.php setup
* WordPress Thumbnail Support, no Plugin image cropping, custom Arrays and Thumbnail settings
* Custom Excerpt callbacks, with changeable callback numbers
* Replaced 'Read More' button for custom Excerpt callbacks
* Demo Shortcodes included, with Nested Shortcode capability
* Add Slug to body class (Starkers Theme credit)
* wp_head functions stripped right down, remove excess injected junk
* All functions annotated, categorised into sections, filters, actions, shortcodes etc.
* Space for development, neatly organised code with Modules/External files

### Theme Files and Functionality
* Built in Pagination, no plugins (strips out prev + next post and gives page numbers)
* Optimised Google Analytics in footer (HTML5 Boilerplate)
* Widget Area Sidebar support, functions in place to get developing
* Custom Search Form included (searchform.php) - fully editable
* Tags support for showing Post Tags
* Category support for showing the Category of post
* Author support showing the author
* Demo Custom Page Template for expansion
