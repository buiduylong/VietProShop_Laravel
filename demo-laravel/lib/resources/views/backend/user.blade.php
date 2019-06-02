@extends('backend/master')
@section('title','Quản lý thành viên')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý thành viên</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-5 col-lg-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Thêm thành viên
                </div>
                <div class="panel-body">
                    <form method="post">
                        @csrf
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" placeholder="Email..." value="{{ old('email') }}">
                            @if($errors->has('email'))
                            <div class="alert alert-danger">{{$errors->first('email')}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="text" name="password" class="form-control" placeholder="Password..." value="{{ old('password') }}">
                            @if($errors->has('password'))
                            <div class="alert alert-danger">{{$errors->first('password')}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Quyền:</label>
                            <select required name="level" class="form-control">
                                <option value="0" selected="unselect">Lựa chọn quyền</option>
                                <option value="1">Quản trị viên</option>
                                <option value="2">Thành viên</option>
                            </select>
                            @if($errors->has('level'))
                            <div class="alert alert-danger">{{$errors->first('level')}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Thêm thành viên">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-7 col-lg-7">
            <div class="panel panel-primary">
                <div class="panel-heading">Danh sách thành viên</div>             
                @if(session('thongbao'))
                <div class="alert alert-success">{{session('thongbao')}}</div>
                @endif
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-primary">
                                    <th>Email</th>
                                    <th style="width:20%">Quyền</th>
                                    <th style="width:25%">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userlist as $user)
                                <tr>
                                    <td>{{ $user->email }}</td>
                                    <td>@if($user->level == 1) {{ 'Quản trị viên' }}
                                        @else
                                        {{ 'Thành viên' }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ asset('admin/user/edit/'.$user->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
                                        <a href="{{ asset('admin/user/delete/'.$user->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>  <!--/.main-->
@endsection