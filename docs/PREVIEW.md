# Preview

## Bar

### Refresh

Reloads the iframe and content.

### Name

The field label and the field name is there to make sure you that you are editing the correct field.

### Close X

Closes the preview.

## Padding

In the preview window it can sometimes be good to add some additional space around the preview. You can do that.

```
c::get('plugin.reveal.preview.padding', '1em');
```

*The padding is only placed on top and left. It makes the scrollbar placed naturally to the right.*

## Delay

When the preview is updated, a new server request is made. To not crasch the server a delay is needed.

*The delay is only fired when you do nothing in the textarea during that time, or press enter.*

```
c::set('plugin.reveal.prevew.delay', 1000 ); // (milliseconds)
```

**High value** - If you care about your server, set a high value.
**Low value** - If you care about speed, set a low value.