@extends('master') 
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Product</h1>
		</div>

		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="#"></a></li>
			</ol>
		</div>
		<div id="add_category_btn">
			<a href="{{ url('add-product') }}">
				<button type="button" style="background-color: burlywood;">Add Product</button>
			</a>
		</div>
	</div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<!-- Default box -->
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Product List</h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fas fa-minus"></i></button>								</div>
						</div>
						<?php
							$prod_data = DB::table("products")->get();
						?>
						<div class="card-body">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
						        <thead>
						            <tr>
						                <th>Name</th>
						                <th>Image</th>
						                <th>Price</th>
						                <th>Catgeory</th>
						                <th>Action</th>
						            </tr>
						        </thead>
						        <tbody>
						        	@foreach($prod_data as $val)				
						        	<?php
						        		$cat_name = DB::table('categories')->where('id','=',$val->cat_id)->first();
						        	?>            
						            <tr>
						                <td>{{ $val->prod_name }}</td>
						                <td>
						                	<img src="{{ asset('public/images/'.$val->img) }}" style="width: 50px; height: 50px;" />
						                </td>
						                <td>{{ $val->price }}</td>
						                <td>{{ $cat_name->name }}</td>
						                <td>
						                	<a href="{{ url('edit_prod', ['id'=>$val->id]) }}" id="btn_edit">
						                		<button type="button" name="editbutton">Edit</button>
						                	</a>
						                	<a href="{{ url('delete_prod', ['id'=>$val->id]) }}" id="btn_delete">
						                		<button type="button" name="editbutton">Delete</button>
						                	</a>
						                </td>
						            </tr>
						            @endforeach
						        </tbody>
						    </table>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							Category
						</div>
						<!-- /.card-footer-->
					</div>
					<!-- /.card -->
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection