# Kirby Boiler Readme

***Version 0.3 - [Changelog](docs/changelog.md)***

Splitscreen preview of the site in the panel.

![Screenshot](docs/screenshot.png)

## Thoughts behind the complete rewrite

### Splitview failed

My first approach was called Splitview. It failed because I did everything from outside the panel. I simply could not keep track of everything that was happening in the panel when the urls changed. It caused many problems.

### Reveal 0.2 failed

My second approach was Reveal 0.2. It included ajax and other fancy stuff. It was an extended textarea field. The plugin could only previewed textareas, not other fields. It also went a bit overhead with css and javascript in order to work well.

### Current state

After some time and thought, I have come to a conclusion that if it's going to be done correctly, the whole page needs to be previewed and take all fields into account. By not only targeting the textarea would make it possible for any field to be previewed.

In this version there are no options and no ajax. It refreshes on save or refresh.

#### Ajax in the future

I still have in mind to include ajax again. This time my idea goes around the `$_SESSION` where all the temporary fields are stored. The problem is that I can't manipulate already created page objects which I want to do to replace the fields. If I could do that I could use this function to generate the page: https://github.com/jenstornell/kirby-secrets/wiki/Snippet-preview

Therefor I wait with Ajax for now. The field still works without it, but you need to save to see the changes.

### [Installation instructions](docs/install.md)

## Setup

### 1. Blueprint

To make it work as expected, add the following code to your blueprint:

```text
fields:
  reveal: reveal
```

## Usage

Click the switch button to the left of the search icon in the panel. It's an on/off toggle of the splitscreen preview.

## Requirements

- [**Kirby**](https://getkirby.com/) 2.4+

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](https://github.com/jenstornell/kirby-reveal/issues/new).

## License

[MIT](https://opensource.org/licenses/MIT)

It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.

## Credits

- [Jens Törnell](https://github.com/jenstornell)