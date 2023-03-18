# Changelog

### [v1.0.0](https://github.com/bencurio/barion-web-php/releases/tag/v1.0.0) 2023-03-19
- Forked from the [barion/barion-web-php](https://github.com/barion/barion-web-php) repository to add Composer and PSR-4 support and minor fixes.
- PHP 5.x is no longer supported, please use at least PHP 7.4.
- `ext-json` PHP dependency added to the Composer file.
- For safety, I have replaced the example PHP files with Markdown.
- Updated PHP examples: https://github.com/bencurio/barion-web-php/tree/master/examples
- The original [common/Constans.php](https://github.com/barion/barion-web-php/blob/master/library/common/Constants.php) file has been moved here: [Enum/BarionConstans.php](https://github.com/bencurio/barion-web-php/blob/master/library/Enum/BarionConstants.php)
- The original [common/Enumerations.php](https://github.com/barion/barion-web-php/blob/master/library/common/Enumerations.php) file is refactored and the abstract classes are moved to separate files here: [Enum](https://github.com/bencurio/barion-web-php/blob/master/library/Enum)
- The `library/common` folder is deleted.
- The `library/helpers/loader.php` file is deleted.
- Folder renamings in `library` to comply with PSR-4
  - `helpers` → `Helpers`
  - `models` → `Models`
    - `common` → `Common`
    - `payment` → `Payment`
    - `3dsecure` → `Secure3D`
    - `refund` → `Refund`
- Added some E2E test
- **[Covers v1.4.10](https://github.com/bencurio/barion-web-php#version-history)**, the official [changelog](https://github.com/barion/barion-web-php#version-history) is not updated for some reason.