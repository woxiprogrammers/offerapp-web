<?php
/**
 * Created by PhpStorm.
 * User: harsha
 * Date: 25/3/18
 * Time: 3:31 PM
 */
?>

@extends('layouts.offerApp')
@section('title','OfferApp | Manage Offer')
@section('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link rel="stylesheet"  href="/assets/global/plugins/datatables/datatables.min.css"/>
    <!-- END PAGE LEVEL PLUGINS -->
@endsection
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content" style="min-height: 1092px;">
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="{{ route('offerListing') }}">Offer Listing</a>
                        <i class="fa fa-circle"></i>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->

            <!-- END PAGE TITLE-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light portlet-fit portlet-datatable bordered">
                        <div class="portlet-title">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-group pull-right">
                                        <a href="/offer/create" class="btn green">
                                            <i class="fa fa-plus"></i>
                                            Offer
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="dataTables_wrapper">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="offerListingTable">
                                    <thead>
                                        <tr role="row" class="heading">
                                            <th width="15%">
                                                Title
                                            </th>
                                            <th width="10%">
                                                Valid from
                                            </th>
                                            <th width="10%">
                                                Valid to
                                            </th>
                                            <th width="15%">
                                                Shop Name
                                            </th>
                                            <th width=10%">
                                                Status
                                            </th>
                                            <th width="20%">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script  src="/assets/global/plugins/datatables/datatables.min.js"></script>
    <script src="/assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="/assets/custom/offer/manage-datatable.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#offerListingTable').DataTable();
        });

    </script>
@endsection


