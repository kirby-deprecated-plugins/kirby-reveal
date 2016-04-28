# Options

## Css root

Set a css folder path where you want to place your textarea preview field css files.

```
c::set('plugin.textarea.preview.css.root', kirby()->roots()->assets() . DS . 'textarea-preview' )
```

## Css fallback

Set a css file path to the css file you want as fallback, if no one is added for the field.

```
c::set('plugin.textarea.preview.css.fallback', kirby()->roots()->plugins() . DS . 'textarea-preview' . DS . 'normalize.php' )
```

## Route path

```
c::get('plugin.splitfield.route', 'splitfield' );
```