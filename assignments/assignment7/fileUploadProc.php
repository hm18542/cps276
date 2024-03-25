<?php
    Class uploadFile
    {
        Function upload($fnam, $fileName)
        {
            $path = "fileLocation/" . $fileName;
            touch($path);
            require_once "Db_conn.php";
            $dbconn = new DatabaseConn();
            $db = $dbconn->dbOpen();
            $STH = $db->prepare('INSERT INTO files (file_name, file_path) values (:fileName, :path)');
            $STH->bindParam(':fileName', $fnam);
            $STH->bindParam(':path', $path);
            $STH->execute();
            
            return "File has been added.";
        }
    }
?>