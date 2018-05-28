<?php
/**
 * Created by PhpStorm.
 * User: arvind
 * Date: 26/5/18
 * Time: 10:32 AM
 */
?>
@extends('layouts.offerApp')
@section('title','OfferApp | Groups Offer')
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
                        <span>Offers</span>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Group's
                <small>Offer Listing</small>
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title tabbable-line">
                            <div class="caption">
                                <i class=" icon-social-twitter font-dark hide"></i>
                                <span class="caption-subject font-dark bold uppercase">Offers</span>
                            </div>

                        </div>
                        <div class="portlet-body">
                            @if(isset($error))
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endif
                            <div class="tab-content">
                                <!-- BEGIN: Group Offers List -->
                                @if(count($offers)>0)
                                    <section class="offers">
                                        @include('group.offer_load')
                                    </section>
                                @else
                                    <p>Sorry No Offer Found....</p>
                                @endif
                                <!-- END: Group Offers List -->
                                <a href="{{ route('groupListing') }}" class="btn red btn-outline"> Back </a>

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
    <script src="/assets/custom/group/offer_manage.js" type="text/javascript"></script>

@endsection
