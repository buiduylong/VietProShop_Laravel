@extends('backend/master')
@section('title','Sửa thành viên')
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
                    Sửa thông tin thành viên
                </div>
                <div class="panel-body">
                    <form method="post">
                        @csrf
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            @if($errors->has('email'))
                            <div class="alert alert-danger">{{$errors->first('email')}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" class="form-control" value="{{ $user->password }}">
                            @if($errors->has('password'))
                            <div class="alert alert-danger">{{$errors->first('password')}}</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Quyền:</label>
                            <select required name="level" class="form-control">
                                <option value="1" @if($user->level == 1) selected @endif>Quản trị viên</option>
                                <option value="2" @if($user->level == 2) selected @endif>Thành viên</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="form-control btn btn-primary" value="Sửa">
                        </div>
                        <div class="form-group">
                            <a href="{{ asset('admin/user') }}" class="form-control btn btn-danger">Hủy</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div><!--/.row-->
</div>  <!--/.main-->
@endsection