<?php
/**
 * User: Xany <762632258@qq.com>
 * Date: 2018/1/4
 * Time: 16:14
 */

namespace app\modules\admin\controllers;


use app\modules\admin\models\DataGoodsForm;
use app\modules\admin\models\DataUserForm;

class DataController extends Controller
{
    public function actionGoods()
    {
        $form = new DataGoodsForm();
        $form->store_id = $this->store->id;
        $form->attributes = \Yii::$app->request->get();
        $arr = $form->search();
        return $this->render('goods', [
            'list' => $arr['list'],
            'pagination' => $arr['pagination'],
            'row_count' => $arr['row_count']
        ]);
    }

    public function actionUser()
    {
        $form = new DataUserForm();
        $form->store_id = $this->store->id;
        $form->attributes = \Yii::$app->request->get();
        $arr = $form->search();
        return $this->render('user', [
            'list' => $arr['list'],
            'pagination' => $arr['pagination'],
            'row_count' => $arr['row_count']
        ]);
    }
}