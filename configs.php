 <?php
 /*define('DB', 'nfq');
 define('DB_USER', 'root');
 define('DB_PASS', 'root');
 define('DB_HOST', 'localhost');*/
 //$DB = "dcfsu68gb20t2s";
 //$DB_USER = "ycbiiheljhbeii";
 //$DB_PASS = "0186292106d793023f5d6c42f7288cac7f36d962ff6824b08714eb94e8f3e98b";
 //$DB_HOST = "ec2-46-137-117-43.eu-west-1.compute.amazonaws.com";
 //$PORT = "5432";
 $url = parse_url(getenv('mysql://b88a9d55cdd2e3:6387c4fd@eu-cdbr-west-01.cleardb.com/heroku_03dd432fbc620f7?reconnect=true'));
 $server = $url["host"];
 $username = $url["user"];
 $password = $url["pass"];
 $db = substr($url["path"], 1);
 ?>