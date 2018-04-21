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
                    <!-- <div class="col-md-12"> -->

                    <form action="/submit-allergy" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="allergy_id">What is your allergy?</label>
                           	<select id="allergy_id" class="form-control" name="allergy_id" required="required">
                            <option>-</option>
                          
                            @foreach ('App\Models\Allergy'::all() as $allergy)
                                <option value="{{$allergy->getKey()}}"
                                @if (old('allergy_id', '') !=  '')
                                    selected
                                @endif 
                                >
                                    {{ $allergy->name }}
                                </option>
                              @endforeach
                            </select>
                        </div>

                         <div class="form-group">
                            <label for="value">How many times did you have this allergy?</label>
                            <input id="value" class="form-control" type="number" name="value" min=1 placeholder="{{ __('value') }}" value="{{ old("value", "") }}" required="required">
                        </div>

                        <div class="form-group ">
                            <label for="country_id">The country in which you had the allergy</label>
                            <select id="country_id" class="form-control" name="country_id" required="required">
                            <option>-</option>
                          
                            @foreach ('App\Models\Country'::all() as $country)
                                <option value="{{$country->getKey()}}"
                                @if (old('country_id', '') !=  '')
                                    selected
                                @endif 
                                >
                                    {{ $country->name }}
                                </option>
                              @endforeach
                            </select>
                        </div>

                        <button class="btn btn-success" type="submit">Submit</button>
						<a href="{{ url()->previous() }}"  class="btn btn-danger">Cancel</a>
					</form>

					<!-- </div> -->
                </div>
			</div>
		</div>
	</div>                
@endsection
