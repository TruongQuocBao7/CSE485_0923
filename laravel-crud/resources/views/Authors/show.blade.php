<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        
        h1 {
            color: #333;
        }
        
        p {
            color: #666;
        }
    </style>
</head>
<body>
    <?php
    use App\Models\Author;
    ?>

    <h1>{{ $author->name }}</h1>
    <p>{{ $author->bio }}</p>
</body>
</html>
