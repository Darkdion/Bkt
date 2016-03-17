<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index ">

    <div class="jumbotron">
        <blockquote>
            <h1>โรงเรียนกวดวิชาบ้านครูติ๊กติวเตอร์!</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
            <footer>Someone famous in <cite title="Source Title">Source Title</cite></footer>
        </blockquote>



        <p class="lead">เรียนสนุกลุกนั่งสบาย อยากให้เก่ง ต้องบ้านครูติ๊กติวเตอร์</p>


    </div>

    <div class="body-content">



    </div>
</div>

<button type="button" id="myButton" data-loading-text="Loading..." class="btn btn-primary" autocomplete="off">
    Loading state
</button>
<?php
echo \yii\bootstrap\Button::widget([
    'id'=>'myButton',
    'label' => 'Action',
    'options' => [

        'class' => 'btn btn-primary',
        'data-loading-text'=>'Loading...',
        'autocomplete'=>'off',

    ],
]);
$this->registerJs(
"


"

);
?>
<a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Link with href
</a>

<div class="collapse" id="collapseExample">
    <div class="well">
       2555
    </div>
</div>

<script>
    $('#myButton').on('click', function () {
        var $btn = $(this).button('loading')
        // business logic...
        $btn.button('reset')
    })
</script>