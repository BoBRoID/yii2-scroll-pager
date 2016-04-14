<?php
/**
 * Created by PhpStorm.
 * User: alone
 * Date: 14.04.16
 * Time: 15:06
 */

namespace bobroid\y2sp;

use Yii;
use yii\widgets\LinkPager;
use yii\helpers\Html;

class CustomLinkPager extends LinkPager{

	protected function renderPageButton($label, $page, $class, $disabled, $active)
	{
		$options = ['class' => $class === '' ? null : $class];
		if ($active) {
			Html::addCssClass($options, $this->activePageCssClass);
			return Html::tag('li', Html::tag('span', $label), $options);
		}
		if ($disabled) {
			Html::addCssClass($options, $this->disabledPageCssClass);

			return Html::tag('li', Html::tag('span', $label), $options);
		}
		$linkOptions = $this->linkOptions;
		$linkOptions['data-page'] = $page;

		return Html::tag('li', Html::a($label, urldecode($this->pagination->createUrl($page)), $linkOptions), $options);
	}

}