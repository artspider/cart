<?php require(APPROOT . '/views/partials/head.php'); ?>
  <h1 class=" text-3xl text-gray-200 "> <?= $data['title'] ?> </h1>
  
  <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="p-4">No. Control</th>
          
          <th scope="col" class="px-6 py-3">Paterno</th>
          <th scope="col" class="px-6 py-3">Materno</th>
          <th scope="col" class="px-6 py-3">Nombre</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data['alumnos'] as $key => $alumno) : ?>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4"><?= $alumno->control ?></td>
            
            <td class="px-6 py-4"><?= $alumno->paterno ?></td>
            <td class="px-6 py-4"><?= $alumno->materno ?></td>
            <td class="px-6 py-4"><?= $alumno->nombre ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

<?php require(APPROOT . '/views/partials/footer.php'); ?>