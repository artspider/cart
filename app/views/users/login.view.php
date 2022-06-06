<?php require(APPROOT . '/views/partials/head.php'); ?>
<?php flash('register_success'); ?>
<?php flash('register_error'); ?>
<div class="container w-1/3 bg-neutral flex my-16 mx-auto rounded-md drop-shadow-md">
  <div class="login-form p-10">
    <h2 class="login-title p-6 text-center">Tu cuenta para todo lo relacionado con SNEAKERS SHOP</h3>
    <form autocomplete="off" action="<?= URLROOT; ?>/users/login" method="post" class="w-4/5 mx-auto" id="loginform">
      <div class="email-input relative mb-4">
        <input autocomplete="false" type="email" name="email" id="email" placeholder="Dirección de Correo Electrónico" 
              class="form w-full rounded drop-shadow-md focus:border-blue-400 focus:ring-blue-500" required>
        <svg class="fill-current text-gray-500 w-6 absolute top-2 right-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path>
        </svg>
      </div>

      <div class="password-input relative mb-4">
        <input type="password" name="password" id="password" placeholder="Ingrese contraseña"
                class="form w-full rounded drop-shadow-md focus:border-blue-400 focus:ring-blue-500" required>
        <svg class="fill-current text-gray-500 w-6 absolute top-2 right-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10 17c0 .552-.447 1-1 1s-1-.448-1-1 .447-1 1-1 1 .448 1 1zm3 0c0 .552-.447 1-1 1s-1-.448-1-1 .447-1 1-1 1 .448 1 1zm3 0c0 .552-.447 1-1 1s-1-.448-1-1 .447-1 1-1 1 .448 1 1zm2-7v-4c0-3.313-2.687-6-6-6s-6 2.687-6 6v4h-3v14h18v-14h-3zm-10-4c0-2.206 1.795-4 4-4s4 1.794 4 4v4h-8v-4zm11 16h-14v-10h14v10z"/>
        </svg>
      </div>
      
      <h3 class="text-sm text-primary text-center">
        Al iniciar sesión, aceptas la Política de privacidad y los Términos de uso de SNEAKERS SHOP.
      </h3>

      <button type="submit" class="text-neutral bg-secondary w-full py-3 mt-4 hover:bg-black">
        INICIAR SESIÓN
      </button>
    </form>
    <div class="signup-container pt-4 text-center">
      <p class="text-sm text-primary tacker-wide">¿Aún no eres miembro? <a href="<?= URLROOT; ?>/users/signup" class="font-semibold">Únete</a> </p> 
    </div>
  </div>
</div>
<?php require(APPROOT . '/views/partials/footer.php'); ?>