<?php
/**
 * Created by PhpStorm.
 * User: arvind
 * Date: 31/5/18
 * Time: 8:20 PM
 */
?>
@extends('layouts.offerApp')
@section('title','Seller | Profile')
@section('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="/assets/global/plugins/cubeportfolio/css/cubeportfolio.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="/assets/pages/css/portfolio.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
@endsection
@section('content')
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper ">
            <div class="page-content">
                <div class="">
                    <!-- BEGIN PAGE CONTENT INNER -->
                    <div class="page-content-inner">
                        <div class=" cbp-singlePage portfolio-content" rel="nofollow">
                            <div class="cbp-l-project-title">{{auth()->user()->first_name.' '.auth()->user()->last_name}}</div>
                            <div class="cbp-l-project-subtitle">Owner of {{$seller_address->shop_name}}</div>
                            <div class="cbp-slider">
                                <ul class="cbp-slider-wrap">
                                    <li class="cbp-slider-item">
                                        <a href="" class="cbp-lightbox">
                                            <img src="{{($seller_address->sellerAddressImage->first() == null) ? '/uploads/user_profile_male.jpg' : env('SELLER_ADDRESS_IMAGE_UPLOAD') . sha1($seller_address->id).DIRECTORY_SEPARATOR.$seller_address->sellerAddressImage->first()}}"  alt="">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="cbp-l-project-container">
                                <div class="cbp-l-project-desc">
                                    <div class="cbp-l-project-desc-title">
                                        <span>Seller Description</span>
                                    </div>
                                    <div class="cbp-l-project-desc-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, cumque, earum blanditiis incidunt minus commodi consequatur provident quae. Nihil, alias, vel consequatur ab aliquam aspernatur optio harum facilis excepturi mollitia autem
                                        voluptas cum ex veniam numquam quia repudiandae in iure. Assumenda, vel provident molestiae perferendis officia commodi asperiores earum sapiente inventore quam deleniti mollitia consequatur expedita quaerat natus praesentium beatae aut
                                        ipsa non ex ullam atque suscipit ut dignissimos magnam!</div>
                                </div>
                                <div class="cbp-l-project-details">
                                    <div class="cbp-l-project-details-title">
                                        <span>Seller's Details</span>
                                    </div>
                                    <ul class="cbp-l-project-details-list">
                                        <li>
                                            <strong>Name</strong>{{$seller_address->seller->user->first_name.' '.$seller_address->seller->user->last_name}}</li>
                                        <li>
                                            <strong>Shop Address</strong>{{$seller_address->address}}</li>
                                        <li>
                                            <strong>Contact Us</strong>{{$seller_address->landline}}</li>
                                    </ul>
                                    <a href="{{route('home')}}"  class="cbp-l-project-details-visit btn red uppercase">visit the site</a>
                                </div>
                            </div>
                            <!-- BEGIN: Seller Offers List -->
                            @if(count($offers)>0)
                                <section class="offers">
                                    @include('seller.seller_offer_load')
                                </section>
                            @else
                                <p>Sorry No Offer Found....</p>
                            @endif
                            <!-- END: Seller Offers List -->

                            </div>

                    </div>
                    <!-- END PAGE CONTENT BODY -->
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
                <!-- BEGIN QUICK SIDEBAR -->
                <!-- END QUICK SIDEBAR -->
            </div>
        </div>
        <!-- END CONTENT -->
@endsection
@section('javascript')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="/assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/pages/scripts/portfolio-1.js" type="text/javascript"></script>
    <script src="/assets/custom/seller/load_offer.js" type="text/javascript"></script>

    <!-- END PAGE LEVEL SCRIPTS -->
@endsection
