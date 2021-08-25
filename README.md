Select icon
===================

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either add

```
"require": {
    "sleifer/select-icon": "dev-master"
}
```

of your `composer.json` file.

## Latest Release

The latest version of the module is v0.5.0 `BETA`.

## Usage

### Find model

View:

```php
use sleifer\autocompleteAjax\SelectIcon;

// Normal select with ActiveForm & model
<?= $form->field($model, 'user_id')->widget(SelectIcon::classname(), []) ?>
```


**select-icon** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.