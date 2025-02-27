@extends('layouts/contentLayoutMaster')

@section('title', 'Advance Card')

@section('vendor-style')
<link rel="stylesheet" href="{{asset(mix('admin/vendors/css/charts/apexcharts.css'))}}">
@endsection
@section('page-style')
<link rel="stylesheet" href="{{asset(mix('admin/css/base/pages/app-chat-list.css'))}}">
@endsection

@section('content')
<!-- Card Advance -->

<div class="row match-height">
  <!-- Congratulations Card -->
  <div class="col-12 col-md-6 col-lg-7">
    <div class="card card-congratulations">
      <div class="card-body text-center">
        <img
          src="{{asset('images/elements/decore-left.png')}}"
          class="congratulations-img-left"
          alt="card-img-left"
        />
        <img
          src="{{asset('images/elements/decore-right.png')}}"
          class="congratulations-img-right"
          alt="card-img-right"
        />
        <div class="avatar avatar-xl bg-primary shadow">
          <div class="avatar-content">
            <i data-feather="award" class="font-large-1"></i>
          </div>
        </div>
        <div class="text-center">
          <h1 class="mb-1 text-white">Congratulations John,</h1>
          <p class="card-text m-auto w-75">
            You have done <strong>57.6%</strong> more sales today. Check your new badge in your profile.
          </p>
        </div>
      </div>
    </div>
  </div>
  <!--/ Congratulations Card -->

  <!-- Medal Card -->
  <div class="col-12 col-md-6 col-lg-5">
    <div class="card card-congratulation-medal">
      <div class="card-body">
        <h5>Congratulations 🎉 John!</h5>
        <p class="card-text font-small-3">You have won gold medal</p>
        <h3 class="mb-75 mt-4">
          <a href="#">$48.9k</a>
        </h3>
        <button type="button" class="btn btn-primary">View Sales</button>
        <img src="{{asset('images/illustration/badge.svg')}}" class="congratulation-medal" alt="Medal Pic" />
      </div>
    </div>
  </div>
  <!--/ Medal Card -->
</div>

