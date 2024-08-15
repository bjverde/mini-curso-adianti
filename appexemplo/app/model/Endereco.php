<?php

class Endereco extends TRecord
{
    const TABLENAME  = 'endereco';
    const PRIMARYKEY = 'idendereco';
    const IDPOLICY   =  'serial'; // {max, serial}

    const DELETEDAT  = 'dat_exclusao';
    const CREATEDAT  = 'dat_inclusao';
    const UPDATEDAT  = 'dat_alteracao';

    private $fk_idpessoa;
    private $fk_idtipo_endereco;
    private $fk_cod_municipio;

    

    use SystemChangeLogTrait;
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('idpessoa');
        parent::addAttribute('idtipo_endereco');
        parent::addAttribute('cod_municipio');
        parent::addAttribute('endereco');
        parent::addAttribute('cidade');
        parent::addAttribute('cep');
        parent::addAttribute('numero');
        parent::addAttribute('complemento');
        parent::addAttribute('bairro');
        parent::addAttribute('dat_inclusao');
        parent::addAttribute('dat_alteracao');
        parent::addAttribute('dat_exclusao');
            
    }

    /**
     * Method set_pessoa
     * Sample of usage: $var->pessoa = $object;
     * @param $object Instance of Pessoa
     */
    public function set_fk_idpessoa(Pessoa $object)
    {
        $this->fk_idpessoa = $object;
        $this->idpessoa = $object->idpessoa;
    }

    /**
     * Method get_fk_idpessoa
     * Sample of usage: $var->fk_idpessoa->attribute;
     * @returns Pessoa instance
     */
    public function get_fk_idpessoa()
    {
    
        // loads the associated object
        if (empty($this->fk_idpessoa))
            $this->fk_idpessoa = new Pessoa($this->idpessoa);
    
        // returns the associated object
        return $this->fk_idpessoa;
    }
    /**
     * Method set_tipo
     * Sample of usage: $var->tipo = $object;
     * @param $object Instance of Tipo
     */
    public function set_fk_idtipo_endereco(Tipo $object)
    {
        $this->fk_idtipo_endereco = $object;
        $this->idtipo_endereco = $object->idtipo;
    }

    /**
     * Method get_fk_idtipo_endereco
     * Sample of usage: $var->fk_idtipo_endereco->attribute;
     * @returns Tipo instance
     */
    public function get_fk_idtipo_endereco()
    {
    
        // loads the associated object
        if (empty($this->fk_idtipo_endereco))
            $this->fk_idtipo_endereco = new Tipo($this->idtipo_endereco);
    
        // returns the associated object
        return $this->fk_idtipo_endereco;
    }
    /**
     * Method set_municipio
     * Sample of usage: $var->municipio = $object;
     * @param $object Instance of Municipio
     */
    public function set_fk_cod_municipio(Municipio $object)
    {
        $this->fk_cod_municipio = $object;
        $this->cod_municipio = $object->id_municipio;
    }

    /**
     * Method get_fk_cod_municipio
     * Sample of usage: $var->fk_cod_municipio->attribute;
     * @returns Municipio instance
     */
    public function get_fk_cod_municipio()
    {
    
        // loads the associated object
        if (empty($this->fk_cod_municipio))
            $this->fk_cod_municipio = new Municipio($this->cod_municipio);
    
        // returns the associated object
        return $this->fk_cod_municipio;
    }

    /**
     * Method getTelefones
     */
    public function getTelefones()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('idendereco', '=', $this->idendereco));
        return Telefone::getObjects( $criteria );
    }

    public function set_telefone_fk_idpessoa_to_string($telefone_fk_idpessoa_to_string)
    {
        if(is_array($telefone_fk_idpessoa_to_string))
        {
            $values = Pessoa::where('idpessoa', 'in', $telefone_fk_idpessoa_to_string)->getIndexedArray('idpessoa', 'idpessoa');
            $this->telefone_fk_idpessoa_to_string = implode(', ', $values);
        }
        else
        {
            $this->telefone_fk_idpessoa_to_string = $telefone_fk_idpessoa_to_string;
        }

        $this->vdata['telefone_fk_idpessoa_to_string'] = $this->telefone_fk_idpessoa_to_string;
    }

    public function get_telefone_fk_idpessoa_to_string()
    {
        if(!empty($this->telefone_fk_idpessoa_to_string))
        {
            return $this->telefone_fk_idpessoa_to_string;
        }
    
        $values = Telefone::where('idendereco', '=', $this->idendereco)->getIndexedArray('idpessoa','{fk_idpessoa->idpessoa}');
        return implode(', ', $values);
    }

    public function set_telefone_fk_idtipo_telefone_to_string($telefone_fk_idtipo_telefone_to_string)
    {
        if(is_array($telefone_fk_idtipo_telefone_to_string))
        {
            $values = Tipo::where('idtipo', 'in', $telefone_fk_idtipo_telefone_to_string)->getIndexedArray('idtipo', 'idtipo');
            $this->telefone_fk_idtipo_telefone_to_string = implode(', ', $values);
        }
        else
        {
            $this->telefone_fk_idtipo_telefone_to_string = $telefone_fk_idtipo_telefone_to_string;
        }

        $this->vdata['telefone_fk_idtipo_telefone_to_string'] = $this->telefone_fk_idtipo_telefone_to_string;
    }

    public function get_telefone_fk_idtipo_telefone_to_string()
    {
        if(!empty($this->telefone_fk_idtipo_telefone_to_string))
        {
            return $this->telefone_fk_idtipo_telefone_to_string;
        }
    
        $values = Telefone::where('idendereco', '=', $this->idendereco)->getIndexedArray('idtipo_telefone','{fk_idtipo_telefone->idtipo}');
        return implode(', ', $values);
    }

    public function set_telefone_fk_idendereco_to_string($telefone_fk_idendereco_to_string)
    {
        if(is_array($telefone_fk_idendereco_to_string))
        {
            $values = Endereco::where('idendereco', 'in', $telefone_fk_idendereco_to_string)->getIndexedArray('idendereco', 'idendereco');
            $this->telefone_fk_idendereco_to_string = implode(', ', $values);
        }
        else
        {
            $this->telefone_fk_idendereco_to_string = $telefone_fk_idendereco_to_string;
        }

        $this->vdata['telefone_fk_idendereco_to_string'] = $this->telefone_fk_idendereco_to_string;
    }

    public function get_telefone_fk_idendereco_to_string()
    {
        if(!empty($this->telefone_fk_idendereco_to_string))
        {
            return $this->telefone_fk_idendereco_to_string;
        }
    
        $values = Telefone::where('idendereco', '=', $this->idendereco)->getIndexedArray('idendereco','{fk_idendereco->idendereco}');
        return implode(', ', $values);
    }

    /**
     * Method onBeforeDelete
     */
    public function onBeforeDelete()
    {
            

        if(Telefone::where('idendereco', '=', $this->idendereco)->first())
        {
            throw new Exception("Não é possível deletar este registro pois ele está sendo utilizado em outra parte do sistema");
        }
    
    }

    
}

