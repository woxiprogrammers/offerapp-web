<?php
/**
 * Created by PhpStorm.
 * User: arvind
 * Date: 30/3/18
 * Time: 7:20 PM
 */
?>
@extends('layouts.offerApp')
@section('title','OfferApp | Edit Customer')
@section('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <link href="../assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
@endsection
@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->

            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Customer</span>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> SuperAdmin
                <small>Customer Detials</small>
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-8">
                    <!-- BEGIN PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-bubble font-green-sharp"></i>
                                <span class="caption-subject font-green-sharp sbold">Personal Details</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form class="profile-form" action="{{ route('setCustomerEdit',['customer_id' => $customer_id]) }}" method="post" enctype="multipart/form-data" role="form">
                                {{ csrf_field() }}
                                <div class="tab-content">

                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1 ">

                                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}" id="first_name">
                                            <label >First Name</label>
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="First Name"
                                                       value="{{$user->first_name}}" name="first_name">

                                                @if ($errors->has('first_name'))
                                                    <span class="help-block alert-danger">
                                                        <strong>{{ $errors->first('first_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has("last_name") ? ' has-error' : '' }}" id="last_name">
                                            <label >Last Name</label>
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="Shop Name"
                                                       value="{{$user->last_name}}" name="last_name"  />
                                                @if ($errors->has("last_name"))
                                                    <span class="help-block alert-danger">
                                                        <strong>{{ $errors->first("last_name") }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}" id="mobile_no">
                                            <label >Mobile No</label>
                                            <div class="input-icon">
                                                <i class="fa fa-mobile-phone"></i>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="+91 1234567890"
                                                       value="{{$user->mobile_no}}" name="mobile_no"  />
                                                @if ($errors->has('mobile_no'))
                                                    <span class="help-block alert-danger">
                                                        <strong>{{ $errors->first('mobile_no') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" id="email">
                                            <label >email</label>
                                            <div class="input-icon">
                                                <i class="fa fa-envelope-o"></i>
                                                <input class="form-control placeholder-no-fix" type="text" placeholder="http://www.myemail.com"
                                                       value="{{$user->email}}" name="email"  />
                                                @if ($errors->has('email'))
                                                    <span class="help-block alert-danger">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <button type="submit" class="btn red btn-outline"> Save & continue </button>
                                        </div>

                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END PORTLET-->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@endsection
@section('javascript')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="../assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../assets/pages/scripts/ui-extended-modals.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection
