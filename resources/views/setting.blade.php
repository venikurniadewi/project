@extends('layouts.admin.dashboard')

@section('content')
<div class="page">
        <!-- Page header -->
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  Account Settings
                </h2>
              </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
            <div class="card">
              <div class="row g-0">
                <div class="col-12 col-md-3 border-end">
                  <div class="card-body">
                    <h4 class="subheader">Admin settings</h4>
                    <div class="list-group list-group-transparent">
                      <a href="./settings.html" class="list-group-item list-group-item-action d-flex align-items-center active">My Account</a>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-9 d-flex flex-column">
                  <div class="card-body">
                    <h2 class="mb-4">My Account</h2>
                    <h3 class="card-title">Profile Details</h3>
                    <div class="row align-items-center">
                      <div class="col-auto"><span class="avatar avatar-xl" style="background-image: url(./static/avatars/000m.jpg)"></span>
                      </div>
                      <div class="col-auto"><a href="#" class="btn">
                          Change avatar
                        </a></div>
                      <div class="col-auto"><a href="#" class="btn btn-ghost-danger">
                          Delete avatar
                        </a></div>
                    </div>
                    <h3 class="card-title mt-4">Admin Profile</h3>
                    <div class="row g-3">
                      <div class="col-md">
                        <div class="form-label">Name</div>
                        <input type="text" class="form-control" value="Tabler">
                      </div>
                      <div class="col-md">
                        <div class="form-label">E-mail</div>
                        <input type="text" class="form-control" value="560afc32">
                      </div>
                      <div class="col-md">
                        <div class="form-label">Password</div>
                        <input type="text" class="form-control"
			       value="Peimei, China">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer bg-transparent mt-auto">
                    <div class="btn-list justify-content-end">
                      <a href="#" class="btn">
                        Cancel
                      </a>
                      <a href="/login" class="btn btn-primary">
                        Submit
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
</div>
</div>

@endsection