@extends('master') 
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1>Category</h1>
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
					<h3 class="card-title">Add Category</h3>

					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
							<i class="fas fa-minus"></i></button>								</div>
						</div>
						<div class="card-body">
							<form action="{{ url('insert_category_data') }}" method="post" id="add_category_form" enctype="multipart/form-data">
								@csrf
						        <div class="form-row">
						            <div class="form-group col-sm-6">
						                <label for="category">Category</label>
						                <input type="text" class="form-control" id="category" name="category" required="">
						            </div>
						            <div class="form-group col-sm-6">
						                <label for="cat_img">Image</label>
						                <input type="file" class="form-control" id="cat_img" name="cat_img" required="">
						            </div>
						            <div class="form-group">
						            	<input type="submit" class="form-control" id="btncat_submit" name="btncat_submit" value="Submit">
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