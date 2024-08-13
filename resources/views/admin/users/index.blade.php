@extends('layouts.admin')

@section('title', 'Users')

@section('main')
    <div class="row">
        <div class="col-6">
            <form action="{{ route('admin.users.import_excel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mt-3">
                    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="inputGroupFile">
                        <label class="custom-file-label" for="inputGroupFile">{{ __('Choose Excel/CSV File') }}</label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-warning" type="submit"><i
                                class="fas fa-upload mr-1"></i>{{ __('Upload') }}</button>
                    </div>
                </div>
            </form>
            <a href="{{ route('admin.users.export_pdf') }}" class="mt-3 btn btn-danger">
                <i class="fas fa-file-pdf mr-1"></i>
                {{ __('Print PDF') }}
            </a>
            <a href="{{ route('admin.users.export_excel') }}" class="mt-3 btn btn-success">
                <i class="fas fa-file-excel mr-1"></i>
                {{ __('Export Excel') }}
            </a>
        </div>
        <div class="col-6">
            @permission('users.create')
                <a href="{{ route('admin.users.create') }}" class="mt-3 btn btn-primary float-right">
                    <i class="fas fa-plus mr-1"></i>
                    {{ __('New User') }}
                </a>
            @endpermission
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-2">
            @include('layouts.shared.alert')
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatables" data-route="{{ route('admin.users.index') }}"
                            data-configs="{{ json_encode($tableConfigs) }}" class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    @for ($i = 0; $i < count($tableConfigs); $i++)
                                        <th>{{ $tableConfigs[$i]['name'] }}</th>
                                    @endfor
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="delete-modal">
        <div class="modal-dialog">
            <div class="modal-content" id="delete-form">
            </div>
        </div>
    </div>
@endsection

{{-- @section('main')
    <div class="row">
        <div class="col-6">
            <form action="{{ route('admin.users.import_excel') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mt-3">
                    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="inputGroupFile">
                        <label class="custom-file-label" for="inputGroupFile">{{ __('Choose Excel/CSV File') }}</label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">{{ __('Upload') }}</button>
                    </div>
                </div>
            </form>
            <a href="{{ route('admin.users.export_pdf') }}" class="mt-3 btn btn-danger">
                <i class="fas fa-file-pdf mr-1"></i>
                {{ __('Print PDF') }}
            </a>
            <a href="{{ route('admin.users.export_excel') }}" class="mt-3 btn btn-success">
                <i class="fas fa-file-excel mr-1"></i>
                {{ __('Export Excel') }}
            </a>
        </div>
        <div class="col-6">
            @permission('users.create')
                <a href="{{ route('admin.users.create') }}" class="mt-3 btn btn-primary float-right">
                    <i class="fas fa-plus mr-1"></i>
                    {{ __('New User') }}
                </a>
            @endpermission
        </div>
    </div>
    <div class="row">
        <div class="col-12 mt-2">
            @include('layouts.shared.alert')
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatables" data-route="{{ route('admin.users.index') }}"
                            data-configs="{{ json_encode($tableConfigs) }}" class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    @for ($i = 0; $i < count($tableConfigs); $i++)
                                        <th>{{ $tableConfigs[$i]['name'] }}</th>
                                    @endfor
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="delete-modal">
        <div class="modal-dialog">
            <div class="modal-content" id="delete-form">
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var input = document.getElementById('inputGroupFile');
            input.addEventListener('change', function() {
                var fileName = input.files[0] ? input.files[0].name : 'Choose Excel/CSV File';
                var label = document.querySelector('.custom-file-label');
                label.textContent = fileName;
            });
        });
    </script>
@endsection --}}
