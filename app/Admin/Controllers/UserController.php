<?php
/*
 * @Author: your name
 * @Date: 2021-04-15 23:29:03
 * @LastEditTime: 2021-04-24 09:36:11
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Admin\Controllers\UserController.php
 */

namespace App\Admin\Controllers;

use App\Home\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('user_name', __('User name'));
        $grid->column('name', __('Name'));
        $grid->column('password', __('Password'));
        $grid->column('avatar', __('Avatar'));
        $grid->column('sex', __('Sex'));
        $grid->column('phone', __('Phone'));
        $grid->column('reg_time', __('Reg time'));

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_name', __('User name'));
        $show->field('name', __('Name'));
        $show->field('password', __('Password'));
        $show->field('avatar', __('Avatar'));
        $show->field('sex', __('Sex'));
        $show->field('phone', __('Phone'));
        $show->field('reg_time', __('Reg time'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('user_name', __('User name'));
        $form->text('name', __('Name'));
        $form->password('password', __('Password'));
        $form->saving(function (Form $form) {
            if ($form->password && $form->model()->password != $form->password) {
                $form->password = bcrypt($form->password);
            }
        });
        $form->image('avatar', __('Avatar'));
        $form->text('sex', __('Sex'));
        $form->mobile('phone', __('Phone'));
        $form->datetime('reg_time', __('Reg time'))->default(date('Y-m-d H:i:s'));

        return $form;
    }
}
