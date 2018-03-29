<?php
/**
 * Created by PhpStorm.
 * User: arvind
 * Date: 2/3/18
 * Time: 3:33 PM
 */
?>
@extends('layouts.offerApp')
@section('title','OfferApp | Manage Seller')
@section('css')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
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
                        <a href="{{ route('customerListing') }}">Seller</a>
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
                <small>Customer Listing</small>
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light portlet-fit portlet-datatable bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-user font-blue"></i>
                                <span class="caption-subject font-blue sbold uppercase">Customer Datatable</span>
                            </div>

                        </div>
                        <div class="portlet-body">
                            <div class="table-container">
                                <div class="dataTables_wrapper">

                                        <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="customerListingTable">
                                            <thead>
                                            <tr role="row" class="heading">
                                                <th width="2%">
                                                    Id
                                                </th>
                                                <th width="10%">
                                                    Customer Name
                                                </th>
                                                <th width="10%">
                                                    E-mail Id
                                                </th>
                                                <th width="10%">
                                                    Mobile No
                                                </th>
                                                <th width="5%">
                                                    Action
                                                </th>
                                            </tr>
                                            <tr role="row" class="filter">
                                                <td>
                                                    <input type="text" class="form-control form-filter input-sm" name="id" readonly> </td>
                                                <td>
                                                    <input type="text" class="form-control form-filter input-sm" name="customer_name"> </td>
                                                <td>
                                                    <input type="text" class="form-control form-filter input-sm" name="email"> </td>
                                                <td>
                                                    <input type="text" class="form-control form-filter input-sm" name="mobile_no"> </td>
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
        <!-- END CONTENT BODY -->
    </div>
@endsection
@section('javascript')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
    <script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../assets/custom/superadmin/customer/manage-datatable.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->

    <script>
        $(document).ready(function() {
            $('#customerlistingTable').DataTable();
        });

        /*function changeStatus(element){
            var token = $('input[name="_token"]').val();
            $(element).next('input[name="_token"]').val(token);
            $(element).closest('form').submit();
        }*/
    </script>
@endsection


