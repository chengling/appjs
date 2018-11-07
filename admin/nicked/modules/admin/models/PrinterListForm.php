<?php
/**
 * User: Xany <762632258@qq.com>
 * Date: 2017/12/1
 * Time: 11:26
 */

namespace app\modules\admin\models;


use app\models\Printer;
use yii\data\Pagination;

class PrinterListForm extends Model
{
    public $store_id;

    public $page;
    public $limit;
    public $keyword;


    public function rules()
    {
        return [
            [['page'],'default','value'=>1],
            [['page'],'default','value'=>20],
            [['keyword'],'string'],
            [['keyword'],'trim'],
        ];
    }

    public function search()
    {
        if(!$this->validate()){
            return $this->getModelError();
        }
        $query = Printer::find()->where(['store_id'=>$this->store_id,'is_delete'=>0]);

        $count = $query->count();
        $p = new Pagination(['totalCount'=>$count,'pageSize'=>$this->limit]);
        $list = $query->offset($p->offset)->limit($p->limit)->orderBy(['addtime'=>SORT_DESC])->asArray()->all();

        return [
            'list'=>$list,
            'pagination'=>$p,
            'row_count'=>$count
        ];
    }
}