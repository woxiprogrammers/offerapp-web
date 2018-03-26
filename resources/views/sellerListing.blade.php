@extends('layouts.offerApp')

@section('content')

    <div class="page-content-wrapper ">
        <div class="page-content">
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="{{ route('sellerListing') }}">Manage Seller</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Listing</span>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light portlet-fit bordered">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-settings font-red"></i>
                                <span class="caption-subject font-red sbold uppercase">Seller Table</span>
                            </div>

                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <button id="sample_editable_1_new" class="btn green"> Add New
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn-group pull-right">
                                            <button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Print </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Save as PDF </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Export to Excel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Seller Name </th>
                                    <th> Shop Name </th>
                                    <th> E-mail Id </th>
                                    <th> Edit </th>
                                    <th> Delete </th>
                                </tr>
                                <tr>
                                    <th> <input  type="text" class="form-control input-small" required name="id" value=""/> </th>
                                    <th> <input  type="text" class="form-control input-small" required name="sellername" value=""/> </th>
                                    <th> <input  type="text" class="form-control input-small" required name="shopName" value=""/> </th>
                                    <th> <input  type="text" class="form-control input-small" required name="email" value=""/> </th>
                                    <th>  </th>
                                    <th>  </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td> alex </td>
                                    <td> Alex Nilson </td>
                                    <td> 1234 </td>
                                    <td class="center"> power user </td>
                                    <td>
                                        <a class="edit" href="javascript:;"> Edit </a>
                                    </td>
                                    <td>
                                        <a class="delete" href="javascript:;"> Delete </a>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->


@endsection
