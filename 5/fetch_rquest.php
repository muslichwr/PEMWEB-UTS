
<?php

//upload.php

include 'spreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

if($_FILES["select_excel"]["name"] != '')
 {
  $allowed_extension = array('xls', 'xlsx');
  $file_array = explode(".", $_FILES['select_excel']['name']);
  $file_extension = end($file_array);
   if(in_array($file_extension, $allowed_extension))
    {
     $reader = IOFactory::createReader('Xlsx'); // :: Scope Resolution , is a token that allows access to static, constant, and overridden properties or methods of a class.
     $spreadsheet = $reader->load($_FILES['select_excel']['tmp_name']);
     $writer = IOFactory::createWriter($spreadsheet, 'Html');
     $message = $writer->save('php://output');
    }
   else
   {
     $message = '<div class="alert alert-danger">Only .xls or .xlsx file allowed</div>';
   }
}
else
{
   $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;

?>
