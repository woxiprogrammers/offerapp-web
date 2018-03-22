@extends('layouts.offerApp')

@section('content')

<div class="page-content-wrapper ">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->
        <!-- END THEME PANEL -->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
        <!-- BEGIN PAGE BASE CONTENT -->
        <div class="row ">
          <!-- <div class="col-md-12 col-sm-9 col-xs-12  margin-bottom-20">
              <div class="portlet light portlet-fit bordered">
                  <div >
                      <div class="mt-element-step ">
                          <div class="row step-line ">
                              <div class="col-md-4 mt-step-col first done">
                                  <div class="mt-step-number bg-white">
                                      <a href="#profile"><i class="fa fa-user-plus"></i></a>
                                  </div>
                                  <div class="mt-step-title uppercase font-grey-cascade">Profile</div>
                                  <div class="mt-step-content font-grey-cascade">Setup the Vendor Profile</div>
                              </div>
                              <div class="col-md-4 mt-step-col active">
                                  <div class="mt-step-number bg-white">
                                      <a href="#offer"><i class="fa fa-cubes"></i></a>
                                  </div>
                                  <div class="mt-step-title uppercase font-grey-cascade">Offer</div>
                                  <div class="mt-step-content font-grey-cascade">Create your offer for your Customer</div>
                              </div>
                              <div class="col-md-4 mt-step-col last">
                                  <div class="mt-step-number bg-white">
                                    <a href="#deploy"><i class="fa fa-group"></i></a>
                                  </div>
                                  <div class="mt-step-title uppercase font-grey-cascade">Deploy</div>
                                  <div class="mt-step-content font-grey-cascade">Receive Customer Response</div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div> -->
            <div class="col-md-12 col-sm-9 col-xs-12 ">
                <!-- BEGIN WIDGET GRADIENT -->
                <div class="clearfix"></div>
                <div id="carousel-example-generic-v1" class="carousel slide widget-carousel" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic-v1" data-slide-to="0" class="circle active"></li>
                        <li data-target="#carousel-example-generic-v1" data-slide-to="1" class="circle"></li>
                        <li data-target="#carousel-example-generic-v1" data-slide-to="2" class="circle"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <div class="widget-gradient" style="background: url(../assets/apps/img/clothes.jpg)">
                                <div class="widget-gradient-body">
                                    <h3 class="widget-gradient-title">Clothing Wears</h3>
                                    <ul class="widget-gradient-body-actions list-inline">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-heart"></i> 12 </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-comment"></i> 9 </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="widget-gradient" style="background: url(../assets/apps/img/foods.jpg)">
                                <div class="widget-gradient-body">
                                    <h3 class="widget-gradient-title">Food</h3>
                                    <ul class="widget-gradient-body-actions list-inline">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-heart"></i> 17 </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-comment"></i> 8 </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="widget-gradient" style="background: url(../assets/apps/img/shoe.jpg)">
                                <div class="widget-gradient-body">
                                    <h3 class="widget-gradient-title">FootWear</h3>
                                    <ul class="widget-gradient-body-actions list-inline">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-heart"></i> 17 </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-comment"></i> 8 </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END WIDGET GRADIENT -->
            </div>
            <!-- <div class="col-md-6 col-sm-9 col-xs-12 margin-bottom-20">
                <div id="carousel-example-generic-v2" class="carousel slide widget-carousel" data-ride="carousel">
                    <ol class="carousel-indicators carousel-indicators-red">
                        <li data-target="#carousel-example-generic-v2" data-slide-to="0" class="circle active"></li>
                        <li data-target="#carousel-example-generic-v2" data-slide-to="1" class="circle"></li>
                        <li data-target="#carousel-example-generic-v2" data-slide-to="2" class="circle"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                      <div class="item active">
                          <div class="widget-wrap-img widget-bg-color-white">
                              <h3 class="widget-wrap-img-title">Jwellerys</h3>
                              <img class="widget-wrap-img-element img-responsive" width="150%" height="150%" src="../assets/apps/img/accessories.jpg" alt=""> </div>
                      </div>
                        <div class="item ">
                            <div class="widget-wrap-img widget-bg-color-white">
                                <h3 class="widget-wrap-img-title">Hotels</h3>
                                <img class="widget-wrap-img-element img-responsive" width="150%" height="150%" src="../assets/apps/img/hotels.jpg" alt=""> </div>
                        </div>
                        <div class="item">
                            <div class="widget-wrap-img widget-bg-color-white">
                                <h3 class="widget-wrap-img-title">Electronic Gadgets</h3>
                                <img class="widget-wrap-img-element img-responsive" width="150%" height="150%" src="../assets/apps/img/Electronics1.jpg" alt=""> </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
@endsection
