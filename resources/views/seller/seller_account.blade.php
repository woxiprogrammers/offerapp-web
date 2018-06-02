<?php
/**
 * Created by PhpStorm.
 * User: arvind
 * Date: 1/6/18
 * Time: 8:47 PM
 */
?>
@extends('layouts.offerApp')
@section('title','Seller | Profile')
@section('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
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
                        <a href="{{ route('home') }}">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Seller Account</span>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> New Seller Profile | Account
                <small>Seller Shop detail page</small>
            </h3>
            @if(\Session::has('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ \Session::get('error') }}</strong>
                </div>
            @elseif(\Session::has('success'))
                <div class="alert alert-success alert-block">
                    <button type="button"  class="close" data-dismiss="alert">x</button>
                    <strong>{{ \Session::get('success') }}</strong>
                </div>
            @endif
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar">
                        <!-- PORTLET MAIN -->
                        <div class="portlet light profile-sidebar-portlet ">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic">
                                <img src="{{($seller->user->profile_picture == null) ? '/uploads/user_profile_male.jpg' : env('SELLER_PROFILE_IMAGE_UPLOAD').sha1($seller->id).DIRECTORY_SEPARATOR.$seller->user->profile_picture}}" class="img-responsive" alt=""> </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name">{{ auth()->user()->first_name }}</div>
                                <div class="profile-usertitle-job"> {{auth()->user()->last_name}} </div>
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                            <!-- SIDEBAR BUTTONS -->
                            <div class="profile-userbuttons">
                                <button type="button" class="btn btn-circle green btn-sm">Info</button>
                                <button type="button" class="btn btn-circle red btn-sm">Offers</button>
                            </div>
                            <!-- END SIDEBAR BUTTONS -->
                            <!-- END MENU -->
                        </div>
                        <!-- END PORTLET MAIN -->
                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light ">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <span class="caption-subject font-blue-madison bold uppercase">Seller Account</span>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_1_1" data-toggle="tab">Shop Info</a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_2" data-toggle="tab">Change Shop Image</a>
                                            </li>
                                            <li>
                                                <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <!-- SHOP INFO TAB -->
                                            <div class="tab-pane active" id="tab_1_1">
                                                <form role="form" method="post" action="{{route('set-seller-account')}}">
                                                    {{csrf_field()}}
                                                @if(isset($seller_address))
                                                        <div class="form-group">
                                                            <label class="control-label">Shop Name</label>
                                                            <input type="text" name="shopName" value="{{$seller_address->shop_name}}" placeholder="Shop Name" class="form-control" required/> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Landline No</label>
                                                            <input type="text" name="landline" value="{{$seller_address->landline}}" placeholder="+1 646 580 DEMO (6284)" class="form-control" required/> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Shop Addres</label>
                                                            <input type="text" name="address" value="{{$seller_address->address}}" placeholder="Please Enter Proper Address" class="form-control" required/> </div>
                                                    @else
                                                        <div class="form-group">
                                                            <label class="control-label">Shop Name</label>
                                                            <input type="text" name="shopName" placeholder="Shop Name" class="form-control" required/> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Landline No</label>
                                                            <input type="text" name="landline" placeholder="+1 646 580 DEMO (6284)" class="form-control" required/> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Shop Addres</label>
                                                            <input type="text" name="address" placeholder="Please Enter Proper Address" class="form-control" required/> </div>
                                                    @endif
                                                    <div class="form-group">
                                                        <label class="control-label">Select Floor</label>
                                                        <select name="floorSlug" class="form-control" id="offer_id">
                                                            @foreach($floors as $floor)
                                                                <option value="{{$floor->slug}}">{{$floor->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="margiv-top-10">
                                                        <button type="submit" class="btn green">Save Changes</button>
                                                        <button type="reset" class="btn default">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- END SHOP INFO TAB -->
                                            <!-- CHANGE SHOP IMAGES TAB -->
                                            <div class="tab-pane" id="tab_1_2">
                                                <p> Choose Appropriate Image for Seller's Shop</p>
                                                <form action="{{route('changeShopImage')}}" method="post" enctype="multipart/form-data" role="form">
                                                    {{ csrf_field() }}
                                                    <div class="form-group">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 600px; max-height: 450px;"> </div>
                                                            <div>
                                                                                <span class="btn default btn-file btn red">
                                                                                    <span class="fileinput-new "> Select image </span>
                                                                                    <span class="fileinput-exists"> Change </span>
                                                                                    <input type="file" name="shopImage"> </span>
                                                                <a href="javascript:;" class="btn default fileinput-exists btn blue" data-dismiss="fileinput"> Remove </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="margin-top-10">
                                                        <button type="submit" class="btn green "> Submit </button>
                                                        <button type="reset" class="btn green "> Cancel </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- END CHANGE SHOP IMAGES TAB -->
                                            <!-- CHANGE PASSWORD TAB -->
                                            <div class="tab-pane" id="tab_1_3">
                                                <form role="form" method="post" action="{{route('change-password')}}">
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <label class="control-label">Current Password</label>
                                                        <input type="password" name="password" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">New Password</label>
                                                        <input type="password" name="newPassword" class="form-control" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Re-type New Password</label>
                                                        <input type="password" name="confirmNewPassword" class="form-control" />
                                                    </div>
                                                    <div class="margin-top-10">
                                                        <button type="submit" class="btn green"> Change Password </button>
                                                        <button type="reset" class="btn default"> Cancel </button>
                                                    </div>
                                                </form>

                                            </div>
                                            <!-- END CHANGE PASSWORD TAB -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE CONTENT -->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@endsection
@section('javascript')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../assets/pages/scripts/profile.min.js" type="text/javascript"></script>
    <script src="../assets/pages/scripts/ui-extended-modals.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection
