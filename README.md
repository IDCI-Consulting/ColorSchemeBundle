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

The Color object:
=================

This bundle provide a color object which allow you to easily manage color conversion.

Here is an example:

```php
<?php
...
use IDCI\Bundle\ColorSchemeBundle\Model\Color;
...
$color = new Color('red');
$hexColor = $color->toHex();    // Transform your Color object to a ColorRGBHexadecimal object
$hexColor->getRed();            // Return the red composant in hexadecimal format (here: FF)
$hexColor->getGreen();          // Return the green composant in hexadecimal format (here: 00)
$hexColor->getBlue();           // Return the blue composant in hexadecimal format (here: 00)
$hexColor->__toString();        // Return the color in hexadecimal format (here: #FF0000)

```

You can create a *Color* with a [color name](http://www.w3schools.com/html/html_colornames.asp) (as display in the following example).
But you can also do this with:

Hexadecimal color value:

```php
$color = new Color('#FF0000');
```

Decimal color value:

```php
$color = new Color('255,0,0');
```

HSL (Hue, Saturation, Lightness) color value:

```php
$color = new Color('0%,0,100');
```

And convert them to others formats: toHex(), toDec(), toHsl() and toStr().


How to use 
==========

There is two way to use this bundle.
First one, you just want to transform a *Color* with a given method to an other one:

Call transformer services like this:

```php
<?php
...
use IDCI\Bundle\ColorSchemeBundle\Model\Color;
...
$lighten = $this->get('color_scheme_transformer.ligthen')->transform(new Color('red'));
$darken = $this->get('color_scheme_transformer.darken')->transform(new Color('red'));
$complement = $this->get('color_scheme_transformer.complement')->transform(new Color('red'));
$triad = $this->get('color_scheme_transformer.triad')->transform(new Color('red'));

```

Second one, you want to apply more than one transformer for one to many colors:

Simply call the 'color_scheme.manager' service and add your color transformers:

```php
$this
    ->get('color_scheme.manager')
    ->fromColors(array('#00FF00', 'yellow', '127,127,0'))
    ->addColorTransformer($this->get('color_scheme_transformer.ligthen'))
    ->addColorTransformer($this->get('color_scheme_transformer.darken'))
    ->addColorTransformer($this->get('color_scheme_transformer.complement'))
    ->generate()
;

```

Transformer parameters
======================

Following to the choosen transformer, you can specified some parameters.
For example, if you wants to lighten a color, may be you whishe to adjust the lighten value.

So for this case you can call the `setLightnessVary` method on your transformer service.

```php
$this->get('color_scheme_transformer.ligthen')->setLightnessVary(30); // Default value is 10
```

Here is a list of methods that you can call, following to the used transformer:

color_scheme_transformer.ligthen: 
 * setLightnessVary

color_scheme_transformer.darken:
 * setLightnessVary

color_scheme_transformer.complement: 
 * none

color_scheme_transformer.triad:
 * setHueVary


Create your own ColorTransformer
================================

//TODO