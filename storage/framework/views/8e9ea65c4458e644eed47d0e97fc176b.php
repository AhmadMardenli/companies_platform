<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php if(count($companies)>0): ?>
       <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <p>comopany's name: <?php echo e($company->name); ?></p>    
       <p>comopany's activity: <?php echo e($company->activity); ?></p>    
       <p>comopany's establishment date<?php echo e($company->establishment_date); ?></p>    
       <a href="/company/<?php echo e($company->id); ?>"></a>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    <?php else: ?>
    <h1>no companies avilable</h1>
    <?php endif; ?>
    <a href="/add">add a new company</a>
</body>
</html><?php /**PATH C:\Users\Ahmad Mardenli\Desktop\Companies_platform\resources\views/companies.blade.php ENDPATH**/ ?>