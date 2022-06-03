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
    modalHeaderText: '',
    modalBodyText: '',
    buttonLabel: 'Únete',

    isEmail(email) {
      var re = /\S+@\S+\.\S+/;
      return re.test(email);
    },

    passwordConfirm() {
      let $confirm = false;
      if (
        strcmp($this.formData.password, $this.formData.confirmPassword) == 0
      ) {
        $confirm = true;
      }
      return $confirm;
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
