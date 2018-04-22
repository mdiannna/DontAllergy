@extends('backpack::layout')


@section('header')
    <section class="content-header">
        <h1>
            <b>{{ $allergy->name }}</b> - details
        </h1>
       
    </section>
@endsection

@section('content')
<div class="row">

	<div class="col-md-12">

		<!-- Default box -->    
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">View allergy details</h3>
			</div>
			<div class="box-content">
				<div class="col-md-12">

				</div>

				<div class="row form-group">
					<div class="col-md-4">
						<img  class="img img-fluid" src="../img/woman.jpg" style="margin-left: 25px; margin-right: 25px; width: 90%;">

					</div>
					<div class="col-md-6">
						<h3 style="color:Blue; font-family: Times New Roman, Times, serif" >Season</h3>
						@if($allergy->season)
						<p>{{$allergy->season->name}}</p>
						@else
							<p>No info.</p>
						@endif


						<h3 style="color:Blue; font-family: Times New Roman, Times, serif" >Symptoms</h3>
						@if($allergy->symptoms)
						<p>{{$allergy->symptoms}}</p>
						@else
							<p>No info.</p>
						@endif

						<h3 style="color:Blue; font-family: Times New Roman, Times, serif" >Allergens</h3>
						@if(count($allergy->allergens))
							@foreach($allergy->allergens as $allergen)
							<li> 
								{{ $allergen->name}}
							</li>
							@endforeach
						@else
							<p>No info.</p>
						@endif


						<h3 style="color:Blue; font-family: Times New Roman, Times, serif" >Foods</h3>
						@if(count($allergy->foods))
							@foreach($allergy->foods as $food)
							<li> 

								{{ $food->name}}
							</li>
							@endforeach
						@else
							<p>No info.</p>
						@endif

						<h3 style="color:Blue; font-family: Times New Roman, Times, serif" >Environment conditions</h3>
						@if(count($allergy->environmentConditions))
							@foreach($allergy->environment_conditions as $environmentCondition)
							<li> 

								{{ $environmentCondition->name}}
							</li>
							@endforeach
						@else
							<p>No info.</p>
						@endif

						<h3 style="color:Blue; font-family: Times New Roman, Times, serif" >Treatment</h3>
						@if($allergy->treatment)
							<p>{{$allergy->treatment}}</p>
						@else
							<p>No info.</p>
						@endif	

						<h3 style="color:Blue; font-family: Times New Roman, Times, serif" >Prevention</h3>
						@if($allergy->prevention)
							<p>{{$allergy->prevention}}</p>
						@else
							<p>No info.</p>
						@endif	
					
				</div>
				<!-- </div> -->
			</div>
		</div>
	</div>
</div>                
@endsection
