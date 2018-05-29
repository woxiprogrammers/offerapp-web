<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 28/5/18
 * Time: 2:25 PM
 */
?>
@extends('layouts.offerApp')
@section('title','OfferApp | Promote Offer')
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
                        <a href="{{ route('groupListing') }}">Promote Offer</a>
                        <i class="fa fa-circle"></i>
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
                                <span class="caption-subject font-dark bold uppercase">Promote Offer</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_promote_offer_create" data-toggle="tab"> Create </a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                @if(session()->has('success'))
                                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                                @elseif(session()->has('error'))
                                    <div class="alert alert-danger">{{ session()->get('error') }}</div>
                                @endif
                                <div class="tab-pane active" id="tab_promote_offer_create">
                                    <!-- BEGIN: Create Group-->
                                    <div class="mt-actions">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 ">
                                                <form class="profile-form" action="{{ route('promoteOffer') }}" method="post" role="form">
                                                    {{ csrf_field() }}
                                                    <div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}" id="group_id">
                                                        <label class="col-md-2 control-label">Select Groups:
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-10">
                                                            <div class="scroller" style="height:275px;" data-always-visible="1">
                                                                <ul class="list-unstyled">
                                                                    @foreach($groups as $group)
                                                                        <li>
                                                                            <label>
                                                                                <input type="checkbox" name="group_id[]" value="{{$group->id}}">{{$group->name}}</label>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group{{ $errors->has('offer_id') ? ' has-error' : '' }}" id="offer_id">
                                                        <label >Select Offer Name:</label>
                                                        <span class="required"> * </span>
                                                        <div class="input-icon">
                                                            <i class="fa fa-cubes"></i>
                                                            <select name="offer_id" class="form-control" id="offer_id">
                                                                <option value="null">--Select Offer-- </option>

                                                            @foreach($offers as $offer)
                                                                    <option value="{{$offer->id}}">{{$offer->offerType->name}}</option>
                                                            @endforeach
                                                            </select>

                                                            @if ($errors->has('offer_id'))
                                                                <span class="help-block alert-danger">
                                                        <strong>{{ $errors->first('offer_id') }}</strong>
                                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-actions">
                                                        <button type="submit" class="btn blue btn-outline"> Promote </button>
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
@endsection
