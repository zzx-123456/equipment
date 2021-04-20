<?php

namespace App\Admin\Controllers;

use App\Home\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('eqm_id', __('Eqm id'));
        $grid->column('order_num', __('Order num'));
        $grid->column('begin_time', __('Begin time'));
        $grid->column('end_time', __('End time'));
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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('eqm_id', __('Eqm id'));
        $show->field('order_num', __('Order num'));
        $show->field('begin_time', __('Begin time'));
        $show->field('end_time', __('End time'));
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
        $form = new Form(new Order());

        $form->number('eqm_id', __('Eqm id'));
        $form->number('order_num', __('Order num'));
        $form->datetime('begin_time', __('Begin time'))->default(date('Y-m-d H:i:s'));
        $form->datetime('end_time', __('End time'))->default(date('Y-m-d H:i:s'));
        $form->number('user_id', __('User id'));

        return $form;
    }
}
