<?php
// $name = Auth::user()->name;
// $data = DB::table('users')->where('name', $name);
?>
@extends('layouts.app')

@if(Session::has('message'))
    <script type="text/javascript">
        alert('{{Session::get('message')}}');
    </script>
@endif

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">

    <div class="card-header">名单列表</div>
    <div class="container">
        <table class="table table-sm table-hover">
            <thead>
            <th>序号</th>
	    <th>日期</th>
<th>教室</th>
            <th>时间</th>
            <th>姓名</th>
            <th>电话</th>
            <th>志愿1</th>
            <th>志愿2</th>
            <th>操作</th>
            </thead>
            <tbody>
<?php
    $name = Auth::user()->name;
// $data = DB::table('info')->get();
$data = DB::select('select * from info where campus = :campus', ['campus' => '1']);
        // var_dump($data);
        foreach ($data as $elem){
            echo "<tr>";
            echo "<td>".$elem->id."</td>";
	    echo "<td>".$elem->note."</td>";
	    echo "<td>".$elem->room."</td>";
            echo "<td>".$elem->time."</td>";
            echo "<td>".$elem->name."</td>";
            echo "<td>".$elem->phone."</td>";
            echo "<td>".$elem->first."</td>";
            echo "<td>".$elem->second."</td>";
            echo "<td><a href='info?id=".$elem->id."'><button class='btn btn-info'>开始面试</button></a></td>";
            echo "</tr>";
        }
?>
            </tbody>
    </div>
</div>
</div>
</div>

@endsection
