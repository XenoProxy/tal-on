@extends ('layouts.app')

@section('content')
<div class="container">
    <div class="edit-container">
            <h2 class="edit-create-head">Add New Polyclinic</h2>
            <div class="pull-right">
                <a class="btn btn-primary btn-back" href="{{ route('polyclinics.index') }}"> Back</a>
            </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('polyclinics.store') }}" method="post">
            @csrf
            <div class="form-container polyclinic-form">
                <div class="form-item">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            
                <div class="form-item">
                    <strong>Address:</strong>
                    <input type="text" class="form-control" name="detail" placeholder="Address"></input>
                </div>
            
                <div class="form-item">
                    <strong>Contacts:</strong>
                    <input type="tel" name="contacts" class="form-control" placeholder="Contacts">
                </div>
            
                <button type="submit" class="btn btn-primary admin-submit-btn">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection