# webpack 4
We use webpack 4 **to preprocess and bundle our SCSS and JavaScript files**. It is also used for copying fonts and other assets from node packages (e.g. FontAwesome fonts).

The configuration file states the mode as `development` but running webpack with the -p flag will override the mode and enable minification.

## Entry file
As webpack can only handle JavaScript entry files **we are importing our `main.scss` file inside `/assets/src/main.js`** file.

## JavaScript
All of the JavaScript files are run through `babel-loader` and `eslint-loader` to transpile ES6 code to ES5 and to check the files for antipatterns and such.

We also are using `@babel/polyfill` to polyfill ES6 stuff that can't be transpiled.

- Babel configurations can be found in `package.json`
- ESLint configurations are in `.eslintrc`

## SCSS
We use `mini-css-extract-plugin` to extract the CSS. We minify CSS and remove all comments for the production build.

As we have added CSS minification separately to our webpack configuration, we also have to do it for the JavaScript files as well.

**NOTE!**
Assets that are being used in `.scss` files shouldn't be located in `/assets/src` folder unless they are being handled or copied over by a loader.

All assets in the `.scss` files are related to the `main.scss`.

```background-image: url('../../img/site-logo.jpg');```

## Possible issues
- As **all of the files in `.scss` files have to be resolved** it might be that the webpack configuration is missing that specific file extension in the `file-loader` section.
- If **ESLint is complaining about unresolved module(s)** make sure that it actually can't resolve the module. In some cases ESLint is complaining about this even though webpack is resolving the module completely fine. Same goes for anything ESLint related.
- **If you use Prettier** it might have issues with ESLint configurations, let's figure these out if they pop up.
- If the **bundled assets are unminified** make sure that the browser isn't prettying the file automatically. Chrome seems to be doing this.
- **Make sure you are referencing assets in .scss files in relation to the `main.scss`** file.
