<?php

    class DB{
        private $host;
        private $port;
        private $user;
        private $pass;
        private $dbname;
        private $charset;
        private $prefix;            
        private $link;                


        public function __construct($arr = array()){
            $this->host = isset($arr['host']) ? $arr['host'] : 'localhost';
            $this->port = isset($arr['port']) ? $arr['port'] : '3306';
            $this->user = isset($arr['user']) ? $arr['user'] : 'azhu8_alan';
            $this->pass = isset($arr['pass']) ? $arr['pass'] : 'zhuanchu123';
            $this->dbname = isset($arr['dbname']) ? $arr['dbname'] : 'azhu8_test';
            $this->charset = isset($arr['charset']) ? $arr['charset'] : 'utf8';
            $this->prefix = isset($arr['prefix']) ? $arr['prefix'] : '';

            $this->connect();

            $this->setCharset();

            $this->setDbname();
        }

        /*
        */
        private function connect(){
            $this->link = mysql_connect('localhost:3306',$this->user,$this->pass);

            
            if(!$this->link){
                echo 'database error：<br/>';
                echo 'code' . mysql_errno() . '<br/>';
                echo 'content' . mysql_error() . '<br/>';
                exit;
            }
            
        }

        /*
        */
        private function setCharset(){
            $this->db_query("set names {$this->charset}");
        }

        /*        */
        private function setDbname(){
            $this->db_query("use azhu8_test");
        }

        /*
        */
        public function db_insert($sql){
            $this->db_query($sql);
            
            return mysql_affected_rows() ? mysql_insert_id() : FALSE;
        }

  
        public function db_delete($sql){
            $this->db_query($sql);

            return mysql_affected_rows() ? mysql_affected_rows() : FALSE;
        }


        public function db_update($sql){
            $this->db_query($sql);

            return mysql_affected_rows() ? mysql_affected_rows() : FALSE;
        }

        /*
        */
        public function db_getRow($sql){
            $res = $this->db_query($sql);

            return mysql_num_rows($res) ? mysql_fetch_assoc($res) : FALSE;
        }

        /*
         * 
        */
        public function db_getAll($sql){
            $res = $this->db_query($sql);

            if(mysql_num_rows($res)){
                $list = array();
                
                while($row = mysql_fetch_assoc($res)){
                    $list[] = $row;
                }

                return $list;
            }

            return FALSE;
        }

        /*
        */
        private function db_query($sql){
            $res = mysql_query($sql, $this->link);

            if(!$res){
                echo 'sql error<br/>';
                echo 'code' . mysql_errno() . '<br/>';
                echo 'content' . mysql_error() . '<br/>';
                exit;
            }
            return $res;
        }
        public function __sleep(){
            return array('host','port','user','pass','dbname','charset','prefix');
        }

        public function __wakeup(){
            $this->connect();
            $this->setCharset();
            $this->setDbname();
        }    

        /*
        */
        protected function getTableName(){
            return $this->prefix . $this->table;
        }
    }
