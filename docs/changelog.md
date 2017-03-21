# Changelog

**0.5**

- When adding `0` to the `plugin.reveal.refresh` option, it will be disabled.
- Updated iframe trigger. It now fires more often.
- On a multi language installation, the default language preview updates live. Other languages needs a save action to be updated.
- Does not try to live update when iframe is not active/visible.

**0.4**

- Added support for mobile devices, narrow screens.
- Added memory with local storage to remember preview state open/closed.
- Added memory with local storage to remember preview scroll position.
- Added [live update](docs/engine.md). Small announcement, big feature.
- Fixed bug with sidebar when reveal mode active.
- Fixed bug with textarea overflow when reveal mode active.

**0.3**

- Complete rewrite. Back to basic release. No ajax. Just updates the iframe on save.