@extends('layouts.admin')

@section('title', 'Edit Content')

@section('main')
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Edit Content</h3>
                </div>
                <div class="card-body">
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

                    <form action="{{ route('admin.content.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="title"><strong>Title:</strong></label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ old('title', $content->title) }}" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="body"><strong>Body:</strong></label>
                            <textarea name="body" id="body" class="form-control" placeholder="Body">{{ old('body', $content->body) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image"><strong>Image:</strong></label>

                            <!-- Display existing image -->
                            @if ($content->image)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $content->image) }}" alt="Current Image"
                                        style="max-width: 100%; max-height: 200px; margin-bottom: 10px;">
                                </div>
                            @endif

                            <input type="file" name="image" id="image" class="form-control">
                        </div>

                        <div class="form-group">
                            {{-- <a href="{{ route('admin.content.edit') }}" class="btn btn-default" role="button">
                                {{ __('Cancel') }}
                            </a> --}}
                            <button type="submit" class="btn btn-primary">{{ __('Update Content') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
