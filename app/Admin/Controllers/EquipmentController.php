<?php
/*
 * @Author: your name
 * @Date: 2021-04-15 23:29:40
 * @LastEditTime: 2021-04-24 09:36:37
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Admin\Controllers\EquipmentController.php
 */

namespace App\Admin\Controllers;

use App\Home\Equipment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EquipmentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '设备';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Equipment());

        $grid->column('id', __('Id'));
        $grid->column('eqm_name', __('Eqm name'));
        $grid->column('eqm_type', __('Eqm type'));
        $grid->column('eqm_state', __('Eqm state'));
        $grid->column('eqm_num', __('Eqm num'));
        $grid->column('place', __('Place'));
        $grid->column('photo', __('Photo'));
        $grid->column('describe', __('Describe'));

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
        $show = new Show(Equipment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('eqm_name', __('Eqm name'));
        $show->field('eqm_type', __('Eqm type'));
        $show->field('eqm_state', __('Eqm state'));
        $show->field('eqm_num', __('Eqm num'));
        $show->field('place', __('Place'));
        $show->field('photo', __('Photo'));
        $show->field('describe', __('Describe'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Equipment());

        $form->text('eqm_name', __('Eqm name'));
        $form->text('eqm_type', __('Eqm type'));
        $form->text('eqm_state', __('Eqm state'));
        $form->number('eqm_num', __('Eqm num'));
        $form->text('place', __('Place'));
        $form->image('photo', __('Photo'));
        $form->text('describe', __('Describe'));

        return $form;
    }
}
