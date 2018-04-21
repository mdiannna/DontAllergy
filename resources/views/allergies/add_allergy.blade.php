@extends('backpack::layout')


@section('header')
    <section class="content-header">
        <h1>
            Allergy questionnaire
        </h1>
       
    </section>
@endsection

@section('content')
    <div class="row">

        <div class="col-md-12">
            
            <!-- Default box -->    
            <div class="box">
                <div class="box-header with-border">
                    <!-- <h3 class="box-title">Allergy questionnaire</h3> -->
                    <div class="col-md-12">
					<div class="card">
					<!-- 	<div class="card-header">
							<div class="card-title">Allergy Questionnaire </div>
						</div> -->
						<div class="card-body">
							<div class="form-group">
							<text> What is your allergy? </text>
								<select class="form-control input-square" id="squareSelect">
									<option>Alergie 1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
								</select>
							</div>
							<div class="form-group">
								<text> How often do you have the symptoms of your allergy? </text>
								<input type="text" class="form-control input-square" id="squareInput" placeholder="">
							</div>
							<div class="form-group">
								<text>The country in which you had the allergy </text>
								<input type="text" class="form-control input-square" id="squareInput" placeholder="">
							</div>	
						</div>
						<div class="card-action">
							<button class="btn btn-success">Submit</button>
							<button class="btn btn-danger">Cancel</button>
						</div>
					</div>
                </div>
			</div>
		</div>
	</div>                
@endsection
