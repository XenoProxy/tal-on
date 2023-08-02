@extends ('layouts.app')

@section('content')
<div class="comtainer">
    <div class="edit-container">
        <div class="col-lg-12 margin-tb">
                <h2 class="edit-create-head">Add New Doctor</h2>
            <div class="pull-right">
                <a class="btn btn-primary btn-back" href="{{ route('doctors.index') }}"> Back</a>
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

            <div class="form-container polyclinic-form">                
                    <div class="form-item">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                
                    <div class="form-item">
                        <strong>Field:</strong>
                        <input type="text" class="form-control" name="field" placeholder="Field">
                    </div>
                
                    <div class="form-item">
                        <strong>Office:</strong>
                        <input type="number" name="office" class="form-control" placeholder="Office">
                    </div>
                
                    <div class="form-item">
                        <label for="select"><strong>Polyclinic:</strong></label>
                        <select name="poly_id" class="select">
                            <option value="">Choose the polyclinic</option>
                            @foreach($polyclinics as $polyclinic)                        
                                <option value="{{ $polyclinic->id }}">{{ $polyclinic->name }}</option>
                            @endforeach
                        </select>                
                    </div>

                    <div class="form-item">
                        <strong>Info:</strong>
                        <textarea name="info" style="height:300px" class="form-control" placeholder="Info"></textarea>
                    </div>
                
                    <button type="submit" class="btn btn-primary admin-submit-btn">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection