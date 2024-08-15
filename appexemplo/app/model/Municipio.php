<?php

class Municipio extends TRecord
{
    const TABLENAME  = 'municipio';
    const PRIMARYKEY = 'id_municipio';
    const IDPOLICY   =  'serial'; // {max, serial}

    const DELETEDAT  = 'dat_exclusao';

    private $fk_cod_uf;

    

    use SystemChangeLogTrait;
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('cod_uf');
        parent::addAttribute('nom_municipio');
        parent::addAttribute('dat_exclusao');
            
    }

    /**
     * Method set_uf
     * Sample of usage: $var->uf = $object;
     * @param $object Instance of Uf
     */
    public function set_fk_cod_uf(Uf $object)
    {
        $this->fk_cod_uf = $object;
        $this->cod_uf = $object->cod_uf;
    }

    /**
     * Method get_fk_cod_uf
     * Sample of usage: $var->fk_cod_uf->attribute;
     * @returns Uf instance
     */
    public function get_fk_cod_uf()
    {
    
        // loads the associated object
        if (empty($this->fk_cod_uf))
            $this->fk_cod_uf = new Uf($this->cod_uf);
    
        // returns the associated object
        return $this->fk_cod_uf;
    }

    /**
     * Method getEnderecos
     */
    public function getEnderecos()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('cod_municipio', '=', $this->id_municipio));
        return Endereco::getObjects( $criteria );
    }
    /**
     * Method getPessoas
     */
    public function getPessoas()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('id_municipio_nascimento', '=', $this->id_municipio));
        return Pessoa::getObjects( $criteria );
    }

    public function set_endereco_fk_idpessoa_to_string($endereco_fk_idpessoa_to_string)
    {
        if(is_array($endereco_fk_idpessoa_to_string))
        {
            $values = Pessoa::where('idpessoa', 'in', $endereco_fk_idpessoa_to_string)->getIndexedArray('idpessoa', 'idpessoa');
            $this->endereco_fk_idpessoa_to_string = implode(', ', $values);
        }
        else
        {
            $this->endereco_fk_idpessoa_to_string = $endereco_fk_idpessoa_to_string;
        }

        $this->vdata['endereco_fk_idpessoa_to_string'] = $this->endereco_fk_idpessoa_to_string;
    }

    public function get_endereco_fk_idpessoa_to_string()
    {
        if(!empty($this->endereco_fk_idpessoa_to_string))
        {
            return $this->endereco_fk_idpessoa_to_string;
        }
    
        $values = Endereco::where('cod_municipio', '=', $this->id_municipio)->getIndexedArray('idpessoa','{fk_idpessoa->idpessoa}');
        return implode(', ', $values);
    }

    public function set_endereco_fk_idtipo_endereco_to_string($endereco_fk_idtipo_endereco_to_string)
    {
        if(is_array($endereco_fk_idtipo_endereco_to_string))
        {
            $values = Tipo::where('idtipo', 'in', $endereco_fk_idtipo_endereco_to_string)->getIndexedArray('idtipo', 'idtipo');
            $this->endereco_fk_idtipo_endereco_to_string = implode(', ', $values);
        }
        else
        {
            $this->endereco_fk_idtipo_endereco_to_string = $endereco_fk_idtipo_endereco_to_string;
        }

        $this->vdata['endereco_fk_idtipo_endereco_to_string'] = $this->endereco_fk_idtipo_endereco_to_string;
    }

    public function get_endereco_fk_idtipo_endereco_to_string()
    {
        if(!empty($this->endereco_fk_idtipo_endereco_to_string))
        {
            return $this->endereco_fk_idtipo_endereco_to_string;
        }
    
        $values = Endereco::where('cod_municipio', '=', $this->id_municipio)->getIndexedArray('idtipo_endereco','{fk_idtipo_endereco->idtipo}');
        return implode(', ', $values);
    }

    public function set_endereco_fk_cod_municipio_to_string($endereco_fk_cod_municipio_to_string)
    {
        if(is_array($endereco_fk_cod_municipio_to_string))
        {
            $values = Municipio::where('id_municipio', 'in', $endereco_fk_cod_municipio_to_string)->getIndexedArray('id_municipio', 'id_municipio');
            $this->endereco_fk_cod_municipio_to_string = implode(', ', $values);
        }
        else
        {
            $this->endereco_fk_cod_municipio_to_string = $endereco_fk_cod_municipio_to_string;
        }

        $this->vdata['endereco_fk_cod_municipio_to_string'] = $this->endereco_fk_cod_municipio_to_string;
    }

    public function get_endereco_fk_cod_municipio_to_string()
    {
        if(!empty($this->endereco_fk_cod_municipio_to_string))
        {
            return $this->endereco_fk_cod_municipio_to_string;
        }
    
        $values = Endereco::where('cod_municipio', '=', $this->id_municipio)->getIndexedArray('cod_municipio','{fk_cod_municipio->id_municipio}');
        return implode(', ', $values);
    }

    public function set_pessoa_municipio_nascimento_to_string($pessoa_municipio_nascimento_to_string)
    {
        if(is_array($pessoa_municipio_nascimento_to_string))
        {
            $values = Municipio::where('id_municipio', 'in', $pessoa_municipio_nascimento_to_string)->getIndexedArray('id_municipio', 'id_municipio');
            $this->pessoa_municipio_nascimento_to_string = implode(', ', $values);
        }
        else
        {
            $this->pessoa_municipio_nascimento_to_string = $pessoa_municipio_nascimento_to_string;
        }

        $this->vdata['pessoa_municipio_nascimento_to_string'] = $this->pessoa_municipio_nascimento_to_string;
    }

    public function get_pessoa_municipio_nascimento_to_string()
    {
        if(!empty($this->pessoa_municipio_nascimento_to_string))
        {
            return $this->pessoa_municipio_nascimento_to_string;
        }
    
        $values = Pessoa::where('id_municipio_nascimento', '=', $this->id_municipio)->getIndexedArray('id_municipio_nascimento','{municipio_nascimento->id_municipio}');
        return implode(', ', $values);
    }

    /**
     * Method onBeforeDelete
     */
    public function onBeforeDelete()
    {
            

        if(Endereco::where('cod_municipio', '=', $this->id_municipio)->first())
        {
            throw new Exception("Não é possível deletar este registro pois ele está sendo utilizado em outra parte do sistema");
        }
    
        if(Pessoa::where('id_municipio_nascimento', '=', $this->id_municipio)->first())
        {
            throw new Exception("Não é possível deletar este registro pois ele está sendo utilizado em outra parte do sistema");
        }
    
    }

    
}

