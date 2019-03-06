<?php
namespace Concrete\Package\CustomizableTwitterFeed;

use Concrete\Core\Asset\AssetList;
use Concrete\Core\Block\BlockType\BlockType;
use Concrete\Core\Package\Package;

/*
Deluxe Customizable Twitter Feed by Karl Dilkington (aka MrKDilkington)
This software is licensed under the terms described in the concrete5.org marketplace.
Please find the add-on there for the latest license copy.
*/

class Controller extends Package
{
    protected $pkgHandle = 'customizable_twitter_feed';
    protected $appVersionRequired = '5.7.3';
    protected $pkgVersion = '1.0.4';

    public function getPackageName()
    {
        return t('Deluxe Customizable Twitter Feed');
    }

    public function getPackageDescription()
    {
        return t('Add a customizable Twitter feed on your pages.');
    }

    public function on_start()
    {
        $assetList = AssetList::getInstance();
        $assetList->register(
            'javascript',
            'twitterFetcher',
            'blocks/customizable_twitter_feed/files/twitterFetcher_min.js',
            array(),
            'customizable_twitter_feed'
        );
    }

    public function install()
    {
        $packageInstall = parent::install();

        $blockType = BlockType::getByHandle('customizable_twitter_feed');
        if (!is_object($blockType)) {
            BlockType::installBlockTypeFromPackage('customizable_twitter_feed', $packageInstall);
        }
    }
}
