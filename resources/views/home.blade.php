@extends('layouts.app')

@section('content')

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
                    <th>name</th>
                    <th>age</th>
                    <th>virtual id</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                </tr>
                <tr>
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                </tr>
                <tr>
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                </tr>
                <tr>
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                    <td>123</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
