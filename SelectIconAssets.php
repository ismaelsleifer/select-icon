<?php

namespace sleifer\selectIcon;

use \yii\web\AssetBundle;

/**
 * @author Ismael Sleifer <ismaelsleifer@gmail.com>
 */
class SelectIconAssets extends AssetBundle
{
	public $sourcePath = '@sleifer/selectIcon/assets';

	public $js = [
		'js/icons.js'
	];

	public $depends = [
		'yii\web\JqueryAsset',
	];
}
