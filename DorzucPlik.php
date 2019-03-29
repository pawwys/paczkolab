<form action="" enctype="multipart/form-data" method="post">
    <input type="file" name="plik">
    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
    <input type="submit" value="Przeslij plik">
</form>

<?php
//echo __DIR__;

if (!file_exists('upload'))
{
    mkdir('upload');
}
//return file_exists('upload');

if ($_POST)
{
    var_dump($_FILES);
    $katalogUpload = __DIR__.'/upload/';
    $plikUpload = $katalogUpload . $_FILES['plik']['name']; //Dzięki temu i nw. mamy oryginalną nazwę pliku zobacz też ścieżke #basename($_FILES['plik']['name']) jeżeli trzeba wyciągnąć nazwę w innym przypadku
    if (move_uploaded_file($_FILES['plik']['tmp_name'], $plikUpload )) //sprawdzenie bezpieczeństwa pliku czy został przesłany 'bezpiecznie'
    {
        echo 'Udało się zapisać plik';
    }
    else
    {
        echo 'Błąd podczas zapisywania pliku';
    }
}