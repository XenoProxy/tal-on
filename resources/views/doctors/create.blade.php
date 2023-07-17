@extends ('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Docotr</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('doctors.index') }}"> Back</a>
        </div>
    </div>
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

<form action="{{ route('doctors.store') }}" method="post">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Field:</strong>
                <input type="text" class="form-control" name="field" placeholder="Field">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Office:</strong>
                <input type="number" name="office" class="form-control" placeholder="Office">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Polyclinic:</strong>
                <select name="poly_id" class="field-filter">
                    <option value="">-- Choose the polyclinic --</option>
                    @foreach($polyclinics as $polyclinic)                        
                        <option value="{{ $polyclinic->id }}">{{ $polyclinic->name }}</option>
                    @endforeach
                </select>                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Info:</strong>
                <textarea name="info" style="height:300px" class="form-control" placeholder="Info"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection