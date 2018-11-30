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