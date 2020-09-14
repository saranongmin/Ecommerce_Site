@extends('backend.layouts.master')

@section('title', 'Profile')

@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">Unauthorized Action</div>
                    <div class="col-md-6 text-right"></div>
                </div>
            </div>
            <div class="card-body">
                <div class="container bg-dark text-white py-5">
                    <div class="row">
                        <div class="col-md-2 text-center">
                            <p><i class="fa fa-exclamation-triangle fa-5x"></i><br/>Status Code: 403</p>
                        </div>
                        <div class="col-md-10">
                            <h3>OPPSSS!!!! Sorry...</h3>
                            <p>Sorry, your access is refused due to security reasons of our server and also our sensitive data.<br/>Please go back to the previous page to continue browsing.</p>
                            <a class="btn btn-danger" href="javascript:history.back()">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

