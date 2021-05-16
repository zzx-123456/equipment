<?php
/*
 * @Author: your name
 * @Date: 2021-04-15 23:30:24
 * @LastEditTime: 2021-05-15 10:23:37
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Admin\Controllers\RepairController.php
 */

namespace App\Admin\Controllers;

use App\Home\Repair;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RepairController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '报修记录';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Repair());

        $grid->column('id', __('Id'));
        $grid->column('eqm_id', __('Eqm id'));
        $grid->column('fault', __('Fault'));
        $grid->column('submit_time', __('Submit time'));
        $grid->column('repair_state', __('Repair state'))
            ->using(['2' => '报废','1' => '已维修', '0' => '未维修']);
        $grid->column('repair_man', __('Repair man'));
        $grid->column('repair_time', __('Repair time'));
        $grid->column('user_id', __('User id'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Repair::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('eqm_id', __('Eqm id'));
        $show->field('fault', __('Fault'));
        $show->field('submit_time', __('Submit time'));
        $show->field('repair_state', __('Repair state'))
            ->using(['2' => '报废','1' => '已维修', '0' => '未维修']);;
        $show->field('repair_man', __('Repair man'));
        $show->field('repair_time', __('Repair time'));
        $show->field('user_id', __('User id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Repair());

        $form->number('eqm_id', __('Eqm id'));
        $form->text('fault', __('Fault'));
        $form->datetime('submit_time', __('Submit time'))->default(date('Y-m-d H:i:s'));
        $form->radioButton('repair_state', __('Repair state'))->options([
            '2' => '报废',
            '1' => '已维修', 
            '0' => '未维修'
            ]);
        $form->text('repair_man', __('Repair man'));
        $form->datetime('repair_time', __('Repair time'))->default(date('Y-m-d H:i:s'));
        $form->number('user_id', __('User id'));

        return $form;
    }
}
