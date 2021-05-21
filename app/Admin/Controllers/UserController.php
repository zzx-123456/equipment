<?php
/*
 * @Author: your name
 * @Date: 2021-04-15 23:29:03
 * @LastEditTime: 2021-05-20 19:54:18
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
        $grid->column('nickname', __('Nickname'));
        // $grid->column('password', __('Password'));
        $grid->column('avatar', __('Avatar'))->image(60, 60);
        $grid->column('sex', __('Sex'))->using(['1' => '女', '0' => '男']);
        $grid->column('phone', __('Phone'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        // 去掉默认的id过滤器
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->like('nickname', '昵称');
        });

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
        $show->field('nickname', __('Nickname'));
        // $show->field('password', __('Password'));
        $show->field('avatar', __('Avatar'))->image();
        $show->field('sex', __('Sex'))->using(['1' => '女', '0' => '男']);
        $show->field('phone', __('Phone'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

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
        $form->text('nickname', __('Nickname'));
        $form->password('password', __('Password'));
        $form->saving(function (Form $form) {
            if ($form->password && $form->model()->password != $form->password) {
                $form->password = bcrypt($form->password);
            }
        });
        $form->image('avatar', __('Avatar'));
        $form->radioButton('sex', __('Sex'))->options([
            '0' => '男',
            '1' => '女',
            ]);
        $form->mobile('phone', __('Phone'));

        return $form;
    }
}
