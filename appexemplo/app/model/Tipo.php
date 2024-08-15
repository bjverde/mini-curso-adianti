<?php

class Tipo extends TRecord
{
    const TABLENAME  = 'tipo';
    const PRIMARYKEY = 'idtipo';
    const IDPOLICY   =  'serial'; // {max, serial}

    const DELETEDAT  = 'dat_exclusao';

    

    //use SystemChangeLogTrait;
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('descricao');
        parent::addAttribute('dat_exclusao');
    }

    /**
     * Method getPedidos
     */
    public function getPedidos()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('idtipo_pagamento', '=', $this->idtipo));
        return Pedido::getObjects( $criteria );
    }
    /**
     * Method getEnderecos
     */
    public function getEnderecos()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('idtipo_endereco', '=', $this->idtipo));
        return Endereco::getObjects( $criteria );
    }
    /**
     * Method getTelefones
     */
    public function getTelefones()
    {
        $criteria = new TCriteria;
        $criteria->add(new TFilter('idtipo_telefone', '=', $this->idtipo));
        return Telefone::getObjects( $criteria );
    }

    public function set_pedido_fk_idpessoa_to_string($pedido_fk_idpessoa_to_string)
    {
        if(is_array($pedido_fk_idpessoa_to_string))
        {
            $values = Pessoa::where('idpessoa', 'in', $pedido_fk_idpessoa_to_string)->getIndexedArray('idpessoa', 'idpessoa');
            $this->pedido_fk_idpessoa_to_string = implode(', ', $values);
        }
        else
        {
            $this->pedido_fk_idpessoa_to_string = $pedido_fk_idpessoa_to_string;
        }

        $this->vdata['pedido_fk_idpessoa_to_string'] = $this->pedido_fk_idpessoa_to_string;
    }

    public function get_pedido_fk_idpessoa_to_string()
    {
        if(!empty($this->pedido_fk_idpessoa_to_string))
        {
            return $this->pedido_fk_idpessoa_to_string;
        }
    
        $values = Pedido::where('idtipo_pagamento', '=', $this->idtipo)->getIndexedArray('idpessoa','{fk_idpessoa->idpessoa}');
        return implode(', ', $values);
    }

    public function set_pedido_fk_idtipo_pagamento_to_string($pedido_fk_idtipo_pagamento_to_string)
    {
        if(is_array($pedido_fk_idtipo_pagamento_to_string))
        {
            $values = Tipo::where('idtipo', 'in', $pedido_fk_idtipo_pagamento_to_string)->getIndexedArray('idtipo', 'idtipo');
            $this->pedido_fk_idtipo_pagamento_to_string = implode(', ', $values);
        }
        else
        {
            $this->pedido_fk_idtipo_pagamento_to_string = $pedido_fk_idtipo_pagamento_to_string;
        }

        $this->vdata['pedido_fk_idtipo_pagamento_to_string'] = $this->pedido_fk_idtipo_pagamento_to_string;
    }

    public function get_pedido_fk_idtipo_pagamento_to_string()
    {
        if(!empty($this->pedido_fk_idtipo_pagamento_to_string))
        {
            return $this->pedido_fk_idtipo_pagamento_to_string;
        }
    
        $values = Pedido::where('idtipo_pagamento', '=', $this->idtipo)->getIndexedArray('idtipo_pagamento','{fk_idtipo_pagamento->idtipo}');
        return implode(', ', $values);
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
    
        $values = Endereco::where('idtipo_endereco', '=', $this->idtipo)->getIndexedArray('idpessoa','{fk_idpessoa->idpessoa}');
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
    
        $values = Endereco::where('idtipo_endereco', '=', $this->idtipo)->getIndexedArray('idtipo_endereco','{fk_idtipo_endereco->idtipo}');
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
    
        $values = Endereco::where('idtipo_endereco', '=', $this->idtipo)->getIndexedArray('cod_municipio','{fk_cod_municipio->id_municipio}');
        return implode(', ', $values);
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
    
        $values = Telefone::where('idtipo_telefone', '=', $this->idtipo)->getIndexedArray('idpessoa','{fk_idpessoa->idpessoa}');
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
    
        $values = Telefone::where('idtipo_telefone', '=', $this->idtipo)->getIndexedArray('idtipo_telefone','{fk_idtipo_telefone->idtipo}');
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
    
        $values = Telefone::where('idtipo_telefone', '=', $this->idtipo)->getIndexedArray('idendereco','{fk_idendereco->idendereco}');
        return implode(', ', $values);
    }

    /**
     * Method onBeforeDelete
     */
    public function onBeforeDelete()
    {
        if(Pedido::where('idtipo_pagamento', '=', $this->idtipo)->first())
        {
            throw new Exception("Não é possível deletar este registro pois ele está sendo utilizado em outra parte do sistema");
        }
    
        if(Endereco::where('idtipo_endereco', '=', $this->idtipo)->first())
        {
            throw new Exception("Não é possível deletar este registro pois ele está sendo utilizado em outra parte do sistema");
        }
    
        if(Telefone::where('idtipo_telefone', '=', $this->idtipo)->first())
        {
            throw new Exception("Não é possível deletar este registro pois ele está sendo utilizado em outra parte do sistema");
        }    
    }
}

