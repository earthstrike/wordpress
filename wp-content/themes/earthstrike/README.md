# [Earth Strike Custom WP Theme](http://earthstrike.org)

## Running locally

1. Set up your local WP environment, I used [this guide](https://torquemag.io/2015/11/install-wordpress-locally-xampp-windows-mac/).
2. `git clone` this repo into the root directory of the WP install.
3. Activate the theme from the admin dashboard.

## Development

### Set up

1. Navigate to the WP root directory.
2. Install dependencies with `npm install`.

### How-to (read this)

The src directory structure looks like this:

```
src
├img
│ └icons
├js
└scss
```

All source is compiled into the *dist/* directory, which has an identical structure. Watch image/scss/js files with `npm run watch`.

* All of the tooling is done using npm, in a manner akin to [this guide](https://css-tricks.com/why-npm-scripts/). (Simple, fast, and you never have to use the word *piping*.) Check *package.json* to see the other npm scripts.
* You **MUST** run one of the npm build scripts to compile your `src/` code into one of the `dist/` folders that the theme actually uses. (This is done passively with `npm run watch`.)

#### WordPress theming

Developing within the WP framework can seem daunting (or frustratingly limiting) at first, but once you wrap your head around the [WP template heirarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/) and the [theme development guide](https://codex.wordpress.org/Theme_Development) (<- this one can take some time) things become a lot more intuitive. Our website is being built using the the [HTML5Blank](http://html5blank.com/) ((feature list))[https://github.com/EarthStrike/wordpress] boilerplate, and I'll document some of the important things to know below. If you have any questions, please reach out to @avinoamsn.

* Some good resources for understanding WP custom themes:
	* [WP Codex entry for theme development](https://codex.wordpress.org/Theme_Development)
	* [WP Theming Handbook](https://developer.wordpress.org/themes/getting-started/)
	* [Template heirarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/)
* Reach out to @avinoamsn with any questions.

* don't change the gitignore
* the package.json is in the wordpress root folder, which is where the node_modules dir will be installed
* header.php, footer.php, etc
* the best way to identify where different elements are getting their styles from is to use the inspector in the browser
* root dir readme is the features list from the default HTML5Blank readme
* There's no browser-sync installed at the moment, mostly because I haven't bothered to see how well it plays with the WP theme files.
* TODOs
	* would be great if we served bootstrap & fonts from our site, rather than CDNs
	* for some reason, the justify-content in the header isn't behaving like it's supposed to: space-between is behaving like space-around (see [this](https://css-tricks.com/snippets/css/a-guide-to-flexbox/))