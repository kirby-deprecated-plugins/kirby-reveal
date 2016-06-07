# CSS and Javascript

If you use a custom template and want to use CSS or javascript, simply use the built in functions for it.

https://getkirby.com/docs/cheatsheet/helpers/css
https://getkirby.com/docs/cheatsheet/helpers/js

In all examples below, the second argument is set as default and you can change that.

## Template root

If you want to use templates, you can set your own folder path:

```
c::set('plugin.reveal.template.root', kirby()->roots()->snippets() . DS . 'reveal' );
```

## Template fallback

If a template file is not set in the blueprint or if it's missing, it will fetch the html of the current page.

## Template padding

In the preview window it can sometimes be good to add some additional space around the preview. You can do that.

```
c::get('plugin.reveal.template.padding', '1em');
```

## Css root

If you want to use css, you can set your own folder path:

```
c::get('plugin.reveal.css.root', kirby()->roots()->assets() . DS . 'css' . DS . 'reveal');
```

## Css fallback

If the css is missing or not set, you can add a fallback path for it:

```
c::get('plugin.reveal.css.fallback', self::fallbackPath() . DS . 'normalize.min.css');
```

If the fallback file does not exist, it will preview the content without css.

## Delay

When the preview is updated, a new server request is made. To not crasch the server a delay is needed.

*The delay is only fired when you do nothing in the textarea during that time, or press enter.*

```
c::set('plugin.reveal.delay', 1000 ); // (milliseconds)
```

**High value** - If you care about your server, set a high value.
**Low value** - If you care about speed, set a low value.