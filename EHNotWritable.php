<?php
  echo "Testing Exception Handling: Not writable file";

  class FileExistException extends Exception{}
  class FileReadException extends Exception{}
  class FileWriteException extends Exception{}
//I changed the chmod for importantinfo.csv so it is not a writable file anymore.
  $csvfilename = 'importantinfo.csv';
  try{
    try{
      $data = file_get_contents($csvfilename);
      if($data === false){
        throw new Exception();
        }
      }
  catch(Exception $e){
    if(!file_exists($csvfilename)){
      throw new FileExistException($csvfilename."The file that you are looking for has not been created");
    }
    elseif(!is_writable($filename)){
      throw new FileWriteException($csvfilename." You cannot write this file");
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
