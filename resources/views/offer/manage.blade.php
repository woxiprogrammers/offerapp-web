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
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="offetListingTable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Id
                                                </th>
                                                <th>
                                                    Title
                                                </th>
                                                <th>
                                                    Valid from
                                                </th>
                                                <th>
                                                    Valid to
                                                </th>
                                                <th>
                                                    Shop Name
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
    <script src="../assets/custom/offer/offerlisting-datatables.js"></script>
    <script>
        $(document).ready(function() {
            $('#offetListingTable').DataTable();
        });
    </script>>

@endsection

