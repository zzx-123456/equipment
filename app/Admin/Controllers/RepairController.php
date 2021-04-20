<?php

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
    protected $title = 'Repair';

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
        $grid->column('repair_state', __('Repair state'));
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
        $show->field('repair_state', __('Repair state'));
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
        $form->text('repair_state', __('Repair state'));
        $form->text('repair_man', __('Repair man'));
        $form->datetime('repair_time', __('Repair time'))->default(date('Y-m-d H:i:s'));
        $form->number('user_id', __('User id'));

        return $form;
    }
}
