@extends ('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="data-table">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Name</td>
                                <td>Created at</td>
                                <td>Updated at</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allergies as $allergy)
                            <tr>
                                <td>{{ $allergy->id }}</td>
                                <td>{{ $allergy->name }}</td>
                                <td>{{ $allergy->created_at }}</td>
                                <td>{{ $allergy->updated_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection