<?php
class Alunos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->where('ativo', 1);
        $this->db->order_by('nomeAluno','asc');
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }
    

    function getdesativados($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->where('ativo', 0);
        $this->db->order_by('idAlunos','desc');
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }

    function getById($id){
        $this->db->where('idAlunos',$id);
        $this->db->limit(1);
        return $this->db->get('alunos')->row();
    }
    
    function add($table,$data){
        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);
        if ($this->db->affected_rows() >= 0)
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
    function delete($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;        
    }

    function count($table) {
        return $this->db->count_all($table);
    }
    
    function countdesativados($table) {
    	$this->db->where('ativo',0);
        return $this->db->count_all($table);
    }
    
    public function getOsByAlunos($id){
        $this->db->where('idAlunos',$id);
        $this->db->order_by('idOs','desc');
        $this->db->limit(10);
        return $this->db->get('os')->result();
    }

    public function getLancamentosByAluno($id){
        $this->db->where('alunos_id',$id);
        $this->db->order_by('idLancamentosAcademia','asc');
        $this->db->limit(10000);
        return $this->db->get('lancamentos_academia')->result();
    }

}