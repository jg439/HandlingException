<?php
  echo "Testing Exception Handling: File not Found";

  class FileExistException extends Exception{}
  class FileReadException extends Exception{}
  class FileWriteException extends Exception{}

  $csv_file = 'x.csv';
  try{
    try{
      $data = file_get_contents($csv_file);
      if($data === false){
        throw new Exception();
        }
      }
  catch(Exception $e){
    if(!file_exists($csv_file)){
      throw new FileExistException($csv_file."The file that you are looking for has not been created");
    }
    elseif(!is_writable($csv_file)){
      throw new FileWriteException($csv_file." You cannot write this file");
    }
    else{
      throw new Exception("Error");
    }
  }
}
catch(FileExistException $x){
  echo $x->getMessage();
  error_log($x->getTraceAsString());
}
catch(FileReadException $xr){
  echo $xr->getMessage();
  error_log($xr->getTraceAsString());
}
catch(FileWriteException $xy){
  echo $xy->getMessage();
  error_log($xy->getTraceAsString());
}
?>
