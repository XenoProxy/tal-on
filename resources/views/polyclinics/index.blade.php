@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Polyclinics') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contacts</th>
                        </tr>
                        
                        @foreach ($polyclinics as $polyclinic)
                        <tr>
                            <td>{{ $polyclinic->name }}</td>
                            <td>{{ $polyclinic->address }}</td>
                            <td>{{ $contacts[$loop->index] }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
