# Selector

To know where the content should be placed in the preview, a [DOM selector](http://www.w3schools.com/cssref/css_selectors.asp) is needed.

```
fields:
  my_field:
    label: Reveal
    type: reveal
    selector: body .main
```

## Wrapped selector

Some characters can make trouble because they are used by the blueprint itself.

**Unwrapped:**

```
selector: body .main
```

**Wrapped:**

Colon `:` is used by the blueprint. To make that character work we can wrap the selector within quotes.

```
selector: "body .main:before"
```

**Newlines**

If you want you can also write like this:

```
selector: >
  .main,
  .footer
```

Read more about [YAML on Wikipedia](https://en.wikipedia.org/wiki/YAML).