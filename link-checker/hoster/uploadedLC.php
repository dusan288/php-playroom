<?php
include('defaultLC.php');

class UploadedLC extends DefaultLC {

    public function fetchLinkData(): void {
        $page = @file_get_contents($this->link);
        //check if link data is valid:
        $this->name = cut_str($page, 'filename">', '</a>');
        if(strlen($this->name) < 1){
            $this->errorMsg = "File name not found";
            $this->name = 'N/A';
            $this->size = 0;
            return;
        }
        //print_r($name[1]);
        
        //echo "<p>File name: ".$name."</p>";
        $this->size = cut_str($page, 'font-size:11px;">', '</small>');
    }
    public function getFileName(): string {
        return $this->name;
    }
    public function getFileSize(): string { 
        return $this->size;
    }

}

?>