<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  
    <title>Add Company</title>  
    <style>  
        body {  
            font-family: 'Arial', sans-serif;  
            background-color: #f7f9fc;  
            color: #333;  
            margin: 0;  
            padding: 20px;  
        }  

        h1 {  
            text-align: center;  
            color: #2980b9;  
            margin-bottom: 20px;  
        }  

        .card {  
            background-color: #ffffff;  
            border: 1px solid #ddd;  
            border-radius: 5px;  
            padding: 20px;  
            margin: 0 auto;  
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);  
            max-width: 400px; /* Set a max width for the card */  
        }  

        input[type="text"], input[type="date"] {  
            width: 100%; /* Full width input fields */  
            padding: 10px;  
            margin: 10px 0; /* Space between inputs */  
            border: 1px solid #ddd;  
            border-radius: 5px;  
        }  

        input[type="submit"] {  
            background-color: #2980b9;  
            color: white;  
            padding: 10px;  
            border: none;  
            border-radius: 5px;  
            cursor: pointer;  
            width: 100%; /* Full width button */  
            margin-top: 10px; /* Margin above button */  
        }  

        input[type="submit"]:hover {  
            background-color: #1c5980; /* Darker shade on hover */  
        }  

        @media (max-width: 600px) {  
            body {  
                padding: 10px;  
            }  

            .card {  
                padding: 15px;  
                width: 100%; /* Responsive width for mobile */  
            }  
        }  
    </style>  
</head>  
<body>  

    <h1>Add a New Company</h1>  
    
    <div class="card">  
        <form action="/add" method="POST">  
            <?php echo csrf_field(); ?>  
            <input type="text" name="name" id="name" placeholder="The company's name" required>  
            <input type="date" name="establishment_date" id="date" placeholder="The company's date" required>  
            <input type="text" name="location" id="location" placeholder="The company's location" required>  
            <input type="text" name="activity" id="activity" placeholder="The company's activity" required>  
            <input type="submit" value="Add Company">  
        </form>  
    </div>  

</body>  
</html>
</html><?php /**PATH C:\Users\Ahmad Mardenli\Desktop\Companies_platform\resources\views/Company/addCompany.blade.php ENDPATH**/ ?>