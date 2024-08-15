<?php

class Regiao extends TRecord
{
    const TABLENAME  = 'regiao';
    const PRIMARYKEY = 'cod_regiao';
    const IDPOLICY   =  'serial'; // {max, serial}

    const DELETEDAT  = 'dat_exclusao';

    

    use SystemChangeLogTrait;
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('nom_regiao');
        parent::addAttribute('dat_exclusao');
            
    }

    /**
     * Method getUfs
     */
    public function getUfs()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('cod_regiao', '=', $this->cod_regiao));
        return Uf::getObjects( $criteria );
    }

    public function set_uf_fk_cod_regiao_to_string($uf_fk_cod_regiao_to_string)
    {
        if(is_array($uf_fk_cod_regiao_to_string))
        {
            $values = Regiao::where('cod_regiao', 'in', $uf_fk_cod_regiao_to_string)->getIndexedArray('cod_regiao', 'cod_regiao');
            $this->uf_fk_cod_regiao_to_string = implode(', ', $values);
        }
        else
        {
            $this->uf_fk_cod_regiao_to_string = $uf_fk_cod_regiao_to_string;
        }

        $this->vdata['uf_fk_cod_regiao_to_string'] = $this->uf_fk_cod_regiao_to_string;
    }

    public function get_uf_fk_cod_regiao_to_string()
    {
        if(!empty($this->uf_fk_cod_regiao_to_string))
        {
            return $this->uf_fk_cod_regiao_to_string;
        }
    
        $values = Uf::where('cod_regiao', '=', $this->cod_regiao)->getIndexedArray('cod_regiao','{fk_cod_regiao->cod_regiao}');
        return implode(', ', $values);
    }

    /**
     * Method onBeforeDelete
     */
    public function onBeforeDelete()
    {
            

        if(Uf::where('cod_regiao', '=', $this->cod_regiao)->first())
        {
            throw new Exception("Não é possível deletar este registro pois ele está sendo utilizado em outra parte do sistema");
        }
    
    }

    
}

