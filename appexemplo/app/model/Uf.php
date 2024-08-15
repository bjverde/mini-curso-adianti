<?php

class Uf extends TRecord
{
    const TABLENAME  = 'uf';
    const PRIMARYKEY = 'cod_uf';
    const IDPOLICY   =  'serial'; // {max, serial}

    const DELETEDAT  = 'dat_exclusao';

    private $fk_cod_regiao;

    

    //use SystemChangeLogTrait;
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('cod_regiao');
        parent::addAttribute('nom_uf');
        parent::addAttribute('sig_uf');
        parent::addAttribute('dat_exclusao');
    }

    /**
     * Method set_regiao
     * Sample of usage: $var->regiao = $object;
     * @param $object Instance of Regiao
     */
    public function set_fk_cod_regiao(Regiao $object)
    {
        $this->fk_cod_regiao = $object;
        $this->cod_regiao = $object->cod_regiao;
    }

    /**
     * Method get_fk_cod_regiao
     * Sample of usage: $var->fk_cod_regiao->attribute;
     * @returns Regiao instance
     */
    public function get_fk_cod_regiao()
    {
        // loads the associated object
        if (empty($this->fk_cod_regiao))
            $this->fk_cod_regiao = new Regiao($this->cod_regiao);
    
        // returns the associated object
        return $this->fk_cod_regiao;
    }

    /**
     * Method getMunicipios
     */
    public function getMunicipios()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('cod_uf', '=', $this->cod_uf));
        return Municipio::getObjects( $criteria );
    }

    public function set_municipio_fk_cod_uf_to_string($municipio_fk_cod_uf_to_string)
    {
        if(is_array($municipio_fk_cod_uf_to_string))
        {
            $values = Uf::where('cod_uf', 'in', $municipio_fk_cod_uf_to_string)->getIndexedArray('cod_uf', 'cod_uf');
            $this->municipio_fk_cod_uf_to_string = implode(', ', $values);
        }
        else
        {
            $this->municipio_fk_cod_uf_to_string = $municipio_fk_cod_uf_to_string;
        }
        $this->vdata['municipio_fk_cod_uf_to_string'] = $this->municipio_fk_cod_uf_to_string;
    }

    public function get_municipio_fk_cod_uf_to_string()
    {
        if(!empty($this->municipio_fk_cod_uf_to_string))
        {
            return $this->municipio_fk_cod_uf_to_string;
        }
    
        $values = Municipio::where('cod_uf', '=', $this->cod_uf)->getIndexedArray('cod_uf','{fk_cod_uf->cod_uf}');
        return implode(', ', $values);
    }

    /**
     * Method onBeforeDelete
     */
    public function onBeforeDelete()
    {
        if(Municipio::where('cod_uf', '=', $this->cod_uf)->first())
        {
            throw new Exception("Não é possível deletar este registro pois ele está sendo utilizado em outra parte do sistema");
        }
    }
}

