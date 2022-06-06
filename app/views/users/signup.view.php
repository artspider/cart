<?php require(APPROOT . '/views/partials/head.php'); ?>

<?php flash('register_error'); ?>

<div x-data="validation" >
  <input id="emailVal" name="emailVal" type="hidden" value="<?= $data['email']; ?>">
  <input id="nameVal" name="nameVal" type="hidden" value="<?= $data['name']; ?>">
  <input id="lastnameVal" name="lastnameVal" type="hidden" value="<?= $data['lastname']; ?>">
  <input id="passwordVal" name="passwordVal" type="hidden" value="<?= $data['password']; ?>">
  <input id="errorsVal" name="errorsVal" type="hidden" value="<?= $data['errors']; ?>">

  
  
  <div class="signup bg-neutral flex my-16 mx-10 rounded-md drop-shadow-md" >
    <div class="signup-form w-1/2 p-10">
      <div class="signup__header text-center mb-6">
        <h2 class="text-xl text-laces">HAZTE MIEMBRO DE SNEAKERS SHOP</h2>
        <p class="text-poppins text-sm text-gray-600 mt-4 mx-10">Crea tu perfil como miembro y obtén acceso anticipado a los mejores productos, la inspiración y la comunidad.</p>
      </div>
      <form autocomplete="off" action="<?= URLROOT; ?>/users/signup" method="post" class="w-4/5 mx-auto" @submit.prevent="submitData" id="singupform">
        <div class="email-input relative mb-4">
          <input autocomplete="false" type="email" name="email" id="email" placeholder="Dirección de Correo Electrónico" x-model="formData.email"
                class="form w-full rounded drop-shadow-md focus:border-blue-400 focus:ring-blue-500" value="<?= $data['email']; ?>">
          <svg class="fill-current text-gray-500 w-6 absolute top-2 right-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path>
          </svg>
        </div>

        <div class="nombre-input relative mb-4">
          <input type="text" name="name" id="name" placeholder="Nombre(s)" x-model="formData.name"
                class="form w-full rounded drop-shadow-md focus:border-blue-400 focus:ring-blue-500"
                x-bind:class="{'invalid':name.errorMessage}" data-rules='["required"]' data-server-errors='[]'>
            <svg class="fill-current text-gray-500 w-6 absolute top-2 right-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm8.127 19.41c-.282-.401-.772-.654-1.624-.85-3.848-.906-4.097-1.501-4.352-2.059-.259-.565-.19-1.23.205-1.977 1.726-3.257 2.09-6.024 1.027-7.79-.674-1.119-1.875-1.734-3.383-1.734-1.521 0-2.732.626-3.409 1.763-1.066 1.789-.693 4.544 1.049 7.757.402.742.476 1.406.22 1.974-.265.586-.611 1.19-4.365 2.066-.852.196-1.342.449-1.623.848 2.012 2.207 4.91 3.592 8.128 3.592s6.115-1.385 8.127-3.59zm.65-.782c1.395-1.844 2.223-4.14 2.223-6.628 0-6.071-4.929-11-11-11s-11 4.929-11 11c0 2.487.827 4.783 2.222 6.626.409-.452 1.049-.81 2.049-1.041 2.025-.462 3.376-.836 3.678-1.502.122-.272.061-.628-.188-1.087-1.917-3.535-2.282-6.641-1.03-8.745.853-1.431 2.408-2.251 4.269-2.251 1.845 0 3.391.808 4.24 2.218 1.251 2.079.896 5.195-1 8.774-.245.463-.304.821-.179 1.094.305.668 1.644 1.038 3.667 1.499 1 .23 1.64.59 2.049 1.043z"/>
          </svg>
          <p class="error-message" x-show="name.errorMessage" x-text="name.errorMessage" x-transition:enter></p>
        </div>

        <div class="apellidos-input relative mb-4">
          <input type="text" name="lastname" id="lastname" placeholder="apellidos(s)" x-model="formData.lastname"
                class="form w-full rounded drop-shadow-md focus:border-blue-400 focus:ring-blue-500">
            <svg class="fill-current text-gray-500 w-6 absolute top-2 right-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm8.127 19.41c-.282-.401-.772-.654-1.624-.85-3.848-.906-4.097-1.501-4.352-2.059-.259-.565-.19-1.23.205-1.977 1.726-3.257 2.09-6.024 1.027-7.79-.674-1.119-1.875-1.734-3.383-1.734-1.521 0-2.732.626-3.409 1.763-1.066 1.789-.693 4.544 1.049 7.757.402.742.476 1.406.22 1.974-.265.586-.611 1.19-4.365 2.066-.852.196-1.342.449-1.623.848 2.012 2.207 4.91 3.592 8.128 3.592s6.115-1.385 8.127-3.59zm.65-.782c1.395-1.844 2.223-4.14 2.223-6.628 0-6.071-4.929-11-11-11s-11 4.929-11 11c0 2.487.827 4.783 2.222 6.626.409-.452 1.049-.81 2.049-1.041 2.025-.462 3.376-.836 3.678-1.502.122-.272.061-.628-.188-1.087-1.917-3.535-2.282-6.641-1.03-8.745.853-1.431 2.408-2.251 4.269-2.251 1.845 0 3.391.808 4.24 2.218 1.251 2.079.896 5.195-1 8.774-.245.463-.304.821-.179 1.094.305.668 1.644 1.038 3.667 1.499 1 .23 1.64.59 2.049 1.043z"/>
          </svg>
        </div>

        <div class="password-input relative mb-4">
          <input x-on:input.change="passwordConfirm()" type="password" name="password" id="password" placeholder="Ingrese contraseña" x-model="formData.password"
                class="form w-full rounded drop-shadow-md focus:border-blue-400 focus:ring-blue-500">
          <svg class="fill-current text-gray-500 w-6 absolute top-2 right-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10 17c0 .552-.447 1-1 1s-1-.448-1-1 .447-1 1-1 1 .448 1 1zm3 0c0 .552-.447 1-1 1s-1-.448-1-1 .447-1 1-1 1 .448 1 1zm3 0c0 .552-.447 1-1 1s-1-.448-1-1 .447-1 1-1 1 .448 1 1zm2-7v-4c0-3.313-2.687-6-6-6s-6 2.687-6 6v4h-3v14h18v-14h-3zm-10-4c0-2.206 1.795-4 4-4s4 1.794 4 4v4h-8v-4zm11 16h-14v-10h14v10z"/>
          </svg>
        </div>

        <div class="repeat-password-input relative mb-4">
          <input x-on:input.change="passwordConfirm()" type="password" name="confirm-password" id="confirm-password" placeholder="Confirme contraseña" x-model="formData.confirmPassword"
                class="form w-full rounded drop-shadow-md focus:border-blue-400 focus:ring-blue-500">
          <svg class="fill-current text-gray-500 w-6 absolute top-2 right-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10 17c0 .552-.447 1-1 1s-1-.448-1-1 .447-1 1-1 1 .448 1 1zm3 0c0 .552-.447 1-1 1s-1-.448-1-1 .447-1 1-1 1 .448 1 1zm3 0c0 .552-.447 1-1 1s-1-.448-1-1 .447-1 1-1 1 .448 1 1zm2-7v-4c0-3.313-2.687-6-6-6s-6 2.687-6 6v4h-3v14h18v-14h-3zm-10-4c0-2.206 1.795-4 4-4s4 1.794 4 4v4h-8v-4zm11 16h-14v-10h14v10z"/>
          </svg>
        </div>

        <!-- <div class="estado-input relative mb-4">
          <input type="text" name="estado" id="estado" placeholder="Estado"
                class="form w-full rounded drop-shadow-md focus:border-blue-400 focus:ring-blue-500">
        </div>

        <div class="ciudad-input relative mb-4">
          <input type="text" name="ciudad" id="ciudad" placeholder="Ciudad"
                class="form w-full rounded drop-shadow-md focus:border-blue-400 focus:ring-blue-500">
        </div>

        <div class="edad-input relative mb-4">
          <input type="number" name="edad" id="edad" min="15" placeholder="Edad"
                class="form w-full rounded drop-shadow-md focus:border-blue-400 focus:ring-blue-500">
        </div>

        <div class="genero-input relative mb-6 flex">
          <div class="genero-femenino w-1/2 text-center">
            <input type="radio" name="genero" id="femenino" value="femenino">
            <label for="femenino" class="ml-2">Femenino</label>
          </div>

          <div class="genero-masculino w-1/2">
          <input type="radio" name="genero" id="masculino" value="masculino">
          <label for="masculino" class="ml-2">Masculino</label>
          </div>
        </div> -->

        <h3 class="text-sm text-primary text-center">
          Al crear una cuenta, aceptas la Política de privacidad y los Términos de uso de SNEAKERS SHOP.
        </h3>

        <!-- Validacion -->
        <div class="flex justify-start mt-3 ml-4 p-1">
          <ul>
            <!-- Validate Email -->
            <li x-show="formData.email.length > 0" class="flex items-center py-1">
              <div 
              :class="{'bg-green-200 text-green-700': isEmail(formData.email),
               'bg-red-200 text-red-700': !isEmail(formData.email)}"
                class=" rounded-full p-1 fill-current ">
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" 
                    stroke="currentColor">
                    <path
                        x-show="isEmail(formData.email)"
                        stroke-linecap="round" stroke-linejoin="round" 
                        stroke-width="2" d="M5 13l4 4L19 7" />
                    <path
                        x-show="!isEmail(formData.email)"
                        stroke-linecap="round" stroke-linejoin="round" 
                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
              </div>
              <span
                :class="{'text-green-700': isEmail(formData.email), 
                  'text-red-700': !isEmail(formData.email)}"
                class="font-medium text-sm ml-3"
                x-text="isEmail(formData.email) ? 
                'Email valido' : '¡Email no válido!' "></span>
            </li>

            <!-- Validate Password -->
            <li x-show="formData.password.length > 0" class="flex items-center py-1">
              <div 
                :class="{'bg-green-200 text-green-700': formData.password.length > 7,
                'bg-red-200 text-red-700':formData.password.length < 8 }"
                  class=" rounded-full p-1 fill-current ">
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path 
                        x-show="formData.password.length > 7" stroke-linecap="round"
                        stroke-linejoin="round" 
                        stroke-width="2" d="M5 13l4 4L19 7" />
                      <path x-show="formData.password.length < 8" 
                        stroke-linecap="round" stroke-linejoin="round" 
                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
              </div>
              <span
                  :class="{'text-green-700': formData.password.length > 7, 
                  'text-red-700':formData.password.length < 8 }"
                  class="font-medium text-sm ml-3"
                  x-text="formData.password.length > 7 ? 
                  'Contraseña alcanzo el mínimo requerido' : 
                  'Se requieren al menos 8 caracteres para la contraseña' ">
              </span>
            </li>

            <!-- Validate Password Confirm -->
            <li x-show="passwordMin" class="flex items-center py-1">
              <div 
              :class="{'bg-green-200 text-green-700':confirmPasswordStatus, 'bg-red-200 text-red-700': !confirmPasswordStatus}"
                class=" rounded-full p-1 fill-current ">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                        x-show="confirmPasswordStatus"
                        stroke-linecap="round" stroke-linejoin="round" 
                        stroke-width="2" d="M5 13l4 4L19 7" />
                    <path
                        x-show="!confirmPasswordStatus"
                        stroke-linecap="round" stroke-linejoin="round" 
                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </div>

              <span
                :class="{'text-green-700': 
                  confirmPasswordStatus,
                'text-red-700':!confirmPasswordStatus}"
                class="font-medium text-sm ml-3"
                x-text="confirmPasswordStatus ? 
                'Passwords coinciden' : 'Passwords no coincide' "></span>
            </li>

          </ul>
        </div>
       
        
        <!-- -->

        <button x-text="buttonLabel" type="submit" class="text-neutral bg-secondary w-full py-3 mt-4 hover:bg-black"></button>
      </form>
    </div>
    <div class="signup-image w-1/2 flex item-center">
      <img src="<?php echo URLROOT; ?>/images/fitness.png" alt="">
    </div>
  </div>
</div>
<?php require(APPROOT . '/views/partials/footer.php'); ?>
