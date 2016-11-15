<?php
namespace Concrete\Package\CustomizableTwitterFeed\Block\CustomizableTwitterFeed;

use Concrete\Core\Block\BlockController;
use Core;

class Controller extends BlockController
{
    protected $btInterfaceWidth = 450;
    protected $btInterfaceHeight = 560;
    protected $btCacheBlockOutput = true;
    protected $btTable = 'btCustomizableTwitterFeed';
    protected $btDefaultSet = 'social';

    public function getBlockTypeName()
    {
        return t('Customizable Twitter Feed');
    }

    public function getBlockTypeDescription()
    {
        return t('Add a customizable Twitter feed on your pages.');
    }

    public function validate($args)
    {
        $error = Core::make('helper/validation/error');
        if (!trim($args['userName'])){
            $error->add(t('Please enter a valid username.'));
        }

        return $error;
    }

    public function save($args)
    {
        $args['userName'] = strtolower(preg_replace('/\s+/', '', $args['userName']));
        $args['feedTitleTextSize'] = intval($args['feedTitleTextSize']);
        $args['maxTweets'] = intval($args['maxTweets']);
        $args['showUser'] = intval($args['showUser']);
        $args['showTime'] = intval($args['showTime']);
        $args['showInteraction'] = intval($args['showInteraction']);
        $args['showRetweet'] = intval($args['showRetweet']);
        $args['showImages'] = intval($args['showImages']);
        $args['linksInNewWindow'] = intval($args['linksInNewWindow']);
        $args['maxWidth'] = intval($args['maxWidth']);
        $args['feedPadding'] = intval($args['feedPadding']);
        $args['tweetDivider'] = intval($args['tweetDivider']);
        $args['nameTextSize'] = intval($args['nameTextSize']);
        $args['atNameTextSize'] = intval($args['atNameTextSize']);
        $args['feedTextSize'] = intval($args['feedTextSize']);
        $args['timePostedTextSize'] = intval($args['timePostedTextSize']);
        $args['interactTextSize'] = intval($args['interactTextSize']);

        parent::save($args);
    }
}
