@extends('layouts.base')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-8 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-12">
            <div class="card-body">
              <h5 class="card-title text-primary">{{ $consignments_chart->options['chart_title'] }}</h5>
           
         
              {!! $consignments_chart->renderHtml() !!}
           
            </div>
          </div>
          <div class="col-sm-5 text-center text-sm-left">
           
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 order-1">
      <div class="row">
        <h5 class="card-title mb-2">{{ $current }}  Consignments Stats</h5>
        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card" style="background-color: #0685DA;color:white;">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <i class="menu-icon tf-icons bx bx-layout"></i>            
              </div>
              <span class="fw-semibold d-block mb-1">Total  </span>
              <h4 class="card-title mb-2">{{ $total_consignment  }}</h4>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card" style="background-color: #FFAA00;color:white;">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <i class="menu-icon tf-icons bx bx-layout"></i>            
              </div>
              <span class="fw-semibold d-block mb-1">Pending </span>
              <h4 class="card-title mb-2">{{ $pending_consignment}}</h4>
            </div>
          </div>
        </div>

                
        <div class="col-lg-6 col-md-12 col-6 mb-4">
           <div class="card" style="background-color: #2AD500;color:white;">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <i class="menu-icon tf-icons bx bx-layout"></i>            
              </div>
              <span class="fw-semibold d-block mb-1">Submitted </span>
              <h4 class="card-title mb-2">{{ $submitted_consignment }}</h4>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-12 col-6 mb-4">
          <div class="card" style="background-color: #FF002A;color:white;">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <i class="menu-icon tf-icons bx bx-layout"></i>            
             
                <div class="dropdown">
                  <button
                    class="btn p-0"
                    type="button"
                    id="cardOpt6"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                  </div>
                </div>
              </div>
              <span>Cancelled </span>
              <h4 class="card-title text-nowrap mb-1">{{ $cancelled_consignment }}</h4>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
      <div class="card">
        <div class="row row-bordered g-0">
          <div class="col-md-12">

            <h5 class="card-header m-0 me-2 pb-3">{{ $chart1->options['chart_title'] }}</h5>
            <div id="totalRevenueChart" class="px-2">
              
    
        {!! $chart1->renderHtml() !!}

            </div>
          </div>
          
        </div>
      </div>
    </div>

    <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                </div>
                <div class="dropdown">
                  <button
                    class="btn p-0"
                    type="button"
                    id="cardOpt4"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                  </div>
                </div>
              </div>
              <span class="d-block mb-1">Payments</span>
             
           
            </div>
          </div>
        </div>     
      </div>
    </div>
  </div>
 
  
</div>
<!-- / Content 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
-->

  @endsection
  @section('javascript')
  {!! $chart1->renderChartJsLibrary() !!}
  {!! $chart1->renderJs() !!}
  {!! $consignments_chart->renderJs() !!}
  @endsection