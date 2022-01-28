@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile Image</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('profileimage.update', [$profileImage])}}" enctype="multipart/form-data"> {{-- bet koki faila uzkoduoja kaip teksta--}}
                            @csrf
    
                            <div class="row mb-3">
                                <label for="image_alt" class="col-md-4 col-form-label text-md-end">Image Alt</label>
    
                                <div class="col-md-6">
                                    <input id="image_alt" type="text" class="form-control" value={{$profileImage->alt}} name="image_alt" required autofocus>
    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image_src" class="col-md-4 col-form-label text-md-end">Image</label>
    
                                <div class="col-md-6">
                                    <input id="image_src" type="file" class="form-control" value={{$profileImage->src}} name="image_src" autofocus>
    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image_width" class="col-md-4 col-form-label text-md-end">Image Width</label>
    
                                <div class="col-md-6">
                                    <input id="image_width" type="number" min="0" max="200" step="10" class="form-control" value={{$profileImage->width}} name="image_width" required autofocus>
    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image_height" class="col-md-4 col-form-label text-md-end">Image Height</label>
    
                                <div class="col-md-6">
                                    <input id="image_height" type="number" min="0" max="200" step="10" class="form-control" value={{$profileImage->height}} name="image_height" required autofocus>
    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image_class" class="col-md-4 col-form-label text-md-end">Image Class</label>
    
                                <div class="col-md-6">
                                    <input id="image_class" type="text" class="form-control" value={{$profileImage->class}} name="image_class" required autofocus>
    
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection