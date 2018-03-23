<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.6
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>OFFER APP | User Login </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="../assets/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" />
        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
      </head>
    <!-- END HEAD -->

    <body class=" login">
      @if(isset($errors))
          @foreach($errors as $error)
          <div class="note note-danger">
              <p>{{$error}}</p>
          </div>
          @endforeach
      @endif
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="../assets/pages/img/login/logo1.png"  alt="App Logo" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN REGISTRATION FORM -->
            <form class="register-form" action="#" method="post">
              {{ csrf_field() }}
                <h3>Sign Up</h3>
                <p> Enter your personal details below: </p>

                {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="name">
                    <label class="control-label visible-ie8 visible-ie9">User Type</label>
                    <div >
                        <i class="fa fa-users"></i>
                        <input type="radio" name="type" id="type1" value="vendor" checked> Vendor   &nbsp;</input>
                        <i class="fa fa-user"></i>
                        <input type="radio" name="type" id="type2" value="customer" > Customer </input>

                        @if ($errors->has('name'))
                          <span class="help-block alert-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                          </span>
                        @endif
                      </div>
                </div>--}}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="name">
                    <label class="control-label visible-ie8 visible-ie9">Full Name</label>
                    <div class="input-icon">
                        <i class="fa fa-font"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Full Name" name="name" />
                        @if ($errors->has('name'))
                          <span class="help-block alert-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                          </span>
                        @endif
                      </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" id="email">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Email</label>
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" />
                        @if ($errors->has('email'))
                          <span class="help-block alert-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                          </span>
                        @endif
                      </div>
                </div>
                <div class="vendorInfo">
                  <p> Enter the vendor details below:</p>

                  <div class="form-group{{ $errors->has('shopName') ? ' has-error' : '' }}" id="shopName">
                      <div class="input-icon">
                        <i class="fa fa-font"></i>
                          <input class="form-control placeholder-no-fix" type="text" placeholder="Shop Name" name="shopName"  />
                          @if ($errors->has('shopName'))
                            <span class="help-block alert-danger">
                              <strong>{{ $errors->first('shopName') }}</strong>
                            </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}" id="address">
                      <div class="input-icon">
                        <i class="fa fa-font"></i>
                          <input class="form-control placeholder-no-fix" type="text" placeholder="Shop Address" name="address" />
                          @if ($errors->has('address'))
                            <span class="help-block alert-danger">
                              <strong>{{ $errors->first('address') }}</strong>
                            </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}" id="zipCode">
                      <div class="input-icon">
                        <i class="fa fa-font"></i>
                          <input class="form-control placeholder-no-fix" type="text" placeholder="Zip Code" name="zipCode"  />
                          @if ($errors->has('zipcode'))
                            <span class="help-block alert-danger">
                              <strong>{{ $errors->first('zipcode') }}</strong>
                            </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}" id="website">
                      <div class="input-icon">
                        <i class="fa fa-globe"></i>
                          <input class="form-control placeholder-no-fix" type="text" placeholder="http://www.mywebsite.com" name="website"  />
                          @if ($errors->has('website'))
                            <span class="help-block alert-danger">
                              <strong>{{ $errors->first('website') }}</strong>
                            </span>
                          @endif
                      </div>
                  </div>
                </div>

                <p> Enter your account details below: </p>
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}" id="username">
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" />
                        @if ($errors->has('username'))
                          <span class="help-block alert-danger">
                            <strong>{{ $errors->first('username') }}</strong>
                          </span>
                        @endif
                      </div>
                </div>

                <div class="form-group{{ $errors->has('mobile_no') ? ' has-error' : '' }}" id="mobile_no">
                    <label class="control-label visible-ie8 visible-ie9">Mobile.No</label>
                    <div class="input-icon">
                        <i class="fa fa-mobile"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" id="register_mobile_no" placeholder="Mobile .No" name="mobile_no" />
                        @if ($errors->has('mobile_no'))
                          <span class="help-block alert-danger">
                            <strong>{{ $errors->first('mobile_no') }}</strong>
                          </span>
                        @endif
                      </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" id="password">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password" />
                        @if ($errors->has('password'))
                          <span class="help-block alert-danger">
                            <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
                      </div>
                </div>

                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
                    <div class="controls">
                        <div class="input-icon">
                            <i class="fa fa-check"></i>
                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword" />
                            @if ($errors->has('rpassword'))
                              <span class="help-block alert-danger">
                                <strong>{{ $errors->first('rpassword') }}</strong>
                              </span>
                            @endif
                          </div>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label class="mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" />
                        <input type="checkbox" name="tnc" /> I agree to the
                        <a href="javascript:;">Terms of Service </a> &
                        <a href="javascript:;">Privacy Policy </a>
                        <span></span>
                    </label>
                    <div id="register_tnc_error"> </div>
                </div> -->
                <div class="form-actions">
                    <a href="{{route('login')}}" class="btn red btn-outline"> Back </a>
                    <button type="submit" id="register-submit-btn" class="btn green pull-right"> Sign Up </button>
                </div>
            </form>
            <!-- END REGISTRATION FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright"> 2017 &copy; Woxi Software LLP - OFFERAPP </div>
        <!-- END COPYRIGHT -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->


        <!-- BEGIN CORE PLUGINS -->
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/login-4.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

    <script type="text/javascript">
    $(document).ready(function(){

    $('input:radio').on("change",
    function(){
        if ($('input:radio[name="type"]:checked').val() == "vendor") {
          $(".vendorInfo").show();
        }
        else if ($('input:radio[name="type"]:checked').val() == "customer"){
          $(".vendorInfo").hide();
        }
    });

    });
    </script>

</html>
