<?php
/*
* Ajax filter for yii2
*
* public function behaviors()
*	{
*		return [
*			'ajax' => [
*				'class' => AjaxFilter::className(),
*				'actions' => [
*					'actionName' => ['ajax'],
*				],
*			],
*		];
*	}
 */

namespace Apollo;


use yii\base\Behavior;
use yii\web\Controller;
use yii\web\HttpException;

class AjaxFilter extends Behavior
{
    public $actions;

    public function events()
    {
        return [Controller::EVENT_BEFORE_ACTION => 'beforeAction'];
    }

    public function beforeAction($event)
    {


        $action = $event->action->id;

        if (isset($this->actions[$action])) {
            if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) && !strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                throw new HttpException(400, 'For this action  allowed only Ajax requests');
            }
        }

    }
} 