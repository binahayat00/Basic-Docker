<h1><?= $title ?></h1>
<form action="/upload" method="post" enctype="multipart/form-data">
    <input type="file" name="receipt" />
    <button type="submit">Upload</button>
</form>