@extends('layouts.admin')

@section('title', 'Edit Menu')

@section('main')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Edit Menu</h3>
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

                    <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name"><strong>Name:</strong></label>
                            <input type="text" id="name" name="name" value="{{ old('name', $menu->name) }}"
                                class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="url"><strong>URL:</strong></label>
                            <input type="text" id="url" name="url" value="{{ old('url', $menu->url) }}"
                                class="form-control" placeholder="URL">
                        </div>

                        <div class="form-group">
                            <a href="{{ route('admin.menus.index') }}" class="btn btn-default"
                                role="button">{{ __('Cancel') }}</a>
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
