@extends('backpack::layout')

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<style type="text/css">
	.btn-group-vertical>.btn-group:after, .btn-group-vertical>.btn-group:before, .btn-toolbar:after, .btn-toolbar:before, .clearfix:after, .clearfix:before, .container-fluid:after, .container-fluid:before, .container:after, .container:before, .dl-horizontal dd:after, .dl-horizontal dd:before, .form-horizontal .form-group:after, .form-horizontal .form-group:before, .modal-footer:after, .modal-footer:before, .modal-header:after, .modal-header:before, .nav:after, .nav:before, .navbar-collapse:after, .navbar-collapse:before, .navbar-header:after, .navbar-header:before, .navbar:after, .navbar:before, .pager:after, .pager:before, .panel-body:after, .panel-body:before, .row:after, .row:before {
	    display: none !important;
	    content: "" !important;
	}
</style>

</head>

@section('header')
        <section class="content-header">
            <h1>
                My allergies 
                @if(isset($optionalString))
                {{$optionalString}}
                @endif
            </h1>
           
        </section>
@endsection

@section('content')
    <div class="row">

        <div class="col-md-12">
            
            <!-- Default box -->    
            <div class="box">
                <!-- <div class="box-header with-border">
             <h3 class="box-title">My allergies</h3>
                </div> -->
                <div class="box-body with-border">
           		@if(!count($allergies)) 
           		<p>You don't have any allergies.</p>
    			<a href="/add-allergy" class="btn btn-primary"><i class="fa fa-plus"></i> Add allergy</a>

           		@endif

                @foreach($allergies as $allergy)
                <div class="form-group col-md-3">
                	@if($allergy->season->name == 'Winter')
                	<div class="card text-white bg-primary">
                	@elseif($allergy->season->name == 'Spring')
                	<div class="card text-white bg-success">
                	@elseif($allergy->season->name == 'Summer')
                	<div class="card text-white bg-danger">
                	@elseif($allergy->season->name == 'Fall')
                	<div class="card text-white bg-warning">
                	@else
                	<div class="card text-white bg-dark">
                	@endif
                		<div class="card-header text-center">{{ $allergy->name }} </div>
                		<div class="card-body">
                			<p class="card-text">
                				<ul>
                					<li> 
                						<b>Season: </b>{{ $allergy->season->name }}
                					</li>
                					@if($allergy->symptoms)
                					<li> 
                						<b>Symptoms: </b> {{ $allergy->symptoms}}
                					</li>
                					@endif
									@if(count($allergy->three_allergens))
                					<li> 
                						<b>Allergens: </b> 

                						@foreach($allergy->three_allergens as $allergen)
                						<br>
                						&nbsp;&nbsp;&nbsp;&nbsp;{{ $allergen->name}}
                						@endforeach
                						...
                					</li>
                					@endif

                				</ul>
                			</p>
                			<a href="/view-allergy/{{$allergy->id}}" class="btn btn-primary pull-right">View more</a>
                		</div>
                	</div>
                </div>
                @endforeach



			</div>
		</div>
	</div>                

@endsection
