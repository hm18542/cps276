<?php
class Directories
{
    //private variables
    private $handle;
    private $foldername;
    private $path;
    private $userinput;
    private $link;

    //public methods
    public function makeDir()
    {
        if (isset($_POST['submit'])) {
            $this->path = "/directories";
            $this->path .= "/";
            $this->foldername = $_POST["foldername"];
            $this->path .= $this->foldername;
            mkdir("/directories");
            chmod("/directories", 0777);
            mkdir($this->path, 0777);
            if (file_exists($this->path)) {
                echo "A directory already exists with that name.";
            } else {
                chmod($this->path, 0777);
                $this->path .= "/readme.txt";
                touch($this->path);

                $this->userinput = $_POST["filecontent"];
                $this->handle = fopen("readme.txt", "w");
                //fwrite($this->handle, $this->userinput);
                //fclose("readme.txt");

                echo "File and directory were created";
                $this->link = "<p><a href=\"/readme.txt\">Path where file is located</a></p>.";
                echo $this->link;
            }
        }
    }
}