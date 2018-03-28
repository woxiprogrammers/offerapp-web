<?php
/**
 * Created by PhpStorm.
 * User: harsha
 * Date: 25/3/18
 * Time: 5:18 PM
 */
?>

@extends('layouts.offerApp')
@section('title','OfferApp | Create Offer')
@section('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />

    <!-- END PAGE LEVEL PLUGINS -->
@endsection
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content" style="min-height: 1092px;">
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="/">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="/offer/manage">
                            Manage Offer
                        </a>
                    </li>
                </ul>
            </div>
            <h1 class="page-title">
                Create Offer
            </h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-body">
                            <form method="post" class="form-horizontal" action="/offer/create">
                                {!! csrf_field() !!}
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label class="control-label pull-right">
                                                Offer Type:
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="offer_type_id" class="form-control" id="offerTypeId">
                                                @foreach($offerTypes as $offerType)
                                                    <option value="{{$offerType['id']}}">{{$offerType['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label class="control-label pull-right">
                                                Category :
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="category_id" class="form-control" id="categoryId">
                                                @foreach($categories as $category)
                                                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label class="control-label pull-right">
                                                Seller :
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="seller_address_id" class="form-control" id="sellerAddressId">
                                                <option value="">--Select Seller Address--</option>
                                                @foreach($sellerAddresses as $sellerAddress)
                                                    <option value="{{$sellerAddress['id']}}">{{$sellerAddress['shop_name']}} - {{$sellerAddress['address']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label class="control-label pull-right">
                                                Validity :
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group input-large date-picker input-daterange" data-date-format="yyyy-mm-dd">
                                                <span class="input-group-addon"> From </span>
                                                <input type="text" class="form-control" name="valid_from" id="fromDate">
                                                <span class="input-group-addon"> To </span>
                                                <input type="text" class="form-control" name="valid_to">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label class="control-label pull-right">
                                                Description :
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div id="tab_images_uploader_filelist" class="col-md-6 col-sm-12"> </div>

                                        </div>

                                        <div id="tab_images_uploader_container" class="form-group ">
                                            <div class="col-md-3">
                                                <label class="control-label pull-right">
                                                    Select Images :
                                                </label>
                                            </div>
                                            <a id="tab_images_uploader_pickfiles" href="javascript:;" class="btn green-meadow">
                                                Browse</a>
                                            <a id="tab_images_uploader_uploadfiles" href="javascript:;" class="btn btn-primary">
                                                <i class="fa fa-share"></i> Upload Files </a>
                                        </div>
                                        <table class="table table-bordered table-hover" align="center" style="width: 700px">
                                            <thead>
                                            <tr role="row" class="heading">
                                                <th> Image </th>
                                                <th> Action </th>
                                            </tr>
                                            </thead>
                                            <tbody id="show-product-images">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn sbold green pull-right">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <input type="hidden" id="path" name="path" value="">
                            <input type="hidden" id="max_files_count" name="max_files_count" value="3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="/assets/global/plugins/moment.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
    <script src="/assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/plupload/js/plupload.full.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/jstree/dist/jstree.min.js" type="text/javascript"></script>
    <script src="/assets/custom/offer/image-datatable.js"></script>
    <script src="/assets/custom/offer/image-upload.js"></script>
    <script>
        $(document).ready(function(){

        });
    </script>
@endsection

