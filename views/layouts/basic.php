<?php
use app\assets\AppAsset;
use yii\bootstrap\NavBar;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;

/**
 *
 * @var $content string
 * @var $this \yii\web\View
 */
AppAsset::register($this);
$this->beginPage();

?>
    <!doctype html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <?= Html::csrfMetaTags() ?>
        <meta charset="<?= Yii::$app->charset ?>">
        <?php $this->registerMetaTag(['name' => 'viewport',
            'content' => 'width=device-width,
                                 initial-scale=1']) ?>
        <meta http-equiv="X-UA-Compatible" content="ie=">
        <title><?= Yii::$app->name ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody(); ?>

    <div class="wrap">
        <?php
        NavBar::begin(

            [
                'brandLabel' => 'Тестовое приложение'
            ]
        );

        $menuItems = [
            [
                'label' => 'Из коробки <span class="glyphicon glyphicon-inbox"></span>',
                'items' => [
                    '<li class="dropdown-header">Расширения</li>',
                    '<li class="divider"></li>',
                    [
                        'label' => 'Перейти к просмотру',
                        'url' => ['/widget-test/index']
                    ],
                    [
                        'label' => 'Документация',
                        'url' => ['www.yiiframework.com']
                    ]
                ]
            ],

            '<li>
                <a data-toggle="modal" data-target="#modal" style="cursor: pointer">
                О проекте <span class="glyphicon glyphicon-question-sign"></span>
                
                </a>


                </li>'
        ];

        if(Yii::$app->user->isGuest):
            $menuItems[] = ['label' => 'Регистрация', 'url' => ['/main/reg']];
            $menuItems[] = ['label' => 'Войти', 'url' => ['/main/login']];
            else:
            $menuItems[] = [ 'label' => 'Выйти('. Yii::$app->user->identity['username'].')',
                'url' => ['main/logout'],
                'linkOptions' => ['data-method' => 'post']
                    ];

                endif;

        echo Nav::widget([


                 'items' => $menuItems,
                 'activateParents' => true,
                'encodeLabels' => false,
                'options' => [
                    'class' => 'navbar-nav navbar-right'
                ]




        ]);

        Modal::begin([

            'header' => '<h2>phpNT</h2>',
            'id' => 'modal'
        ]);
        echo 'Проект для продвинутых разработчиков.';
        Modal::end();
        ActiveForm::begin([
            'action' =>
                ['/найти'],
            'method' => 'get',
            'options' =>
                ['class' => 'navbar-form navbar-right']
        ]);

        echo "<div class='input-group input-group-sm'>";

        echo Html::input(

            'type: text',
            'search',
            '',
            [
                'placeholder' => 'Найти...',
                'class' => 'form-control'
            ]

        );

        echo '<span class="input-group-btn">';

        echo Html::submitButton(
            '<span class="glyphicon glyphicon-search"></span>',

            [
                'class' => 'btn btn-success',
                'onClick' => 'window.location.href =
                 this.form.action + "-" + this.form.search.value.replace(/[^\w\а-яё\А-яё]+/g, "-") + ".html";'
            ]
        );

        echo '</span></div>';

        ActiveForm::end();
        NavBar::end();
        ?>

        <div class="container">
            <?= $content ?>

        </div>

    </div>

    <footer class="footer">
        <div class="container">
        <span class="badge">
            <span class="glyphicon glyphicon-copyright-mark"></span>phpNT<?= date('Y') ?>
        </span>


        </div>
    </footer>


    <?php $this->endBody(); ?>
    </body>
    </html>
<?php
$this->endPage();


































