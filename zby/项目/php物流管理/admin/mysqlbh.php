<?php 
error_reporting(0);
class dbBackup {
    public $host='localhost';    //���ݿ��ַ
    public $user='root';    //��¼��
    public $pwd='123';    //����
    public $database;    //���ݿ���
    public $charset='gb2312';    //���ݿ����ӱ��룺mysql_set_charset

    /**
     * ���� ...
     * @param $filename �ļ�·��
     */
    function beifen($filename) {
        $this->db();    //�������ݿ�

        $sql=$this->sqlcreate();
        $sql2=$this->sqlinsert();        
        $data=$sql.$sql2;
        return file_put_contents($filename, $data);
    }

    /**
     * ��ԭ ...
     * @param $filename �ļ�·��
     */
    function huanyuan($filename) {
        $this->db();    //�������ݿ�

        //ɾ�����ݱ�
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

        //ִ��SQL
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
     * �������ݿ� ...
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

        mysql_set_charset($this->charset);    //���ñ���

        return $con;
    }

    /**
     * ���� ...
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
     * ��ṹSQL ...
     */
    function sqlcreate() {
        $sql='';

        $tb=$this->tblist();        
        foreach ($tb as $v) {
            $rs=mysql_query("SHOW CREATE TABLE $v");
            $temp=mysql_fetch_row($rs);
            $sql.="-- ��Ľṹ��{$temp[0]} --\r\n";
            $sql.="{$temp[1]}";
            $sql.=";-- <xjx> --\r\n\r\n";
        }
        return $sql;
    }

    /**
     * ���ݲ���SQL ...
     */
    function sqlinsert() {
        $sql='';

        $tb=$this->tblist();        
        foreach ($tb as $v) {
            $rs=mysql_query("SELECT * FROM $v");
            if (!mysql_num_rows($rs)) {//�����ݷ���
                continue;
            }        
            $sql.="-- ������ݣ�$v --\r\n";
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

//����

$x=new dbBackup();
$x->database='db_logistics';
$rs=$x->beifen('db_logistics.sql');
var_dump($rs);
//��ԭ
/*
$x=new dbBackup();
$x->database='test';
$rs=$x->huanyuan('db_liandong.sql');
var_dump($rs);*/
?>
