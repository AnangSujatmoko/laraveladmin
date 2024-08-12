@extends('layouts.admin')

@section('title', 'Dashboard')

@section('main')
    <div class="container mt-5">
        <div class="row">
            <!-- Total Roles -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card text-white bg-primary">
                    <div class="card-body text-center">
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <i class="fas fa-shield-alt fa-2x mr-2"></i>
                            <h5 class="card-title m-0">Total Roles</h5>
                        </div>
                        <h3 class="card-text">{{ $totalRoles }}</h3>
                    </div>
                </div>
            </div>

            <!-- Total Users -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card text-white bg-danger">
                    <div class="card-body text-center">
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <i class="fas fa-users fa-2x mr-2"></i>
                            <h5 class="card-title m-0">Total Users</h5>
                        </div>
                        <h3 class="card-text">{{ $totalUsers }}</h3>
                    </div>
                </div>
            </div>

            <!-- Total Menus -->
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card text-white bg-success">
                    <div class="card-body text-center">
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <i class="fas fa-bars fa-2x mr-2"></i>
                            <h5 class="card-title m-0">Total Menus</h5>
                        </div>
                        <h3 class="card-text">{{ $totalMenus }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
