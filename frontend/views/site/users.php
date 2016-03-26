<?php
Yii::$app->layout = 'user\main';
?>
<div class="clearfix"></div>

<?php if (!empty(Yii::$app->user->can('Admin'))): ?>
    <?php $pro = \common\models\Personnel::find()->where(['user_id' => Yii::$app->user->id])->all(); ?>
    <div class="portlet portlet-green box">

        <div class="portlet-body">

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron text-center">
                <?php foreach ($pro as $pros): ?>
                    <blockquote>
                        <h1>ยินดีต้อนรับคุณ <?= $pros->fullName ?> </h1>
                        <p>ผู้ที่ลงทะเบียนเรียนแล้ว สามารถนำใบเสร็จ ไปรับหนังสือเรียนได้สถาบัน...</p>
                        <footer class="text-right">สถาบัณกวดวิชาบ้านครูติกติวเตอร์</footer>
                    </blockquote>


                    <p class="text-center"><a href="<?= \yii\helpers\Url::to(['register-course/index']) ?>"
                                              class="btn btn-primary btn-lg" role="button"> ลงทะเบียนเรียน &raquo;</a>
                    </p>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
<?php else: ?>

    <?php $pro = \common\models\Student::find()->where(['user_id' => Yii::$app->user->id])->all(); ?>
    <div class="portlet portlet-green box">

        <div class="portlet-body">

            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class="jumbotron text-center">
                <?php foreach ($pro as $pros): ?>
                    <blockquote>
                        <h1>ยินดีต้อนรับคุณ <?= $pros->Name ?> </h1>
                        <p>ผู้ที่ลงทะเบียนเรียนแล้ว สามารถนำใบเสร็จ ไปรับหนังสือเรียนได้สถาบัน...</p>
                        <footer class="text-right">สถาบัณกวดวิชาบ้านครูติกติวเตอร์</footer>
                    </blockquote>


                    <p class="text-center"><a href="<?= \yii\helpers\Url::to(['register-course/index']) ?>"
                                              class="btn btn-primary btn-lg" role="button"> ลงทะเบียนเรียน &raquo;</a>
                    </p>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

<?php endif; ?>
<!-- /.row -->




