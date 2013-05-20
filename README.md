ColorSchemeBundle
=================

Symfony2 color scheme bundle


Installation
===========

To install this bundle please follow the next steps:

First add the dependencies to your `composer.json` file:

```json
"require": {
    ...
    "idci/color-scheme-bundle": "dev-master",
    "idci/exporter-bundle": "dev-master", // This bundle is not required
},
```

Then install the bundle with the command:

```php
php composer update
```

Enable the bundle in your application kernel:

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new IDCI\Bundle\ColorSchemeBundle\IDCIColorSchemeBundle(),
        new IDCI\Bundle\ExporterBundle\IDCIExporterBundle(), // This bundle is not required
    );
}
```

Now the Bundle is installed.


