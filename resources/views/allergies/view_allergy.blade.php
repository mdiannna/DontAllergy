@extends('backpack::layout')


@section('header')
    <section class="content-header">
        <h1>
            View allergy details
        </h1>
       
    </section>
@endsection

@section('content')
    <div class="row">

        <div class="col-md-12">
            
            <!-- Default box -->    
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><b>{{ $allergy->name }}</b></h3>
                    <!-- <div class="col-md-12"> -->
                </div>
                <div class="box-content">
                <div class="col-md-12">
                	
                </div>

     <div class="row form-group">
        <div class="col-md-4">
        <img  class="img img-fluid" src="../img/woman.jpg" style="margin-left: 25px; margin-right: 25px; width: 90%;">

              <!-- <img class="img-fluid" src="img/portfolio/01-thumbnail.jpg" alt=""> -->


        </div>
        <div class="col-md-6">
        @if($allergy->season)
	        <h3 style="color:Blue; font-family: Times New Roman, Times, serif" >Season</h3>
	        <p>{{$allergy->season->name}}</p>
	    @endif


        @if($allergy->symptoms)
	        <h3 style="color:Blue; font-family: Times New Roman, Times, serif" >Symptoms</h3>
	        <p>{{$allergy->symptoms}}</p>
	    @endif

        @if(count($allergy->allergens))
        <h3 style="color:Blue; font-family: Times New Roman, Times, serif" >Allergens</h3>


                						@foreach($allergy->allergens as $allergen)
                						<li> 

                						{{ $allergen->name}}
                					</li>
                						@endforeach
                					</li>
                					@endif

        </div>
					<!-- </div> -->
                </div>
			</div>
		</div>
	</div>                
@endsection