<div class="row match-height">
  <!-- Employee Task Card -->
  <div class="col-lg-4 col-md-6 col-12">
    <div class="card card-employee-task">
      <div class="card-header">
        <h4 class="card-title">Employee Task</h4>
        <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
      </div>
      <div class="card-body">
        <div class="employee-task d-flex justify-content-between align-items-center">
          <div class="d-flex flex-row">
            <div class="avatar me-75">
              <img
                src="{{asset('images/portrait/small/avatar-s-9.jpg')}}"
                class="rounded"
                width="42"
                height="42"
                alt="Avatar"
              />
            </div>
            <div class="my-auto">
              <h6 class="mb-0">Ryan Harrington</h6>
              <small>iOS Developer</small>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <small class="text-muted me-75">9hr 20m</small>
            <div class="employee-task-chart-primary-1"></div>
          </div>
        </div>
        <div class="employee-task d-flex justify-content-between align-items-center">
          <div class="d-flex flex-row">
            <div class="avatar me-75">
              <img
                src="{{asset('images/portrait/small/avatar-s-20.jpg')}}"
                class="rounded"
                width="42"
                height="42"
                alt="Avatar"
              />
            </div>
            <div class="my-auto">
              <h6 class="mb-0">Louisa Norton</h6>
              <small>UI Designer</small>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <small class="text-muted me-75">4hr 17m</small>
            <div class="employee-task-chart-danger"></div>
          </div>
        </div>
        <div class="employee-task d-flex justify-content-between align-items-center">
          <div class="d-flex flex-row">
            <div class="avatar me-75">
              <img
                src="{{asset('images/portrait/small/avatar-s-1.jpg')}}"
                class="rounded"
                width="42"
                height="42"
                alt="Avatar"
              />
            </div>
            <div class="my-auto">
              <h6 class="mb-0">Jayden Duncan</h6>
              <small>Java Developer</small>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <small class="text-muted me-75">12hr 8m</small>
            <div class="employee-task-chart-success"></div>
          </div>
        </div>
        <div class="employee-task d-flex justify-content-between align-items-center">
          <div class="d-flex flex-row">
            <div class="avatar me-75">
              <img
                src="{{asset('images/portrait/small/avatar-s-20.jpg')}}"
                class="rounded"
                width="42"
                height="42"
                alt="Avatar"
              />
            </div>
            <div class="my-auto">
              <h6 class="mb-0">Cynthia Howell</h6>
              <small>Anguler Developer</small>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <small class="text-muted me-75">3hr 19m</small>
            <div class="employee-task-chart-secondary"></div>
          </div>
        </div>
        <div class="employee-task d-flex justify-content-between align-items-center">
          <div class="d-flex flex-row">
            <div class="avatar me-75">
              <img
                src="{{asset('images/portrait/small/avatar-s-16.jpg')}}"
                class="rounded"
                width="42"
                height="42"
                alt="Avatar"
              />
            </div>
            <div class="my-auto">
              <h6 class="mb-0">Helena Payne</h6>
              <small>Marketing</small>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <small class="text-muted me-75">9hr 50m</small>
            <div class="employee-task-chart-warning"></div>
          </div>
        </div>
        <div class="employee-task d-flex justify-content-between align-items-center">
          <div class="d-flex flex-row">
            <div class="avatar me-75">
              <img
                src="{{asset('images/portrait/small/avatar-s-13.jpg')}}"
                class="rounded"
                width="42"
                height="42"
                alt="Avatar"
              />
            </div>
            <div class="my-auto">
              <h6 class="mb-0">Troy Jensen</h6>
              <small>iOS Developer</small>
            </div>
          </div>
          <div class="d-flex align-items-center">
            <small class="text-muted me-75">4hr 48m</small>
            <div class="employee-task-chart-primary-2"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Employee Task Card -->

  <!-- Developer Meetup Card -->
  <div class="col-lg-4 col-md-6 col-12">
    <div class="card card-developer-meetup">
      <div class="meetup-img-wrapper rounded-top text-center">
        <img src="{{asset('images/illustration/email.svg')}}" alt="Meeting Pic" height="170" />
      </div>
      <div class="card-body">
        <div class="meetup-header d-flex align-items-center">
          <div class="meetup-day">
            <h6 class="mb-0">THU</h6>
            <h3 class="mb-0">24</h3>
          </div>
          <div class="my-auto">
            <h4 class="card-title mb-25">Developer Meetup</h4>
            <p class="card-text mb-0">Meet world popular developers</p>
          </div>
        </div>
        <div class="d-flex flex-row meetings">
          <div class="avatar bg-light-primary rounded me-1">
            <div class="avatar-content">
              <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
            </div>
          </div>
          <div class="content-body">
            <h6 class="mb-0">Sat, May 25, 2020</h6>
            <small>10:AM to 6:PM</small>
          </div>
        </div>
        <div class="d-flex flex-row meetings">
          <div class="avatar bg-light-primary rounded me-1">
            <div class="avatar-content">
              <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
            </div>
          </div>
          <div class="content-body">
            <h6 class="mb-0">Central Park</h6>
            <small>Manhattan, New york City</small>
          </div>
        </div>
        <div class="avatar-group">
          <div
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="bottom"
            title="Billy Hopkins"
            class="avatar pull-up"
          >
            <img src="{{asset('images/portrait/small/avatar-s-9.jpg')}}" alt="Avatar" width="33" height="33" />
          </div>
          <div
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="bottom"
            title="Amy Carson"
            class="avatar pull-up"
          >
            <img src="{{asset('images/portrait/small/avatar-s-6.jpg')}}" alt="Avatar" width="33" height="33" />
          </div>
          <div
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="bottom"
            title="Brandon Miles"
            class="avatar pull-up"
          >
            <img src="{{asset('images/portrait/small/avatar-s-8.jpg')}}" alt="Avatar" width="33" height="33" />
          </div>
          <div
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="bottom"
            title="Daisy Weber"
            class="avatar pull-up"
          >
            <img src="{{asset('images/portrait/small/avatar-s-20.jpg')}}" alt="Avatar" width="33" height="33" />
          </div>
          <div
            data-bs-toggle="tooltip"
            data-popup="tooltip-custom"
            data-bs-placement="bottom"
            title="Jenny Looper"
            class="avatar pull-up"
          >
            <img src="{{asset('images/portrait/small/avatar-s-20.jpg')}}" alt="Avatar" width="33" height="33" />
          </div>
          <h6 class="align-self-center cursor-pointer ms-50 mb-0">+42</h6>
        </div>
      </div>
    </div>
  </div>
  <!--/ Developer Meetup Card -->

  <!-- Profile Card -->
  <div class="col-lg-4 col-md-6 col-12">
    <div class="card card-profile">
      <img
        src="{{asset('images/banner/banner-12.jpg')}}"
        class="img-fluid card-img-top"
        alt="Profile Cover Photo"
      />
      <div class="card-body">
        <div class="profile-image-wrapper">
          <div class="profile-image">
            <div class="avatar">
              <img src="{{asset('images/portrait/small/avatar-s-9.jpg')}}" alt="Profile Picture" />
            </div>
          </div>
        </div>
        <h3>Curtis Stone</h3>
        <h6 class="text-muted">Malaysia</h6>
        <span class="badge badge-light-primary profile-badge">Pro Level</span>
        <hr class="mb-2" />
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h6 class="text-muted fw-bolder">Followers</h6>
            <h3 class="mb-0">10.3k</h3>
          </div>
          <div>
            <h6 class="text-muted fw-bolder">Projects</h6>
            <h3 class="mb-0">156</h3>
          </div>
          <div>
            <h6 class="text-muted fw-bolder">Rank</h6>
            <h3 class="mb-0">23</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Profile Card -->

  <!-- Apply Job Card -->
  <div class="col-lg-4 col-md-6 col-12">
    <div class="card card-apply-job">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-1">
          <div class="d-flex flex-row">
            <div class="avatar me-1">
              <img
                src="{{asset('images/portrait/small/avatar-s-20.jpg')}}"
                alt="Avatar"
                width="42"
                height="42"
              />
            </div>
            <div class="user-info">
              <h5 class="mb-0">Mittie Evans</h5>
              <small class="text-muted">Updated 12m ago</small>
            </div>
          </div>
          <span class="badge rounded-pill badge-light-primary">Design</span>
        </div>
        <h5 class="apply-job-title">Need a designer to form branding essentials for my business.</h5>
        <p class="card-text mb-2">
          Design high-quality designs, graphics, mock-ups and layouts for both new and existing web sites/ web
          applications / mobile applications.
        </p>
        <div class="apply-job-package bg-light-primary rounded">
          <div>
            <sup class="text-body"><small>$</small></sup>
            <h2 class="d-inline me-25">9,800</h2>
            <sub class="text-body"><small>/ month</small></sub>
          </div>
          <span class="badge rounded-pill badge-light-primary">Full Time</span>
        </div>
        <div class="d-grid">
          <button type="button" class="btn btn-primary">Apply For This Job</button>
        </div>
      </div>
    </div>
  </div>
  <!--/ Apply Job Card -->

  <!-- Transaction card -->
  <div class="col-lg-4 col-md-6 col-12">
    <div class="card card-transaction">
      <div class="card-header">
        <h4 class="card-title">Transactions</h4>
        <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
      </div>
      <div class="card-body">
        <div class="transaction-item">
          <div class="d-flex flex-row">
            <div class="avatar bg-light-primary rounded">
              <div class="avatar-content">
                <i data-feather="pocket" class="avatar-icon font-medium-3"></i>
              </div>
            </div>
            <div class="transaction-info">
              <h6 class="transaction-title">Wallet</h6>
              <small>Starbucks</small>
            </div>
          </div>
          <div class="fw-bolder text-danger">- $74</div>
        </div>
        <div class="transaction-item">
          <div class="d-flex flex-row">
            <div class="avatar bg-light-success rounded">
              <div class="avatar-content">
                <i data-feather="check" class="avatar-icon font-medium-3"></i>
              </div>
            </div>
            <div class="transaction-info">
              <h6 class="transaction-title">Bank Transfer</h6>
              <small>Add Money</small>
            </div>
          </div>
          <div class="fw-bolder text-success">+ $480</div>
        </div>
        <div class="transaction-item">
          <div class="d-flex flex-row">
            <div class="avatar bg-light-danger rounded">
              <div class="avatar-content">
                <i data-feather="dollar-sign" class="avatar-icon font-medium-3"></i>
              </div>
            </div>
            <div class="transaction-info">
              <h6 class="transaction-title">Paypal</h6>
              <small>Add Money</small>
            </div>
          </div>
          <div class="fw-bolder text-success">+ $590</div>
        </div>
        <div class="transaction-item">
          <div class="d-flex flex-row">
            <div class="avatar bg-light-warning rounded">
              <div class="avatar-content">
                <i data-feather="credit-card" class="avatar-icon font-medium-3"></i>
              </div>
            </div>
            <div class="transaction-info">
              <h6 class="transaction-title">Mastercard</h6>
              <small>Ordered Food</small>
            </div>
          </div>
          <div class="fw-bolder text-danger">- $23</div>
        </div>
        <div class="transaction-item">
          <div class="d-flex flex-row">
            <div class="avatar bg-light-info rounded">
              <div class="avatar-content">
                <i data-feather="trending-up" class="avatar-icon font-medium-3"></i>
              </div>
            </div>
            <div class="transaction-info">
              <h6 class="transaction-title">Transfer</h6>
              <small>Refund</small>
            </div>
          </div>
          <div class="fw-bolder text-success">+ $98</div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Transaction card -->

  <!-- Payment Card -->
  <div class="col-lg-4 col-md-6 col-12">
    <div class="card card-payment">
      <div class="card-header">
        <h4 class="card-title">Pay Amount</h4>
        <h4 class="card-title text-primary">$455.60</h4>
      </div>
      <div class="card-body">
        <form action="javascript:void(0);" class="form">
          <div class="row">
            <div class="col-12">
              <div class="mb-2">
                <label class="form-label" for="payment-card-number">Card Number</label>
                <input type="number" id="payment-card-number" class="form-control" placeholder="2133 3244 4567 8921" />
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="mb-2">
                <label class="form-label" for="payment-expiry">Expiry</label>
                <input type="number" id="payment-expiry" class="form-control" placeholder="MM / YY" />
              </div>
            </div>
            <div class="col-sm-6 col-12">
              <div class="mb-2">
                <label class="form-label" for="payment-cvv">CVV / CVC</label>
                <input type="number" id="payment-cvv" class="form-control" placeholder="123" />
              </div>
            </div>
            <div class="col-12">
              <div class="mb-2">
                <label class="form-label" for="payment-input-name">Input Name</label>
                <input type="text" id="payment-input-name" class="form-control" placeholder="Curtis Stone" />
              </div>
            </div>
            <div class="d-grid col-12">
              <button type="button" class="btn btn-primary">Make Payment</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--/ Payment Card -->
