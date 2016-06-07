# Custom template

If no template is set in the blueprint it will fetch the html of the current page.

**Custom template folder path**

The value below is default.

```
c::set('plugin.reveal.template.root', kirby()->roots()->snippets() . DS . 'reveal' );
```

**Path default result**

```
/site/snippets/reveal
```

## Blueprint

**You need to add `template` as shown below:**

```
fields:
  my_field:
    label: Reveal
    type: reveal
    template: my_template
```

**Template**

- You can not add the `.php` extension, just the template name, like a snippet.
- You can not add a path here, just a name.

**The result will be something like this:**

```
/site/snippets/reveal/my_template.php
```

## Code in the template

### Functions and classes

Inside the template file you have access to all the Kirby functions and classes.

### Objects and variables

**These are available in the template:**

```
$site // site()
$pages // site()->children()
$page // The page content object
$language // Language code
```

### CSS and Javascript

If you use a custom template and want to use CSS or javascript, simply use the built in functions for it.

https://getkirby.com/docs/cheatsheet/helpers/css
https://getkirby.com/docs/cheatsheet/helpers/js