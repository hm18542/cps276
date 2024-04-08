<?php
    Class noteFunctions
    {
        Function addNote($ntime = "", $ncont = "")
        {
            If($this->check_Date($ntime, $ncont) == "good")
            {
                require_once "Db_conn.php";
                $dbconn = new DatabaseConn();
                $db = $dbconn->dbOpen();
                $STH = $db->prepare('INSERT INTO notes (date_time, note) values (:date_name, :note)');
                $timeStamp = strtotime($ntime);
                $STH->bindParam(':date_name', $timeStamp);
                $STH->bindParam(':note', $ncont);
                $STH->execute();
            
                return "Note has been added";
            }
            else
            {
                return $this->check_Date($ntime, $ncont);
            }
        }

        Function check_Date($ntime, $ncont)
        {
            If($ntime == ""||$ncont == "")
            {
                return "Enter date, time, and note";
            }
            return "good";
        }

        Function getNote($begDate, $endDate)
        {
            $nbegDate = strtotime($begDate);
            $nendDate = strtotime($endDate);
            require_once "Db_conn.php";
            $dbconn = new DatabaseConn();
            $db = $dbconn->dbOpen();
            $STH = $db->prepare('SELECT date_time, note FROM notes WHERE date_time BETWEEN :begDate AND :endDate ORDER BY date_time DESC');
            $STH->bindParam(':begDate', $nbegDate);
            $STH->bindParam(':endDate', $nendDate);
            $STH->execute();
            
            $table = '<table class="table table-striped table-bordered"><tr><td><b>Date and Time</b></td><td><b>Note</b></td></tr>';
            while($row = $STH->fetch()) 
            {
                $time = ($row['date_time']);
                $strTime = date("n/d/Y h:i a", $time);
                $note = ($row['note']);
                $table .= '<tr><td>' . $strTime . '</td><td>' . $note . '</td></tr>';
            }
            $table .= "</table>";
            if($table == '<table class="table table-striped table-bordered"><tr><td><b>Date and Time</b></td><td><b>Note</b></td></tr>' . "</table>")
            {
                return "No notes found for the date range selected";
            }
            return $table;
        }
    }
?>