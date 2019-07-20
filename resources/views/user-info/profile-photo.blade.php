@extends('user-info.modal')
@section('modal_title')
    Profile Photo Editing
@endsection

@section('modal_content')
    <form method="post" action="/add-personal-photo" accept-charset="UTF-8" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group row">
            <label for="personal_photo" class="col-md-2">Photo</label>
            <input type="file" class="col-md-8" id="personal_photo" name="personal_photo">
            <div class="img-container" style="width:100%; hieght:200px">
                <img src="$file != null ? $file : #" />
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-plus fa-fw"></i>Add</button>
    </form>
@endsection