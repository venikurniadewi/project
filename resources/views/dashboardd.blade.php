@extends('layouts.admin.dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Presensi</title>
</head>
<body>
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6 text-left">
                    <h4 class="page-title">Dashboard</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Selamat Datang di E-Presensi</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <div class="float-right d-none d-md-block">
                        <div></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <i class="ti-check-box" style="font-size: 20px"></i>
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Tepat Waktu <br>Hari ini</h5>
                            <h4 class="font-500">0<i class="text-success ml-2"></i></h4>
                            <span class="peity-donut" data-peity="{ &quot;fill&quot;: [&quot;#02a499&quot;, &quot;#f2f2f2&quot;], &quot;innerRadius&quot;: 28, &quot;radius&quot;: 32 }" data-width="72" data-height="72" style="display: none;">0/4</span>
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <i class="ti-check-box" style="font-size: 20px"></i>
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Tepat Waktu <br>Hari ini</h5>
                            <h4 class="font-500">0<i class="text-success ml-2"></i></h4>
                            <span class="peity-donut" data-peity="{ &quot;fill&quot;: [&quot;#02a499&quot;, &quot;#f2f2f2&quot;], &quot;innerRadius&quot;: 28, &quot;radius&quot;: 32 }" data-width="72" data-height="72" style="display: none;">0/4</span>
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <i class="ti-check-box" style="font-size: 20px"></i>
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Tepat Waktu <br>Hari ini</h5>
                            <h4 class="font-500">0<i class="text-success ml-2"></i></h4>
                            <span class="peity-donut" data-peity="{ &quot;fill&quot;: [&quot;#02a499&quot;, &quot;#f2f2f2&quot;], &quot;innerRadius&quot;: 28, &quot;radius&quot;: 32 }" data-width="72" data-height="72" style="display: none;">0/4</span>
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card mini-stat bg-primary text-white">
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="float-left mini-stat-img mr-4">
                                <i class="ti-alert" style="font-size: 20px"></i>
                            </div>
                            <h5 class="font-16 text-uppercase mt-0 text-white-50">Terlambat <br> Hari ini</h5>
                            <h4 class="font-500">0<i class="text-success ml-2"></i></h4>
                            <span class="peity-donut" data-peity="{ &quot;fill&quot;: [&quot;#02a499&quot;, &quot;#f2f2f2&quot;], &quot;innerRadius&quot;: 28, &quot;radius&quot;: 32 }" data-width="72" data-height="72" style="display: none;">0/4</span>
                        </div>
                        <div class="pt-2">
                            <div class="float-right">
                                <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

@endsection
