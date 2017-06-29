// Wait for the DOM to be ready
$.validator.addMethod('mypassword', function(value, element) {
        return this.optional(element) || (value.match(/[a-z]/) && value.match(/[0-9]/) && value.match(/[A-Z]/));
    },
    'Password must contain at least one numeric, lowercase and uppercase');


$.validator.addMethod('nodigits', function(value, element) {
        // return this.optional(element) || (value.match(/^[a-z]/) || value.match(/[A-Z]/));
        return this.optional(element) || (value.match(/^([^0-9]*)$/));
        
    },	
    'Password must contain only characters');


$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='registration']").validate({
    // Specify validation rules
    rules: {

      Username: "required",
      
      FirstName: {
      	required:true,
      	nodigits: true

      },

      SecondName: {
      	required: true,
      	nodigits: true
      },

      Email: {
        required: true,
        email: true
      },

      Password: {
        required: true,
        minlength: 8,
        mypassword: true
      },

      ConfirmPassword: {
      	equalTo: '#Password'
      },

      Contact: {
        number: true,
        minlength: 8,
        required: true
      }
    },
    
    messages: {

      FirstName: {
		required: "Please enter your first name",
		nodigits: "Field must contain only characters"
		},

      SecondName: {
      	required: "Please enter your last name",
      	nodigits: "Field must contain only characters"
      },

      Username: "This field is required",
      
      Password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 8 characters long"
      },

      ConfirmPassword: {
      	equalTo: "Password does not matches"
      },

      Email: "Please enter a valid email address",

      Contact: {
        number: "Please enter a valid number",
        minlength: "Please enter a valid number",
        required: "Please enter your contact number"
      }
      
      //ConfirmEmail: "Email should match",
      
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});