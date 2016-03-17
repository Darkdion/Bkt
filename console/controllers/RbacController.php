<?php
namespace console\controllers;

use Yii;
use yii\helpers\Console;

class RbacController extends \yii\console\Controller
{

    // public all actionInit(){
    //   Console::output('Yii 2 Learning.');
    // }

    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
        Console::output('Removing all! RBAC.....');

        $rule = new \common\rbac\AuthorRule;
        $auth->add($rule);

         $loginFnd= $auth->createPermission('LoginFnd');
        $loginFnd->description = 'ล็อกอินเข้าใช้งานส่วน frontend';
         $auth->add($loginFnd);

        $Admin = $auth->createRole('Admin');
        $Admin->description = 'ผู้ดูแลระบบ';
        $auth->add($Admin);

        $manager = $auth->createRole('Manager');
        $manager->description = 'พนักงาน';
        $auth->add($manager);

        $user = $auth->createRole('User');
        $user->description = 'สมาชิก';
        $auth->add($user);

        $auth->addChild($loginFnd, $user);
        $auth->addChild($Admin, $manager);
        $auth->addChild($Admin, $user);
        $auth->addChild($manager, $user);


        $auth->assign($Admin, 1);
        $auth->assign($manager, 2);
        $auth->assign($user, 3);
        //$auth->assign($author, 4);

        Console::output('Success! RBAC roles has been added.');

    }


}

?>
