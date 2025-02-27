@extends('layouts/contentLayoutMaster')

@section('title', 'Statistics Cards')

@section('vendor-style')
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
@endsection
@section('page-style')
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
@endsection

@section('content')
<!-- Statistics card section -->
<section id="statistics-card">
  <!-- Miscellaneous Charts -->
  <div class="row match-height">
    <!-- Bar Chart -Orders -->
    <div class="col-lg-2 col-6">
      <div class="card">
        <div class="card-body pb-50">
          <h6>Orders</h6>
          <h2 class="fw-bolder mb-1">2,76k</h2>
          <div id="statistics-bar-chart"></div>
        </div>
      </div>
    </div>
    <!--/ Bar Chart -->

    <!-- Line Chart - Profit -->
    <div class="col-lg-2 col-6">
      <div class="card card-tiny-line-stats">
        <div class="card-body pb-50">
          <h6>Profit</h6>
          <h2 class="fw-bolder mb-1">6,24k</h2>
          <div id="statistics-line-chart"></div>
        </div>
      </div>
    </div>
    <!--/ Line Chart -->
    <div class="col-lg-8 col-12">
      <div class="card card-statistics">
        <div class="card-header">
          <h4 class="card-title">Statistics</h4>
          <div class="d-flex align-items-center">
            <p class="card-text me-25 mb-0">Updated 1 month ago</p>
          </div>
        </div>
        <div class="card-body statistics-body">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-primary me-2">
                  <div class="avatar-content">
                    <i data-feather="trending-up" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">230k</h4>
                  <p class="card-text font-small-3 mb-0">Sales</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-md-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-info me-2">
                  <div class="avatar-content">
                    <i data-feather="user" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">8.549k</h4>
                  <p class="card-text font-small-3 mb-0">Customers</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 mb-2 mb-sm-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-danger me-2">
                  <div class="avatar-content">
                    <i data-feather="box" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">1.423k</h4>
                  <p class="card-text font-small-3 mb-0">Products</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-success me-2">
                  <div class="avatar-content">
                    <i data-feather="dollar-sign" class="avatar-icon"></i>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0">$9745</h4>
                  <p class="card-text font-small-3 mb-0">Revenue</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Miscellaneous Charts -->

  <!-- Stats Vertical Card -->
  <div class="row">
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="avatar bg-light-info p-50 mb-1">
            <div class="avatar-content">
              <i data-feather="eye" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder">36.9k</h2>
          <p class="card-text">Views</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="avatar bg-light-warning p-50 mb-1">
            <div class="avatar-content">
              <i data-feather="message-square" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder">12k</h2>
          <p class="card-text">Comments</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="avatar bg-light-danger p-50 mb-1">
            <div class="avatar-content">
              <i data-feather="shopping-bag" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder">97.8k</h2>
          <p class="card-text">Orders</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="avatar bg-light-primary p-50 mb-1">
            <div class="avatar-content">
              <i data-feather="heart" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder">26.8</h2>
          <p class="card-text">Bookmarks</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="avatar bg-light-success p-50 mb-1">
            <div class="avatar-content">
              <i data-feather="award" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder">689</h2>
          <p class="card-text">Reviews</p>
        </div>
      </div>
    </div>
    <div class="col-xl-2 col-md-4 col-sm-6">
      <div class="card text-center">
        <div class="card-body">
          <div class="avatar bg-light-danger p-50 mb-1">
            <div class="avatar-content">
              <i data-feather="truck" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder">2.1k</h2>
          <p class="card-text">Returns</p>
        </div>
      </div>
    </div>
  </div>
  <!--/ Stats Vertical Card -->

  <!-- Stats Horizontal Card -->
  <div class="row">
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h2 class="fw-bolder mb-0">86%</h2>
            <p class="card-text">CPU Usage</p>
          </div>
          <div class="avatar bg-light-primary p-50 m-0">
            <div class="avatar-content">
              <i data-feather="cpu" class="font-medium-5"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h2 class="fw-bolder mb-0">1.2gb</h2>
            <p class="card-text">Memory Usage</p>
          </div>
          <div class="avatar bg-light-success p-50 m-0">
            <div class="avatar-content">
              <i data-feather="server" class="font-medium-5"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h2 class="fw-bolder mb-0">0.1%</h2>
            <p class="card-text">Downtime Ratio</p>
          </div>
          <div class="avatar bg-light-danger p-50 m-0">
            <div class="avatar-content">
              <i data-feather="activity" class="font-medium-5"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header">
          <div>
            <h2 class="fw-bolder mb-0">13</h2>
            <p class="card-text">Issues Found</p>
          </div>
          <div class="avatar bg-light-warning p-50 m-0">
            <div class="avatar-content">
              <i data-feather="alert-octagon" class="font-medium-5"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Stats Horizontal Card -->

  <!-- Line Area Chart Card -->
  <div class="row">
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start pb-0">
          <div class="avatar bg-light-primary p-50 m-0">
            <div class="avatar-content">
              <i data-feather="users" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">92.6k</h2>
          <p class="card-text">Subscribers Gained</p>
        </div>
        <div id="line-area-chart-1"></div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start pb-0">
          <div class="avatar bg-light-success p-50 m-0">
            <div class="avatar-content">
              <i data-feather="credit-card" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">97.5k</h2>
          <p class="card-text">Revenue Generated</p>
        </div>
        <div id="line-area-chart-2"></div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start pb-0">
          <div class="avatar bg-light-danger p-50 m-0">
            <div class="avatar-content">
              <i data-feather="shopping-cart" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">36%</h2>
          <p class="card-text">Quarterly Sales</p>
        </div>
        <div id="line-area-chart-3"></div>
      </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
      <div class="card">
        <div class="card-header flex-column align-items-start pb-0">
          <div class="avatar bg-light-warning p-50 m-0">
            <div class="avatar-content">
              <i data-feather="package" class="font-medium-5"></i>
            </div>
          </div>
          <h2 class="fw-bolder mt-1">97.5K</h2>
          <p class="card-text">Orders Received</p>
        </div>
        <div id="line-area-chart-4"></div>
      </div>
    </div>
  </div>
  <!--/ Line Area Chart Card -->

  <!-- Line Chart Card -->
  <div class="row">
    <div class="col-lg-4 col-sm-6 col-12">
      <div class="card">
        <div class="card-header align-items-start pb-0">
          <div>
            <h2 class="fw-bolder">78.9k</h2>
            <p class="card-text">Site Traffic</p>
          </div>
          <div class="avatar bg-light-primary p-50">
            <div class="avatar-content">
              <i data-feather="monitor" class="font-medium-5"></i>
            </div>
          </div>
        </div>
        <div id="line-area-chart-5"></div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-12">
      <div class="card">
        <div class="card-header align-items-start pb-0">
          <div>
            <h2 class="fw-bolder">659.8k</h2>
            <p class="card-text">Active Users</p>
          </div>
          <div class="avatar bg-light-success p-50">
            <div class="avatar-content">
              <i data-feather="user-check" class="font-medium-5"></i>
            </div>
          </div>
        </div>
        <div id="line-area-chart-6"></div>
      </div>
    </div>
    <div class="col-lg-4 col-sm-6 col-12">
      <div class="card">
        <div class="card-header align-items-start pb-0">
          <div>
            <h2 class="fw-bolder">28.7k</h2>
            <p class="card-text">Newsletter</p>
          </div>
          <div class="avatar bg-light-warning p-50">
            <div class="avatar-content">
              <i data-feather="mail" class="font-medium-5"></i>
            </div>
          </div>
        </div>
        <div id="line-area-chart-7"></div>
      </div>
    </div>
  </div>
  <!--/ Line Chart Card -->
</section>
<!--/ Statistics Card section-->
@endsection

@section('vendor-script')
  <script src="{{ asset(mix('admin/vendors/js/charts/apexcharts.min.js')) }}"></script>
@endsection
@section('page-script')
  <script src="{{ asset(mix('admin/js/scripts/cards/card-statistics.js')) }}"></script>
@endsection
