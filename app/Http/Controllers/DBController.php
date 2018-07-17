<?php
/**
 * Created by PhpStorm.
 * User: defjia
 * Date: 18-5-10
 * Time: 上午8:20
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Auth;
use Illuminate\Validation\Rules\In;
use function PHPSTORM_META\type;

class DBController extends Controller {

    public function write(){
        $name = Auth::user()->name;
        $pts = Input::get('pts');
        $cmt = Input::get('cmt');
        $eeid = Input::get('id');
        DB::table('cmt')->insert(['eeid'=>$eeid, 'erid'=>$name, 'pts'=>$pts, 'cmt'=>$cmt]);
        return redirect('/home')->with('message', '面试结果提交成功！');
    }


}
