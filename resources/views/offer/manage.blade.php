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
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="{{ route('offerListing') }}">Offer</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Listing</span>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Super Admin
                <small>Offer Listing</small>
            </h3>
            <!-- END PAGE TITLE-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light portlet-fit portlet-datatable bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-cubes font-green-haze"></i>
                                <span class="caption-subject font-green-haze sbold uppercase">Offer Datatable</span>
                            </div>

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

                        </div>
                        <div class="portlet-body">
                            <div class="dataTables_wrapper">
                                <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="offerListingTable">
                                        <thead>
                                            <tr role="row" class="heading">
                                                <th width="2%">
                                                    Id
                                                </th>
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
                                                <th width="5%">
                                                    Status
                                                </th>
                                                <th width="5%">
                                                    Action
                                                </th>
                                            </tr>
                                            <tr role="row" class="filter">
                                                <td>
                                                    <input type="text" class="form-control form-filter input-sm" name="id" readonly> </td>
                                                <td>
                                                    <input type="text" class="form-control form-filter input-sm" name="title"> </td>
                                                <td>
                                                    <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                                        <input type="text"  class="form-control form-filter input-sm"  name="valid_from" placeholder="Valid From">
                                                        <span class="input-group-btn">
                                                                <button class="btn btn-sm default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
                                                        <input type="text"  class="form-control form-filter input-sm"  name="valid_to" placeholder="Valid To">
                                                        <span class="input-group-btn">
                                                                <button class="btn btn-sm default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control form-filter input-sm" name="shopName"> </td>
                                                <td>
                                                    <input type="text" class="form-control form-filter input-sm" name="status"> </td>
                                                <td>
                                                    <div class="margin-bottom-5">
                                                        <button class="btn btn-sm green btn-outline filter-submit margin-bottom">
                                                            <i class="fa fa-search"></i> Search</button>
                                                    </div>
                                                    <button class="btn btn-sm red btn-outline filter-cancel">
                                                        <i class="fa fa-times"></i> Reset</button>
                                                </td>
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

        /*$(document).ready(function changeStatus(element){
            var token = $('input[name="_token"]').val();
            $(element).next('input[name="_token"]').val(token);
            $(element).closest('form').submit();
        });*/


    </script>
@endsection


