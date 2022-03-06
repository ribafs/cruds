<?php

require_once 'Connection.php';
$pdo = Connection::getInstance();

class Crud
{
    // table name definition and database connection
    public $table;
    public $pdo;
    private $myQuery = "";
    public $regsPerPage = 10;
    public $linksPerPage = 8;
    
    // Passando $table aqui, acarreta uma grande flexibilidade, podendo usar esta classe para n tabelas
    public function __construct($pdo, $table)
    {
        $this->pdo = $pdo;
        $this->table = $table;
    }
    
    // Número de campos da tabela atual
    public function numFields(){
        $sql = "SELECT * FROM $this->table";
        $sth = $this->pdo->query($sql);
        return $sth->columnCount();
    }
    
    // Nome de campo pelo número $x
    public function fieldName($x){
        $sql = "SELECT * FROM $this->table";
        $sth = $this->pdo->query($sql);
        $meta = $sth->getColumnMeta($x);
        return $meta['name'];
    }
    
    public function numRows($sql=null){ // Exemplo: $sql = "SELECT * FROM $this->table";
        if(is_null($sql)) {
            $sql = 'SELECT * FROM '.$this->table;
        }
        
        $sth = $this->pdo->query($sql);
        return $sth->rowCount();
    }

    // $params = ['nome' => 'João Brito', 'email' => 'joao@joao.com']        
    public function insert($params = array()){ 
      if(!empty($params)){
        $sql='INSERT INTO `'.$this->table.'` (`'.implode('`, `',array_keys($params)).'`) VALUES ("' . implode('", "', $params) . '")';
        $sth = $this->pdo->prepare($sql);    
        
        for($x=1;$x<$this->numFields();$x++){
            $field = $this->fieldName($x);
            $sth->bindParam($x, $_POST["$field"]);
        }
        $execute = $sth->execute();
        
        if($execute){
            return true;
        }else{
            return false;
        }        
      }else{
        print 'Params required';
        return false;
      }
    }

    // $params: ['nome' => 'Pedro Brito', 'email' => 'pedro@pedro.com'], $where: id = 3
    public function update($params=array(),$where){
        if(!empty($params)){
            $fieldValues=array();
            foreach($params as $field=>$value){
                $fieldValues[] = $field.'="'.$value.'"';
            }
            $sql='UPDATE '.$this->table.' SET '.implode(',',$fieldValues).' WHERE '.$where;

            $this->myQuery = $sql;
            $sth = $this->pdo->prepare($sql);

            for($x=0;$x < $this->numFields();$x++){
                $field = $this->fieldName($x);
                $sth->bindParam(':'.$field, $_POST["$field"], PDO::PARAM_INT);
      	    }

           if($sth->execute()){
                header('location=index.php');
                return true;
           }else{
                print "Error on update register!<br><br>";
                return false;
           }
        }else{
            return false;
        }
    }

    public function delete($id){
        $sql = "DELETE FROM ".$this->table." WHERE id = :id";
       
        $sth = $this->pdo->prepare($sql);
        $sth->bindParam(':id', $id, PDO::PARAM_INT);   
        
        if( $sth->execute()){
            return true;
        }else{
            return false;
        }
    }  

    public function formAdd(){
        $nf = $this->numFields();
        $ret = '';
        $fn = '';
        for($x = 1; $x < $nf;$x++){            
            $fn = $this->fieldName($x);
            $ret .= "<tr><td>".ucfirst($fn)."</td><td><input type=\"text\" name=\"{$fn}\"></td></tr>\n<br>";
        }
        return $ret;
    }  
}

