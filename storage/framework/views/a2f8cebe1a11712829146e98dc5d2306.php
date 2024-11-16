<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  
    <title>Document</title>  
    <style>  
        body {  
            font-family: 'Arial', sans-serif;  
            background-color: #f7f9fc;  
            color: #333;  
            margin: 0;  
            padding: 20px;  
        }  

        h1 {  
            color: #c0392b;  
            text-align: center;  
        }  

        .card {  
            background-color: #ffffff;  
            border: 1px solid #ddd;  
            border-radius: 5px;  
            padding: 20px;  
            margin: 10px 0;  
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);  
        }  

        .card h2 {  
            margin: 0 0 10px;  
            color: #2980b9;  
        }  

        .card p {  
            margin: 5px 0; /* Adjust margin for paragraphs */  
        }  

        a {  
            display: inline-block;  
            background-color: #2980b9;  
            color: white;  
            padding: 10px 15px;  
            border-radius: 5px;  
            text-decoration: none;  
            margin-top: 10px;  
        }  

        a:hover {  
            background-color: #1c5980;  
        }  

        @media (max-width: 600px) {  
            body {  
                padding: 10px;  
            }  

            .card {  
                padding: 15px;  
            }  

            a {  
                padding: 8px 12px;  
            }  
        }  
    </style>  
</head>  
<body>  
    <?php if(count($companies) > 0): ?>  
        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
            <div class="card">  
                <h2><?php echo e($company->name); ?></h2>  
                <p>Activity: <?php echo e($company->activity); ?></p>  
                <p>Establishment Date: <?php echo e($company->establishment_date); ?></p>  
                <a href="/company/<?php echo e($company->id); ?>">Show branches</a>  
            </div>  
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
    <?php else: ?>  
        <h1>No companies available</h1>  
    <?php endif; ?>  
    <a href="/add">Add a new company</a>  
</body>  
</html><?php /**PATH C:\Users\Ahmad Mardenli\Desktop\Companies_platform\resources\views/Company/companies.blade.php ENDPATH**/ ?>