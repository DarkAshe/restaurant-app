@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Edit Slider
                        <a href="{{ url('admin/sliders') }}"
                            class="btn btn-primary btn-sm text-white float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    @if ($errors->any())
                        <div class = "alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif


                    <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT');

                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" value={{ $slider->title }} class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" rows="3" class="form-control">{{ $slider->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset("$slider->image") }}" style="width:50px; height:50px" alt="Slider">
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <input type="checkbox" name="status" {{ $slider->title == '1' ? 'checked' : '' }}
                                style="width:30px; height:30px">
                            Checked=Hidden,UnChecked=Visible
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
