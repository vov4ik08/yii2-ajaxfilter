#Ajax filter for yii2
Usage:
```php
public function behaviors()
	{
		return [
			'ajax' => [
				'class' => AjaxFilter::className(),
				'actions' => [
					'actionName' => ['ajax'],
				],
			],
		];
	}
```



