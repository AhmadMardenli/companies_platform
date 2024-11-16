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
    <?php if(count($branches) > 0): ?>  
        <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
            <div class="card">  
                <h2><?php echo e($branch->name); ?></h2>  
                <p>type: <?php echo e($branch->type); ?></p>  
                <p>Location: <?php echo e($branch->location); ?></p>  
                <a href="/branch/<?php echo e($branch->id); ?>">Show branches</a>  
            </div>  
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
    <?php else: ?>  
        <h1>No branches  available</h1>  
    <?php endif; ?>  
    <a href="/branch/add">Add a new branch</a>  
</body>  
</html><?php /**PATH C:\Users\Ahmad Mardenli\Desktop\Companies_platform\resources\views/Branch/branches.blade.php ENDPATH**/ ?>