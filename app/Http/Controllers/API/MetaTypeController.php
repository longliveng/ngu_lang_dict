<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MetaTypeController extends Controller
{
    // 請求方法：get
    // group 在url 中
    // 參數： keyword
    public function listTree($group, Request $request){
        $result = \App\Models\Meta\MetaType::selectOptions(function ($query) use ($group){
            return $query->where(['group'=>$group]);
        },'');

        return $this->buildJson(true, '', $result);

    }

    public function list($group, Request $request){
        $result = DB::table('meta_type')->whereNull('deleted_at')->where('group', '=', $group)
        ->get(['type_id' ,'title'])->toArray();

        return $this->buildJson(true, '', $result);

    }
}
