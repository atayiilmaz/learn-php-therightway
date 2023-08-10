<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Transaction</title>
</head>
<body>
    
    <h1>Upload csv file</h1>
    
    <form action="/transactions/upload" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <button type="submit">Upload</button>
    </form>
    


</body>
</html>