</div>

<div class="row match-height">
  <!-- User Timeline Card -->
  <div class="col-lg-8 col-12">
    <div class="card card-user-timeline">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <i data-feather="list" class="user-timeline-title-icon"></i>
          <h4 class="card-title">User Timeline</h4>
        </div>
        <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
      </div>
      <div class="card-body">
        <ul class="timeline ms-50">
          <li class="timeline-item">
            <span class="timeline-point timeline-point-indicator"></span>
            <div class="timeline-event">
              <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                <h6>12 Invoices have been paid</h6>
                <span class="timeline-event-time me-1">12 min ago</span>
              </div>
              <p>Invoices have been paid to the company.</p>
              <div class="d-flex flex-row align-items-center">
                <img class="me-1" src="{{asset('images/icons/json.png')}}" alt="data.json" height="23" />
                <h6 class="mb-0">data.json</h6>
              </div>
            </div>
          </li>
          <li class="timeline-item">
            <span class="timeline-point timeline-point-warning timeline-point-indicator"></span>
            <div class="timeline-event">
              <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                <h6>Client Meeting</h6>
                <span class="timeline-event-time me-1">45 min ago</span>
              </div>
              <p>Project meeting with john @10:15am</p>
              <div class="d-flex flex-row align-items-center">
                <div class="avatar me-50">
                  <img
                    src="{{asset('images/portrait/small/avatar-s-9.jpg')}}"
                    alt="Avatar"
                    width="38"
                    height="38"
                  />
                </div>
                <div class="user-info">
                  <h6 class="mb-0">John Doe (Client)</h6>
                  <p class="mb-0">CEO of Infibeam</p>
                </div>
              </div>
            </div>
          </li>
          <li class="timeline-item">
            <span class="timeline-point timeline-point-info timeline-point-indicator"></span>
            <div class="timeline-event">
              <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                <h6>Create a new project for client</h6>
                <span class="timeline-event-time me-1">2 day ago</span>
              </div>
              <p>Add files to new design folder</p>
              <div class="avatar-group">
                <div
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="bottom"
                  title="Billy Hopkins"
                  class="avatar pull-up"
                >
                  <img
                    src="{{asset('images/portrait/small/avatar-s-9.jpg')}}"
                    alt="Avatar"
                    width="33"
                    height="33"
                  />
                </div>
                <div
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="bottom"
                  title="Amy Carson"
                  class="avatar pull-up"
                >
                  <img
                    src="{{asset('images/portrait/small/avatar-s-6.jpg')}}"
                    alt="Avatar"
                    width="33"
                    height="33"
                  />
                </div>
                <div
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="bottom"
                  title="Brandon Miles"
                  class="avatar pull-up"
                >
                  <img
                    src="{{asset('images/portrait/small/avatar-s-8.jpg')}}"
                    alt="Avatar"
                    width="33"
                    height="33"
                  />
                </div>
                <div
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="bottom"
                  title="Daisy Weber"
                  class="avatar pull-up"
                >
                  <img
                    src="{{asset('images/portrait/small/avatar-s-20.jpg')}}"
                    alt="Avatar"
                    width="33"
                    height="33"
                  />
                </div>
                <div
                  data-bs-toggle="tooltip"
                  data-popup="tooltip-custom"
                  data-bs-placement="bottom"
                  title="Jenny Looper"
                  class="avatar pull-up"
                >
                  <img
                    src="{{asset('images/portrait/small/avatar-s-20.jpg')}}"
                    alt="Avatar"
                    width="33"
                    height="33"
                  />
                </div>
              </div>
            </div>
          </li>
          <li class="timeline-item">
            <span class="timeline-point timeline-point-danger timeline-point-indicator"></span>
            <div class="timeline-event">
              <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                <h6>Create a new project for client</h6>
                <span class="timeline-event-time me-1">5 day ago</span>
              </div>
              <p class="mb-0">Add files to new design folder</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!--/ User Timeline Card -->

  <!-- Chat Card -->
  <div class="col-lg-4 col-md-6 col-12">
    <div class="card chat-widget">
      <div class="card-header">
        <div class="d-flex align-items-center">
          <div class="avatar me-2">
            <img src="{{asset('images/portrait/small/avatar-s-20.jpg')}}" alt="Avatar" width="34" height="34" />
            <span class="avatar-status-online"></span>
          </div>
          <h5 class="mb-0">Carrie Hawkins</h5>
        </div>
        <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
      </div>
      <!-- User Chat messages -->
      <section class="chat-app-window">
        <div class="user-chats">
          <div class="chats">
            <div class="chat">
              <div class="chat-avatar">
                <span class="avatar box-shadow-1 cursor-pointer">
                  <img
                    src="{{asset('images/portrait/small/avatar-s-11.jpg')}}"
                    alt="avatar"
                    height="36"
                    width="36"
                  />
                </span>
              </div>
              <div class="chat-body">
                <div class="chat-content">
                  <p>How can we help? We're here for you! 😄</p>
                </div>
              </div>
            </div>
            <div class="chat chat-left">
              <div class="chat-avatar">
                <span class="avatar box-shadow-1 cursor-pointer">
                  <img
                    src="{{asset('images/portrait/small/avatar-s-20.jpg')}}"
                    alt="avatar"
                    height="36"
                    width="36"
                  />
                </span>
              </div>
              <div class="chat-body">
                <div class="chat-content">
                  <p>Hey John, I am looking for the best admin template.</p>
                  <p>Could you please help me to find it out? 🤔</p>
                </div>
                <div class="chat-content">
                  <p>It should be Bootstrap 4 compatible.</p>
                </div>
              </div>
            </div>
            <div class="chat">
              <div class="chat-avatar">
                <span class="avatar box-shadow-1 cursor-pointer">
                  <img
                    src="{{asset('images/portrait/small/avatar-s-11.jpg')}}"
                    alt="avatar"
                    height="36"
                    width="36"
                  />
                </span>
              </div>
              <div class="chat-body">
                <div class="chat-content">
                  <p>Absolutely!</p>
                </div>
                <div class="chat-content">
                  <p>Vuexy admin is the responsive bootstrap 4 admin template.</p>
                </div>
              </div>
            </div>
            <div class="chat chat-left">
              <div class="chat-avatar">
                <span class="avatar box-shadow-1 cursor-pointer">
                  <img
                    src="{{asset('images/portrait/small/avatar-s-20.jpg')}}"
                    alt="avatar"
                    height="36"
                    width="36"
                  />
                </span>
              </div>
              <div class="chat-body">
                <div class="chat-content">
                  <p>Looks clean and fresh UI. 😃</p>
                </div>
                <div class="chat-content">
                  <p>It's perfect for my next project.</p>
                </div>
                <div class="chat-content">
                  <p>How can I purchase it?</p>
                </div>
              </div>
            </div>
            <div class="chat">
              <div class="chat-avatar">
                <span class="avatar box-shadow-1 cursor-pointer">
                  <img
                    src="{{asset('images/portrait/small/avatar-s-11.jpg')}}"
                    alt="avatar"
                    height="36"
                    width="36"
                  />
                </span>
              </div>
              <div class="chat-body">
                <div class="chat-content">
                  <p>Thanks, from ThemeForest.</p>
                </div>
              </div>
            </div>
            <div class="chat chat-left">
              <div class="chat-avatar">
                <span class="avatar box-shadow-1 cursor-pointer">
                  <img
                    src="{{asset('images/portrait/small/avatar-s-20.jpg')}}"
                    alt="avatar"
                    height="36"
                    width="36"
                  />
                </span>
              </div>
              <div class="chat-body">
                <div class="chat-content">
                  <p>I will purchase it for sure. 👍</p>
                </div>
                <div class="chat-content">
                  <p>Thanks.</p>
                </div>
              </div>
            </div>
            <div class="chat">
              <div class="chat-avatar">
                <span class="avatar box-shadow-1 cursor-pointer">
                  <img
                    src="{{asset('images/portrait/small/avatar-s-11.jpg')}}"
                    alt="avatar"
                    height="36"
                    width="36"
                  />
                </span>
              </div>
              <div class="chat-body">
                <div class="chat-content">
                  <p>Great, Feel free to get in touch on</p>
                </div>
                <div class="chat-content">
                  <p>https://pixinvent.ticksy.com/</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Submit Chat form -->
        <form class="chat-app-form" action="javascript:void(0);" onsubmit="enterChat();">
          <div class="input-group input-group-merge me-50 w-75 form-send-message">
            <span class="input-group-text">
              <label for="attach-doc" class="attachment-icon mb-0">
                <i data-feather="image" class="cursor-pointer text-secondary"></i>
                <input type="file" id="attach-doc" hidden /> </label
            ></span>
            <input type="text" class="form-control message" placeholder="Type your message" />
          </div>
          <button type="button" class="btn btn-primary send" onclick="enterChat();">
            <i data-feather="send" class="d-lg-none"></i>
            <span class="d-none text-nowrap d-lg-block">Send</span>
          </button>
        </form>
        <!--/ Submit Chat form -->
      </section>
      <!-- User Chat messages -->
    </div>
  </div>
  <!--/ Chat Card -->

  <!-- Business Card -->
  <div class="col-lg-4 col-md-6 col-12">
    <div class="card business-card">
      <div class="card-header pb-1">
        <h4 class="card-title">For Business Sharks</h4>
        <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
      </div>
      <div class="card-body">
        <p class="card-text">Here, i focus ona range of items and featured that we use in life without giving them</p>
        <h6 class="mb-75">Basic price is $130</h6>
        <div class="business-items">
          <div class="business-item">
            <div class="d-flex align-items-center justify-content-between">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="business-checkbox-1" />
                <label class="form-check-label" for="business-checkbox-1">Option #1</label>
              </div>
              <span class="badge badge-light-success">+$39</span>
            </div>
          </div>
          <div class="business-item">
            <div class="d-flex align-items-center justify-content-between">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="business-checkbox-2" checked />
                <label class="form-check-label" for="business-checkbox-2">Option #2</label>
              </div>
              <span class="badge badge-light-primary">+85</span>
            </div>
          </div>
          <div class="business-item">
            <div class="d-flex align-items-center justify-content-between">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="business-checkbox-3" />
                <label class="form-check-label" for="business-checkbox-3">Option #3</label>
              </div>
              <span class="badge badge-light-success">+$199</span>
            </div>
          </div>
          <div class="business-item">
            <div class="d-flex align-items-center justify-content-between">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="business-checkbox-4" />
                <label class="form-check-label" for="business-checkbox-4">Option #4</label>
              </div>
              <span class="badge badge-light-success">+$459</span>
            </div>
          </div>
        </div>
        <div class="d-grid">
          <button type="button" class="btn btn-primary">Purchase</button>
        </div>
      </div>
    </div>
  </div>
  <!--/ Business Card -->

  <!-- Browser States Card -->
  <div class="col-lg-4 col-md-6 col-12">
    <div class="card card-browser-states">
      <div class="card-header">
        <h4 class="card-title">Browser States</h4>
        <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"></i>
      </div>
      <div class="card-body">
        <p class="card-text font-small-2">Counter August 2020</p>
        <div class="browser-states">
          <div class="d-flex flex-row">
            <img
              src="{{asset('images/icons/google-chrome.png')}}"
              class="rounded me-1"
              height="30"
              alt="Google Chrome"
            />
            <h6 class="align-self-center mb-0">Google Chrome</h6>
          </div>
          <div class="d-flex align-items-center">
            <div class="fw-bold text-body-heading me-1">54.4%</div>
            <div class="state-chart-primary"></div>
          </div>
        </div>
        <div class="browser-states">
          <div class="d-flex flex-row">
            <img
              src="{{asset('images/icons/mozila-firefox.png')}}"
              class="rounded me-1"
              height="30"
              alt="Mozila Firefox"
            />
            <h6 class="align-self-center mb-0">Mozila Firefox</h6>
          </div>
          <div class="d-flex align-items-center">
            <div class="fw-bold text-body-heading me-1">6.1%</div>
            <div class="state-chart-warning"></div>
          </div>
        </div>
        <div class="browser-states">
          <div class="d-flex flex-row">
            <img
              src="{{asset('images/icons/apple-safari.png')}}"
              class="rounded me-1"
              height="30"
              alt="Apple Safari"
            />
            <h6 class="align-self-center mb-0">Apple Safari</h6>
          </div>
          <div class="d-flex align-items-center">
            <div class="fw-bold text-body-heading me-1">14.6%</div>
            <div class="state-chart-secondary"></div>
          </div>
        </div>
        <div class="browser-states">
          <div class="d-flex flex-row">
            <img
              src="{{asset('images/icons/internet-explorer.png')}}"
              class="rounded me-1"
              height="30"
              alt="Internet Explorer"
            />
            <h6 class="align-self-center mb-0">Internet Explorer</h6>
          </div>
          <div class="d-flex align-items-center">
            <div class="fw-bold text-body-heading me-1">4.2%</div>
            <div class="state-chart-info"></div>
          </div>
        </div>
        <div class="browser-states">
          <div class="d-flex flex-row">
            <img src="{{asset('images/icons/opera.png')}}" class="rounded me-1" height="30" alt="Opera Mini" />
            <h6 class="align-self-center mb-0">Opera Mini</h6>
          </div>
          <div class="d-flex align-items-center">
            <div class="fw-bold text-body-heading me-1">8.4%</div>
            <div class="state-chart-danger"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Browser States Card -->

  <!-- App Design Card -->
  <div class="col-lg-4 col-md-6 col-12">
    <div class="card card-app-design">
      <div class="card-body">
        <span class="badge badge-light-primary">03 Sep, 20</span>
        <h4 class="card-title mt-1 mb-75">App design</h4>
        <p class="card-text font-small-2 mb-2">
          You can Find Only Post and Quotes Related to IOS like ipad app design, iphone app design
        </p>
        <div class="design-group">
          <h6 class="section-label">Team</h6>
          <span class="badge badge-light-warning me-1">Figma</span>
          <span class="badge badge-light-primary">Wireframe</span>
        </div>
        <div class="design-group">
          <h6 class="section-label">Members</h6>
          <div class="avatar">
            <img src="{{asset('images/portrait/small/avatar-s-9.jpg')}}" width="34" height="34" alt="Avatar" />
          </div>
          <div class="avatar bg-light-danger">
            <div class="avatar-content">PI</div>
          </div>
          <div class="avatar">
            <img src="{{asset('images/portrait/small/avatar-s-14.jpg')}}" width="34" height="34" alt="Avatar" />
          </div>
          <div class="avatar">
            <img src="{{asset('images/portrait/small/avatar-s-20.jpg')}}" width="34" height="34" alt="Avatar" />
          </div>
          <div class="avatar bg-light-secondary">
            <div class="avatar-content">AL</div>
          </div>
        </div>
        <div class="design-planning-wrapper">
          <div class="design-planning">
            <p class="card-text mb-25">Due Date</p>
            <h6 class="mb-0">12 Apr, 21</h6>
          </div>
          <div class="design-planning">
            <p class="card-text mb-25">Budget</p>
            <h6 class="mb-0">$49251.91</h6>
          </div>
          <div class="design-planning">
            <p class="card-text mb-25">Cost</p>
            <h6 class="mb-0">$840.99</h6>
          </div>
        </div>
        <div class="d-grid">
          <button type="button" class="btn btn-primary">Join Team</button>
        </div>
      </div>
    </div>
  </div>
  <!--/ App Design Card -->

  <!-- Deposits Card -->
  <!-- ! commented for now as we are not using this card -->
  <!-- <div class="col-lg-3 col-md-6 col-12">
    <div class="card card-deposits">
      <div class="card-body">
        <h3>$12,490</h3>
        <p class="card-text">
          <small>Deposits: $18,389</small>
        </p>
        <p class="card-text text-success fw-bolder">+8.2% ($284)</p>
        <div class="d-grid">
          <button type="button" class="btn btn-primary">Add Funds <i data-feather="plus"></i></button>
        </div>
        <hr class="deposits-divider" />
        <p class="card-text mb-50">
          <small>Earned: $45,290</small>
        </p>
        <div class="progress progress-bar-success mb-2" style="height: 6px">
          <div
            class="progress-bar"
            role="progressbar"
            aria-valuenow="75"
            aria-valuemin="75"
            aria-valuemax="100"
            style="width: 75%"
          ></div>
        </div>
        <p class="card-text mb-50">
          <small>Duration: 4year</small>
        </p>
        <div class="progress progress-bar-warning" style="height: 6px">
          <div
            class="progress-bar"
            role="progressbar"
            aria-valuenow="30"
            aria-valuemin="30"
            aria-valuemax="100"
            style="width: 30%"
          ></div>
        </div>
      </div>
    </div>
  </div> -->
  <!--/ Deposits Card -->
</div>

<!--/ Card Advance -->
@endsection

@section('vendor-script')
<script src="{{asset(mix('admin/vendors/js/charts/apexcharts.min.js'))}}"></script>
@endsection
@section('page-script')
  <script src="{{ asset(mix('admin/js/scripts/cards/card-advance.js')) }}"></script>
@endsection
