@extends('layout')
@section('content')
			<!-- section start -->
			<!-- ================ -->
			<div class="light-gray-bg section">
				<div class="container">
					<!-- filters start -->
					<!-- @include('partials.filter')-->
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
                                        <th>Diseño</th>
                                        <th>Original</th>
                                        <th>Cantidad</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                   @foreach($repuests as $repuest)
                                    <tr >

                                        <td>{{$repuest->Design}}</td>
                                        <td>{{$repuest->Articulo}}</td>
                                        <td>10</td>
                                        <td> <a href="#" class="btn btn-default">Pedir</a></td>

                                    </tr>
                                    @endforeach
                                   
                                    
                                  
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
		

