<?php
/**
 * Created by PhpStorm.
 * User: olvit
 * Date: 01.08.2016
 * Time: 21:05
 */
namespace app\components;
use yii\base\Widget;

class SecondWidget extends Widget
{

    public function init()
    {
        parent::init();
        ob_start();

    }

    public function run()
    {
        $content = ob_get_clean();

        return $this->render(
            'second',
            [
                'content' => $content
            ]
        );

    }
}
