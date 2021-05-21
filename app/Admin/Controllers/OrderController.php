<?php
/*
 * @Author: your name
 * @Date: 2021-04-15 23:30:04
 * @LastEditTime: 2021-05-20 22:43:12
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Admin\Controllers\OrderController.php
 */

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
    protected $title = '预约记录';

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
        $grid->column('eqm_name', __('Eqm name'));
        $grid->column('date', __('Date'));
        $grid->column('time', __('Time'))->using(['1' => '上午 8:00-11:00', '2' => '下午 14:00-17:00']);
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
        $show->field('eqm_name', __('Eqm name'));
        $show->field('date', __('Date'));
        $show->field('time', __('Time'))->using(['1' => '上午 8:00-11:00', '2' => '下午 14:00-17:00']);
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
        $form->number('eqm_name', __('Eqm name'));
        $form->datetime('date', __('Date'))->default(date('Y-m-d H:i:s'));
        $form->radioButton('time', __('Time'))->options([
            '1' => '上午 8:00-11:00', 
            '2' => '下午 14:00-17:00'
            ]);
        $form->number('user_id', __('User id'));

        return $form;
    }
}
