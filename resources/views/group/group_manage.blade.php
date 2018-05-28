<?php
/**
 * Created by PhpStorm.
 * User: arvind
 * Date: 25/5/18
 * Time: 6:09 PM
 */
?>
@extends('layouts.offerApp')
@section('title','OfferApp | Manage Groups')
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
                        <span>Listing</span>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Group's
                <small>Listing</small>
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption">
                                <i class=" icon-social-twitter font-dark hide"></i>
                                <span class="caption-subject font-dark bold uppercase">Groups</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_group_listing" data-toggle="tab"> Listing </a>
                                </li>
                                <li>
                                    <a href="#tab_group_create" data-toggle="tab"> Create </a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_group_listing">
                                    <!-- BEGIN: Group List -->
                                    @if(count($groups)>0)
                                        <section class="groups">
                                            @include('group.group_load')
                                        </section>
                                    @else
                                        <p>Sorry No Group Found....</p>
                                    @endif

                                    <!-- END: Group List -->
                                </div>
                                <div class="tab-pane" id="tab_group_create">
                                    <!-- BEGIN: Create Group-->
                                    <div class="mt-actions">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 ">
                                                <form class="profile-form" action="{{ route('createGroup') }}" method="post" role="form">
                                                {{ csrf_field() }}
                                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="name">
                                                        <label >Group Name</label>
                                                        <div class="input-icon">
                                                            <i class="fa fa-user"></i>
                                                            <input class="form-control placeholder-no-fix" type="text" placeholder="Group Name"
                                                                   value="" name="name">

                                                            @if ($errors->has('name'))
                                                                <span class="help-block alert-danger">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group{{ $errors->has("description") ? ' has-error' : '' }}" id="description">
                                                        <label >Group Description</label>
                                                        <div class="input-icon">
                                                            <i class="fa fa-edit"></i>
                                                            <textarea class="form-control placeholder-no-fix" rows="4" cols="50" placeholder="Group Description"
                                                                      value="" name="description"  ></textarea>
                                                            @if ($errors->has("description"))
                                                                <span class="help-block alert-danger">
                                                        <strong>{{ $errors->first("description") }}</strong>
                                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn red btn-outline"> Create </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    <!-- END: Create Group -->
                                    </div>
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
    <script src="../assets/custom/group/manage.js" type="text/javascript"></script>
@endsection