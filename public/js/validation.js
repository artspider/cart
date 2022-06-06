let validation = () => {
  return {
    formData: {
      name: '',
      lastname: '',
      email: '',
      password: '',
      confirmPassword: '',
    },
    status: false,
    loading: false,
    isError: false,

    passwordMin: false,
    confirmPasswordStatus: false,
    modalHeaderText: '',
    modalBodyText: '',
    buttonLabel: 'Únete',
    init() {
      this.formData.email = document.getElementById('emailVal').value;
      this.formData.name = document.getElementById('nameVal').value;
      this.formData.lastname = document.getElementById('lastnameVal').value;
      this.formData.password = document.getElementById('passwordVal').value;
      this.isError = document.getElementById('errorsVal').value;
    },

    isEmail(email) {
      var re = /\S+@\S+\.\S+/;
      return re.test(email);
    },

    passwordConfirm() {
      let pass = this.formData.password;
      let pass_confirm = this.formData.confirmPassword;
      if (pass_confirm.length > 0) {
        this.passwordMin = true;
      } else {
        this.passwordMin = false;
      }
      if (pass === pass_confirm && pass_confirm.length > 0) {
        this.confirmPasswordStatus = true;
      } else {
        this.confirmPasswordStatus = false;
      }
      console.log('password_confirm > 0: ' + this.passwordMin);
      console.log('passwords iguales: ' + this.confirmPasswordStatus);
      return this.confirmPasswordStatus;
    },

    submitData() {
      // Ensures all fields have data before submitting
      if (
        !this.formData.name.length ||
        !this.formData.lastname.length ||
        !this.formData.email.length ||
        !this.formData.password.length ||
        !this.formData.confirmPassword.length
      ) {
        //alert('Please fill out all required field and try again!');
        Swal.fire('Por favor llene los campos requeridos ');
        return;
      }
      this.buttonLabel = 'Submitting...';
      this.loading = true;
      //window.location.href = 'http://localhost/cart/users/signup';
      document.getElementById('singupform').submit();
    },
  };
};
