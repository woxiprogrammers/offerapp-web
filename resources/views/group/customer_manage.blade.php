<?php
/**
 * Created by PhpStorm.
 * User: arvind
 * Date: 26/5/18
 * Time: 2:32 PM
 */
?>
@extends('layouts.offerApp')
@section('title','OfferApp | Groups Customer')
@section('css')
@endsection
@section('content')
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
                        <a href="{{ route('groupListing') }}">Group</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Group Members</span>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Group's
                <small>Member Listing</small>
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption">
                                <i class=" icon-social-twitter font-dark hide"></i>
                                <span class="caption-subject font-dark bold uppercase">Groups Member</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_member_listing" data-toggle="tab"> Listing </a>
                                </li>
                                <li>
                                    <a href="#tab_member_add" data-toggle="tab"> Add </a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            @if(Session::has('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @elseif(isset($error))
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endif
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_member_listing">
                                    <!-- BEGIN: Group Member List -->
                                    @if(count($members)>0)
                                        <section class="members">
                                            @include('group.customer_load')
                                        </section>
                                    @else
                                        <p>Sorry No Member Found....</p>
                                @endif
                                <!-- END: Group Group Member List -->
                                <a href="{{ route('groupListing') }}" class="btn red btn-outline"> Back </a>

                                </div>
                                <div class="tab-pane" id="tab_member_add">
                                    <!-- BEGIN: Add Group Member-->
                                    <div class="mt-actions">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 ">
                                                <form class="profile-form" action="{{ route('addGroupMember',['group_id' => $group_id]) }}" method="post" role="form">
                                                    {{ csrf_field() }}
                                                    <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}" id="mobile_no">
                                                        <label >Enter the Member's Mobile No to be Added </label>
                                                        <div class="input-icon">
                                                            <i class="fa fa-user"></i>
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Group Name"
                                                                   value="" name="mobile_no">
                                                            @if ($errors->has('mobile_no'))
                                                                <span class="help-block alert-danger">
                                                        <strong>{{ $errors->first('mobile_no') }}</strong>
                                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-actions">
                                                        <button type="submit" class="btn blue btn-outline"> ADD </button>
                                                        <a href="{{ route('groupListing') }}" class="btn red btn-outline"> Back </a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <!-- END: Create Group -->
                                    </div>
                                    <!-- END: Add Group Member -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
@endsection
@section('javascript')
    <script src="/assets/custom/group/customer_manage.js" type="text/javascript"></script>

@endsection
