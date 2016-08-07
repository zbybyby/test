<?php 
error_reporting(0);
class dbBackup {
    public $host='localhost';    //数据库地址
    public $user='root';    //登录名
    public $pwd='123';    //密码
    public $database;    //数据库名
    public $charset='gb2312';    //数据库连接编码：mysql_set_charset

    /**
     * 备份 ...
     * @param $filename 文件路径
     */
    function beifen($filename) {
        $this->db();    //连接数据库

        $sql=$this->sqlcreate();
        $sql2=$this->sqlinsert();        
        $data=$sql.$sql2;
        return file_put_contents($filename, $data);
    }

    /**
     * 还原 ...
     * @param $filename 文件路径
     */
    function huanyuan($filename) {
        $this->db();    //连接数据库

        //删除数据表
        $list=$this->tblist();
        $tb='';
        foreach ($list as $v) {
            $tb.="`$v`,";
        }
        $tb=mb_substr($tb, 0, -1);
        if ($tb) {
            $rs=mysql_query("DROP TABLE $tb");
            if ($rs===false) {
                return false;
            }
        }

        //执行SQL
        $str=file_get_contents($filename);
        $arr=explode('-- <xjx> --', $str);
        array_pop($arr);

        foreach ($arr as $v) {
            $rs=mysql_query($v);
            if ($rs===false) {
                return false;
            }
        }

        return true;
    }

    /**
     * 连接数据库 ...
     */
    function db() {        
        $con = mysql_connect($this->host,$this->user,$this->pwd);
        if (!$con){
            die('Could not connect');
        }

        $db_selected = mysql_select_db($this->database, $con);
        if (!$db_selected) {
            die('Can\'t use select db');
        }

        mysql_set_charset($this->charset);    //设置编码

        return $con;
    }

    /**
     * 表集合 ...
     */
    function tblist() {
        $list=array();

        $rs=mysql_query("SHOW TABLES FROM $this->database");
        while ($temp=mysql_fetch_row($rs)) {
            $list[]=$temp[0];
        }

        return $list;
    }

    /**
     * 表结构SQL ...
     */
    function sqlcreate() {
        $sql='';

        $tb=$this->tblist();        
        foreach ($tb as $v) {
            $rs=mysql_query("SHOW CREATE TABLE $v");
            $temp=mysql_fetch_row($rs);
            $sql.="-- 表的结构：{$temp[0]} --\r\n";
            $sql.="{$temp[1]}";
            $sql.=";-- <xjx> --\r\n\r\n";
        }
        return $sql;
    }

    /**
     * 数据插入SQL ...
     */
    function sqlinsert() {
        $sql='';

        $tb=$this->tblist();        
        foreach ($tb as $v) {
            $rs=mysql_query("SELECT * FROM $v");
            if (!mysql_num_rows($rs)) {//无数据返回
                continue;
            }        
            $sql.="-- 表的数据：$v --\r\n";
            $sql.="INSERT INTO `$v` VALUES\r\n";        
            while ($temp=mysql_fetch_row($rs)) {
                $sql.='(';
                foreach ($temp as $v2) {
                    if ($v2===null) {
                        $sql.="NULL,";
                    }
                    else {
                        $v2=mysql_real_escape_string($v2);
                        $sql.="'$v2',";
                    }                    
                }
                $sql=mb_substr($sql, 0, -1);
                $sql.="),\r\n";
            }
            $sql=mb_substr($sql, 0, -3);
            $sql.=";-- <xjx> --\r\n\r\n";    
        }

        return $sql;
    }
}

//备份

$x=new dbBackup();
$x->database='db_logistics';
$rs=$x->beifen('db_logistics.sql');
var_dump($rs);
//还原
/*
$x=new dbBackup();
$x->database='test';
$rs=$x->huanyuan('db_liandong.sql');
var_dump($rs);*/
?>
