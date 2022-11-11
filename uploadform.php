<form action="upload.php" method="post" enctype="multipart/form-data">
    Select Image File to Upload:
    <input type="file" name="file">

    <select name="category">
      <option value=NULL selected></option>
      <option value="po">Poziome</option>
      <option value="pi">Pionowe</option>
      <option value="w">Wstawki</option>
      <option value="r">Ramki</option>
      <option value="n">Narożne</option>
      <option value="z">Zawieszki</option>
    </select>

    <select name="subcategory">
      <option value="" selected></option>
      <option value="b">Boże narodzenie</option>
      <option value="wi">Wielkanoc</option>
      <option value="j">Jesień</option>
    </select>

    <input name="title" placeholder="Tytuł wzoru">

    <input type="submit" name="submit" value="Upload">
</form>