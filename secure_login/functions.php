<?php

class func{

    public static function checkLoginState($dbh)
    {
        if(!isset($_SESSION['id']) || !isset($_COOKIE['PHPSESSID']))
        {
            session_start();

        }

        if( isset($_COOKIE['id']) && isset($_COOKIE['token']) && isset($_COOKIE['serial']))
        {
            $query = "SELECT * FROM sessions WHERE sessions_userid=:userid AND sessions_token = :token AND sessions_serial = :serial;";

            $id = $_COOKIE['id'];
            $token = $_COOKIE['token'];
            $serial = $_COOKIE['serial'];

            $stmt = $dbh->prepare($query);
            $stmt->execute(array(':userid'-> $userid,':token'->$token,':serial'->$serial));

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if($row['sessions'] > 0)
            {
                if($row['sessions_userid']== $_COOKIE['userid'] && $row['sessions_token'] == $_COOKIE['token'] && $row['sessions_serial']==$_COOKIE['serial'])
                {
                    if($row['sessions_userid']== $_COOKIE['userid'] && $row['sessions_token'] == $_COOKIE['token'] && $row['sessions_serial']==$_COOKIE['serial'])
                    {
                        return true;
                    }
                }
            }
        }
    }

    public static function createRecord($dbh, $users_username, $users_id)
    {

        // $query = 'INSERT INTO sessions(sessions_userid,sessions_token,sessions_serial,sessions_date) values(:user_id,:token,:serial),"19/08/2017")');

        $query = 'INSERT INTO sessions(sessions_userid,sessions_token,sessions_serial,sessions_date) values (:users_id,:token,:serial,"19/08/2017")';

        $dbh->prepare('DELETE FROM sessions where sessions_userid = :sessions_userid')->execute(array(':sessions_userid'=>$users_id));

        $token = func::createString(20);
        $serial = func::createString(20);

        func::createCookie($users_username, $users_id, $token, $serial);
        func::createSession($users_username, $users_id);

        $stmt = $dbh->prepare($query);
        $stmt->execute(array(':users_id'=> $users_id,':token'=>$token,':serial'=>$serial));
    }


    public static function createCookie($users_username, $users_id, $token, $serial)
    {
        setcookie('user_id',$users_id,time() + (86400) * 30, "/");
        setcookie('user_username',$users_id,time() + (86400) * 30, "/");
        setcookie('token',$token,time() + (86400) * 30, "/");
        setcookie('serial',$serial,time() + (86400) * 30, "/");
    }

    public static function createSession($users_username, $users_id)
    {
        if(!isset($_SESSION['id']) || !isset($_COOKIE['PHPSESSID']))
        {
            session_start();
        }
        $_SESSION['user_username'] = $users_username;

    }

    public static function createString($len)
    {
        $string = "1qay2wsx3edc4rfv5tgb6zhn7ujm8ik9olpAQWSXEDCVFRTGBNHYZUJMKILOP";
        $s = '';
        $r_new = '';
        $r_old = '';
        
        for($i = 1; $i < $len; $i++)
        {
            while($r_old == $r_new)
            {
                $r_new = rand(0,60);
            }
            $r_old = $r_new;
            
            $s = $s.$string[$r_new];
        }

        return $s;  
    }
}
?>