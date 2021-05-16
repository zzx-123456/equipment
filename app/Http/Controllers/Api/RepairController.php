<?php
/*
 * @Author: your name
 * @Date: 2021-05-08 15:55:57
 * @LastEditTime: 2021-05-10 09:35:15
 * @LastEditors: Please set LastEditors
 * @Description: In User Settings Edit
 * @FilePath: \testd:\phpstudy_pro\WWW\equipment\app\Http\Controllers\Api\RepairController.php
 */

namespace App\Http\Controllers\Api;

use App\Home\Repair;
use App\Http\Controllers\BaseController;
use App\Http\Requests\RepairRequest;

class RepairController extends BaseController
{
    //
    public function repair(RepairRequest $request)
    {
        $repair = new Repair();
        $repair -> eqm_id = $request -> input('eqm_id');
        $repair -> eqm_name = $request -> input('eqm_name');
        $repair -> fault = $request -> input('fault');
        $repair -> user_id = $request -> input('user_id');
        $repair -> save();
        return $this->response()->created();
    }
}
