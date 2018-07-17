<?php
/**
 * Created by PhpStorm.
 * User: defjia
 * Date: 18-6-6
 * Time: 下午5:04
 */
$name = Auth::user()->name;
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

<div class="card-header">面试官评论</div>
                <div class="container">
                    <table class="table table-sm table-hover">
                    <thead>
                        <th>面试官</th>
                        <th>评论</th>
                        <th>评分</th>
                        <th>打分习惯-平均分</th>
                        <th>方差</th>
                    </thead>
                    <tbody>
                        <?php
                        $id2 = $_GET['id'];
                        $data2 = DB::table('info')->where('id', $id2)->first()->name;
                        $data3 = DB::table('cmt')->where('eeid', $data2)->get();
                        foreach ($data3 as $er){
                            echo "<tr>";
                            echo "<td>".$er->erid."</td>";
                            echo "<td>".$er->cmt."</td>";
                            echo "<td>".$er->pts."</td>";
			    $ad = DB::table('users')->where('name', $er->erid)->first();
			    echo sprintf("<td>%.2f</td>", $ad->average);
                            echo sprintf("<td>%.2f</td>", $ad->D);
 //                           echo "<td>".$ad->average."</td>";
   //                         echo "<td>".$ad->D."</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                    </table>
                </div>

                <div class="card-header">面试信息</div>
                <div class="container">
                    <table class="table table-sm table-hover">

                        <tbody>
                        <?php
                                $id = $_GET['id'];
                        $data = DB::table('info')->where('id', $id)->get();

                        $arr = array('序号', '姓名', '性别',  '电话','照片', '现在职位', '第一志愿', '第二志愿', '是否服从调剂', '校区', '工作时长', '个人介绍', '网协看法', '是否留任其他组织', '当今存在的问题', '面试房间', '面试时间', '面试日期');
                        $i = 0;
                        foreach ($data as $elem){
                            foreach ($elem as $item){
                                if($i==1) $eeid = $item;
                                echo "<tr><td style='white-space:nowrap'>".$arr[$i++]."</td>";
                                echo "<td style='text-align: left'>".$item."</td></tr>";
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

                {{ Form::open(array('action' => 'DBController@write')) }}
                {{Form::label('d', '注：百分制，没有统一标准，但每个人打分标准应统一。', ['class' => 'alert alert-info'])}}
                {{Form::radio('id', $eeid, true)}}
                <br>
                {{Form::label('pts', '评分', ['class' => ''])}}
                {{Form::number('pts')}}
                <br>
                {{Form::label('cmt', '评论', ['class' => ''])}}
                {{Form::textarea('cmt')}}
                <hr>
                {{Form::submit('提交', ['class' => 'btn btn-primary my_submit'])}}
                {{Form::close()}}
                <br/>
            </div>
        </div>
    </div>

@endsection
