<?php

namespace Zelenin\yii\widgets\Summernote;

use Yii;
use yii\web\AssetBundle;

class SummernoteLanguageAsset extends AssetBundle
{
    /** @var string */
    public $language;
    /** @var string */
    public $sourcePath = '@bower/summernote/lang';
    /** @var array */
    public $depends = [
        'Zelenin\yii\widgets\Summernote\SummernoteAsset'
    ];

    /**
     * @inheritdoc
     */
    public function registerAssetFiles($view)
    {
        $langFile = 'summernote-' . $this->language . '.js';

        if (file_exists(Yii::getAlias($this->sourcePath) . '/' . $langFile)) {
            $this->js[] = $langFile;
            parent::registerAssetFiles($view);
        }
        else {
            # Stops publication sourcePath, because it does not make sense
            $this->sourcePath = null;
        }
    }
}
