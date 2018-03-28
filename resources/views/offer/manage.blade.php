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
                </ul>
            </div>
            <h1 class="page-title">
                Manage Offer
            </h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-group pull-right">
                                            <a href="/offer/create" class="btn sbold green">
                                                <i class="fa fa-plus"></i>
                                                Offer
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dataTables_wrapper">
                                <div class="table-scrollable">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="offerListingTable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Offer Id
                                                </th>
                                                <th>
                                                    Offer Title
                                                </th>
                                                <th>
                                                    Start Date
                                                </th>
                                                <th>
                                                    End Date
                                                </th>
                                                <th>
                                                    Company Name
                                                </th>
                                                <th>
                                                    Status
                                                </th>
                                                <th>
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


