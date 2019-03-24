@extends('layouts.start')

@section('content')
    <div class="row">
        <div class="col-xs-6">
            <div class="box box-solid">
                <div class="box-header">菜单列表</div>
                <div class="box-body">


                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width:20px">ID</th>
                                <th>栏目名称</th>
                                <th>访问路径</th>
                                <th>PID</th>
                                <th>Icon</th>
                                <th>图标</th>
                            </tr>
                            @foreach($menus as $menu)
                            <tr>
                                <td>{{$menu->id}}</td>
                                <td>{{$menu->title}}</td>
                                <td>{{$menu->url}}</td>
                                <td>{{$menu->pid}}</td>
                                <td>{{$menu->icon}}</td>
                                <td><span class="{{$menu->icon}}"></span></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="box box-success">
                <div class="box-header">菜单新增</div>
                <form class="form-horizontal" action="" method="post">
                    @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="pid" class="col-sm-2 control-label">PID</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pid" name="pid">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">标题</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="url" class="col-sm-2 control-label">URL</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="url" name="url">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="col-sm-2 control-label">Icon</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="icon" name="icon">
                        </div>
                    </div>
                        <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">添加</button>
                    </div>
                        <!-- /.box-footer -->
                </div>
                </form>
            </div>

        </div>
    </div>
@endsection