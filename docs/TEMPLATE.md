# Template

**Templates are there to help you make the css work well in the preview.**

You probably have your frontend content inside some div elements.

To "emulate" your real enviroment you can have the same elements in the preview as well. To make that possible, use templates.

## Files and folders

By default your template filepath will look like this:

```
[path]/[template].[fieldname].php
```

Translated into a real filepath it might look something like this:


```
/site/snippets/reveal/mytemplate.myfieldname.php
```

## Snippet

Your template file is actually a snippet.

The snippet should include `{{reveal}}`. It will be replaced with the textarea content, in the preview.

```php
<div class="wrap">
  <div class="content">{{reveal}}</div>
</div>
```

## Options

### Path

You can change the path to your templates:

```
c::set('plugin.reveal.path.template', kirby()->roots()->snippets() . DS . 'reveal');
```

### Fallback

If the template file does not exists, a fallback takes over.

```php
c::set('plugin.reveal.fallback.template' ): // Full file path to a php snippet
```

If the option is not set it will use `{{reveal}}`. It will be replaced with the textarea content, in the preview.