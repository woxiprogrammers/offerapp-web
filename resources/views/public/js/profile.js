var Login = function () {

  var handleProfile = function () {

         $('.profile-form').validate({
              errorElement: 'span', //default input error message container
              errorClass: 'help-block', // default input error message class
              focusInvalid: false, // do not focus the last invalid input
              ignore: "",
              rules: {

                  firstName: {
                      required: true
                  },
                  shopName: {
                      required: true,
                      email: true
                  },
                  address: {
                      required: true
                  },
                  mobileNo: {
                      required: true
                  },

                  zipcode: {
                      required: true
                  },
                  website: {
                      required: true
                  },

                  avatar: {
                      required: true
                  }
              },

              messages: { // custom messages for radio buttons and checkboxes
                  avatar: {
                      required: "Please insert an Logo."
                  }
              },

              invalidHandler: function (event, validator) { //display error alert on form submit

              },

              highlight: function (element) { // hightlight error inputs
                  $(element)
                      .closest('.form-group').addClass('has-error'); // set error class to the control group
              },

              success: function (label) {
                  label.closest('.form-group').removeClass('has-error');
                  label.remove();
              },

              errorPlacement: function (error, element) {
                  if (element.closest('.input-icon').size() === 1) {
                      error.insertAfter(element.closest('.input-icon'));
                  } else {
                    error.insertAfter(element);
                  }
              },

              submitHandler: function (form) {
                  form.submit();
              }
          });

      $('.profile-form input').keypress(function (e) {
              if (e.which == 13) {
                  if ($('.profile-form').validate().form()) {
                      $('.profile-form').submit();
                  }
                  return false;
              }
          });

          return {
              //main function to initiate the module
              init: function () {
                  handleProfile();
              }
          };


  }

}();


jQuery(document).ready(function() {
    Login.init();
});
