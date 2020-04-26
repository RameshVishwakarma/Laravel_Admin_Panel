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
					<h3 class="card-title">Add Product</h3>

					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fas fa-minus"></i></button>								</div>
						</div>
						<?php
							$cat_data = DB::table('categories')->get();
						?>
						<div class="card-body">
							<form action="{{ url('insert_product') }}" method="post" id="add_category_form" enctype="multipart/form-data">
								@csrf
						        <div class="form-row">
						            <div class="form-group col-sm-6">
						                <label for="category">Select Category</label>
						                <select class="form-control" id="select_category" name="select_category" required="">
						                	@foreach($cat_data as $val)
						                	<option value="{{ $val->id }}">{{ $val->name }}</option>
						                	@endforeach	
						                </select>
						            </div>
						            <div class="form-group col-sm-6">
						                <label for="cat_img">Name</label>
						                <input type="text" class="form-control" id="prod_name" name="prod_name" required="">
						            </div>
						            						            
						        </div>
						        <div class="form-row">
						            <div class="form-group col-sm-6">
						                <label for="cat_img">Image</label>
						                <input type="file" class="form-control" id="prod_img" name="prod_img" required="">
						            </div>
						            <div class="form-group col-sm-6">
						                <label for="category">Price</label>
						                <input type="text" class="form-control" id="prod_price" name="prod_price" required="">
						            </div>
						            <div class="form-group">
						            	<input type="submit" class="form-control" id="btnprod_submit" name="btnprod_submit" value="Submit">
						            </div>						            
						        </div>
						    </form>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							Footer
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