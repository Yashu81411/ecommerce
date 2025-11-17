@extends('backend.layouts.master')
@section('title','E-SHOP || Brand Edit')
@section('main-content')

<div class="card">
    <h5 class="card-header">Edit Brand</h5>
    <div class="card-body">
     <form method="post" action="{{route('brand.update',$brand->id)}}">
        @csrf 
        @method('PATCH')

        <div class="form-group">
            <label for="inputTitle" class="col-form-label">Brand Name <span class="text-danger">*</span></label>
            <input id="inputTitle" type="text" name="title" placeholder="Enter Brand Name" value="{{$brand->title}}" class="form-control">
            @error('title')<span class="text-danger">{{$message}}</span>@enderror
        </div>

        <div class="form-group">
            <label for="name" class="col-form-label">Merchant Name</label>
            <input id="name" type="text" name="name" placeholder="Enter merchant name" value="{{$brand->name}}" class="form-control">
            @error('name')<span class="text-danger">{{$message}}</span>@enderror
        </div>

        <div class="form-group">
            <label for="contact_number" class="col-form-label">Contact Number</label>
            <input id="contact_number" type="text" name="contact_number" placeholder="Primary Phone" value="{{$brand->contact_number}}" class="form-control">
            @error('contact_number')<span class="text-danger">{{$message}}</span>@enderror
        </div>

        <div class="form-group">
            <label for="alt_number" class="col-form-label">Alternate Number</label>
            <input id="alt_number" type="text" name="alt_number" placeholder="Optional phone number" value="{{$brand->alt_number}}" class="form-control">
            @error('alt_number')<span class="text-danger">{{$message}}</span>@enderror
        </div>

        <div class="form-group">
            <label for="email" class="col-form-label">Email ID</label>
            <input id="email" type="email" name="email" placeholder="Enter email" value="{{$brand->email}}" class="form-control">
            @error('email')<span class="text-danger">{{$message}}</span>@enderror
        </div>

        <div class="form-group">
            <label for="address" class="col-form-label">Address</label>
            <textarea id="address" name="address" rows="3" class="form-control" placeholder="Enter address">{{$brand->address}}</textarea>
            @error('address')<span class="text-danger">{{$message}}</span>@enderror
        </div>

        {{-- -------------------- PHOTO SECTION ADDED -------------------- --}}
        <div class="form-group">
            <label for="inputPhoto" class="col-form-label">Brand Logo / Photo</label>
            <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$brand->photo}}">
            </div>

            <div id="holder" style="margin-top:15px; max-height:100px;">
                @if($brand->photo)
                    <img src="{{ $brand->photo }}" style="height: 100px;">
                @endif
            </div>

            @error('photo')<span class="text-danger">{{$message}}</span>@enderror
        </div>
        {{-- -------------------- END PHOTO SECTION -------------------- --}}

        <div class="form-group">
            <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
            <select name="status" class="form-control">
                <option value="active" {{ $brand->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $brand->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')<span class="text-danger">{{$message}}</span>@enderror
        </div>

        <div class="form-group mb-3">
            <button class="btn btn-success" type="submit">Update</button>
        </div>

     </form>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('backend/summernote/summernote.min.css')}}">
@endpush

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="{{asset('backend/summernote/summernote.min.js')}}"></script>

<script>
    $('#lfm').filemanager('image');
</script>

@endpush
