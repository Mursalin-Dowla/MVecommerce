<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="p-5">
    <h1>Test Api</h1>
    <button class="btn btn-info test-btn">Load All Products</button>
    <table class="table">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>DiscountPercentage</th>
                <th>Rating</th>
                <th>Barnd</th>
                <th>Category</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody class="allData">

        </tbody>
    </table>
    <button class="btn btn-info load-btn">Load Data</button>
        <div class="form-group">
            <label for="title">Product Name</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" id="description" class="form-control">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control">
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="text" name="rating" id="rating" class="form-control">
        </div>
        <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <input type="text" name="thumbnail" id="thumbnail" class="form-control">
        </div>
        <div class="form-group pt-2">
            <input type="button" class="save btn btn-info" value="Store Data">
        </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="{{asset('frontend')}}/assets/js/apitest.js"></script>
    
</body>
</html>
