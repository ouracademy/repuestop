@extends('InProcess.layout')
@section('content')
			<!-- section start -->
			<!-- ================ -->
			<div class="light-gray-bg section">
				<div class="container">
					<!-- filters start -->
					<div class="sorting-filters text-center mb-20">
						<form class="form-inline">
							<div class="form-group">
								<label>Sort by</label>
								<select class="form-control">
									<option selected="selected">Date</option>
									<option>Price</option>
									<option>Model</option>
								</select>
							</div>
							<div class="form-group">
								<label>Order</label>
								<select class="form-control">
									<option selected="selected">Acs</option>
									<option>Desc</option>
								</select> 
							</div>
							<div class="form-group">
								<label>Price $ (min/max)</label>
								<div class="row grid-space-10">
									<div class="col-sm-6">
										<input type="text" class="form-control">
									</div>
									<div class="col-sm-6">
										<input type="text" class="form-control col-xs-6">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Category</label>
								<select class="form-control">
									<option selected="selected">Smartphones</option>
									<option>Tablets</option>
									<option>Smart Watches</option>
									<option>Desktops</option>
									<option>Software</option>
									<option>Accessories</option>
								</select> 
							</div>
							<div class="form-group">
								<a href="#" class="btn btn-default">Submit</a>
							</div>
						</form>
					</div>
					<!-- filters end -->
				</div>
			</div>
			<!-- section end -->

			<!-- main-container start -->
			<!-- ================ -->
			<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-12">
						
						 <div class="panel-body">
                            <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Diseño</th>
                                        <th>Giro</th>
                                        <th>M.Interior</th>
                                        <th>M.Exterior</th>
                                        <th>M.Altura</th>
                                        <th>Original</th>
                                        <th>Aplicacion</th>
                                         <th>Marca</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                   
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Mozilla 1.8</td>
                                        <td>Win 98+ / OSX.1+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                        <th>CSS grade</th>
                                        <th>CSS grade</th>
                                        <th>CSS grade</th>
                                        <th>CSS grade</th>
                                    </tr>
                                   
                                    
                                  
                                </tbody>
                            </table>
                        </div>

				

					</div>
				</div>
			</section>
			<!-- main-container end -->
@endsection
@section('ownerScript')

		$(document).ready(function() {
			
			TableManageResponsive.init();
		});
@endsection
		

