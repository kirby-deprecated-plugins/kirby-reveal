# Engine

It might seem like a very simple plugin but behind the scenes there are a lot of things going on to improve the experience.

## Preview toggle memory

When you activate the preview it will also save it to your local storage. After the next refresh, the preview will still be there.

## Scroll position memory

When your write, you have probably scrolled down a bit to see the content you want to preview.

Because the iframe refreshed a lot, the scroll position is saved to your local storage. The next refresh you can continue where you left off. You will probably not even notice.

## Update message

Every time a refresh is made to the preview, a green message with an icon appears. Then you know that your preview has been refreshed. You would probably not know that otherwise.

## Timer

A clever timer tries to refresh the iframe at the right time, not just after a number of seconds.

## Trigger

It will try to trigger when ever you change something. Then it will add the data to the session and use session data in the iframe. It makes it totally free from Ajax.

## No preview flash

When refreshing an iframe a disturbing flash effect appears. To prevent this I use two iframes. These are switched without flash effect. It means that one iframe will always be serve as a background. Less stressful.