# Filter

The content from the textarea can be filtered before landing in the preview. When it's filtered `kirbytext` is used.

## Blueprint

You need to add `filter` as `true` or `false` in the blueprint.

```
fields:
  my_field:
    label: Reveal
    type: reveal
    filter: false
```

## Default is true

When `filter` is missing in the blueprint, it's set to `true` as default.