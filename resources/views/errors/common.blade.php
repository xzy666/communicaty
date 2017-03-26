@if (count($errors) > 0)
    <div class="form-group col-md-9 col-md-offset-1">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif