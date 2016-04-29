# Blueprint

It's important that `type` is `reveal` instead of `textarea`.

```
fields:
  text:
    type: reveal
```

All the `textarea` [blueprint options](https://getkirby.com/docs/cheatsheet/panel-fields/textarea) works with the `reveal` field as well.


## Additional options

With additional options it can look like this:

```
fields:
  text:
    type: reveal
    lock: true
    bar: false
    padding: false
```

## Lock

If you don't want the preview to hide when you leave the textarea, you can lock it.

**Default:** `false`

## Bar

It's possible to disable the preview button bar to get more screen space.

**Default:** `true`

## Padding

Disable this option to remove the surrounding space to make the preview content fit the preview perfectly.

**Default:** `true`
