# Css

Css files are there to make the previews as equal to the site as possible.

To "emulate" your real enviroment you can have the same css in the preview as well.

## Files and folders

By default your css filepath will look like this:

```
[path]/[template].[fieldname].php
```

Translated into a real filepath it might look something like this:


```
/site/assets/css/reveal/mytemplate.myfieldname.css
```

## Options

### Path

You can change the path to your css files:

```
c::set('plugin.reveal.path.css', kirby()->roots()->assets() . DS . 'css' . DS . 'reveal' );
```

### Fallback

If the css file does not exists, a fallback takes over.

```php
c::set('plugin.reveal.fallback.css', kirby()->roots()->plugins() . DS . 'reveal' . DS . 'assets' . DS . 'css' . DS . 'normalize.css' ); // Full file path to a php snippet
```

If the option is not set it will use [normalize.css](https://necolas.github.io/normalize.css/) when generating the preview.


## Advanced

### Gulp

If you don't want to use the same css file in the panel as on the frontend, I recommend you to use [Gulp](http://gulpjs.com/) together with something like [Sass](https://www.npmjs.com/package/gulp-sass). In fact, you can use any preprocessor for css files as you want.

The benefit is that you can save just the content css for the preview, which would probably speed things up.