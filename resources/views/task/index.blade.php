@extends('layouts.app')

@section('content')
    <div class="container">
        {{--错误信息--}}
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <strong>出现错误了呢~</strong>
            <hr>
            <ul>
                @foreach($errors as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        {{--添加任务--}}
        <div class="panel panel-primary">
            <div class="panel-heading">
                添加任务
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="/task" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="task" class="col-sm-3 control-label">我的任务</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" placeholder="11点前要睡觉~">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i> 确定添加
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Current Tasks -->
        @if (count($tasks) > 0)
            <div class="panel panel-success">
                <div class="panel-heading">
                    已有任务
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">

                        <!-- Table Headings -->
                        <thead>
                        <th>任务</th>
                        <th>操作</th>
                        </thead>

                        <!-- Table Body -->
                        <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>

                                <td>
                                    <form action="/task/{{ $task->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="submit" class="btn btn-danger" value="删除任务">
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

    </div>

@endsection