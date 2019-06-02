@extends('backend/master')
@section('title','Sửa danh mục')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh mục sản phẩm</h1>
		</div>
	</div><!--/.row-->
	
	<div class="row">
		<div class="col-xs-12 col-md-5 col-lg-5">
			<div class="panel panel-primary">
				<div class="panel-heading">
					Sửa danh mục
				</div>
				<div class="panel-body">
					<form method="post">
						@csrf
						<div class="form-group">
							<label>Tên danh mục:</label>
							<input type="text" name="name" class="form-control" value="{{ $cate->cate_name }}">
							@if($errors->has('name'))
							<div class="alert alert-danger">{{$errors->first('name')}}</div>
							@endif
						</div>
						<div class="form-group">
							<input type="submit" name="submit" class="form-control btn btn-primary" value="Sửa">
						</div>
						<div class="form-group">
							<a href="{{ asset('admin/category') }}" class="form-control btn btn-danger">Hủy</a>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div><!--/.row-->
</div>	<!--/.main-->
@endsection