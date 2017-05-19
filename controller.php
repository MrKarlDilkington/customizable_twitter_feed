<?php
namespace Concrete\Package\CustomizableTwitterFeed;

use Package;
use BlockType;

/*
Deluxe Customizable Twitter Feed by Karl Dilkington (aka MrKDilkington)
This software is licensed under the terms described in the concrete5.org marketplace.
Please find the add-on there for the latest license copy.
*/

class Controller extends Package
{
    protected $pkgHandle = 'customizable_twitter_feed';
    protected $appVersionRequired = '5.7.3';
    protected $pkgVersion = '1.0';

    public function getPackageName()
    {
        return t('Deluxe Customizable Twitter Feed');
    }

    public function getPackageDescription()
    {
        return t('Add a customizable Twitter feed on your pages.');
    }

    public function install()
    {
        $pkg = parent::install();

        $bt = BlockType::getByHandle('customizable_twitter_feed');
        if (!is_object($bt)) {
            BlockType::installBlockTypeFromPackage('customizable_twitter_feed', $pkg);
        }
    }
}
