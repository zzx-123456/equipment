<?php
/*
 * @Author: your name
 * @Date: 2021-05-10 09:16:52
 * @LastEditTime: 2021-05-10 09:28:07
 * @LastEditors: your name
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Http\Requests\RepairRequest.php
 */


namespace App\Http\Requests;


class RepairRequest extends BaseRequest
{
    
    /**
     * 用户登录
     */
    public function rules()
    {
        return [
            //验证规则
            'eqm_id' => 'required|exists:equipment,id',
            'eqm_name' => 'required',
            'fault' => 'required'
        ];
    }
}
