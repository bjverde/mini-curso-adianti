<?php

class Pedido extends TRecord
{
    const TABLENAME  = 'pedido';
    const PRIMARYKEY = 'idpedido';
    const IDPOLICY   =  'serial'; // {max, serial}

    private $fk_idtipo_pagamento;
    private $fk_idpessoa;

    

    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('idpessoa');
        parent::addAttribute('dat_pedido');
        parent::addAttribute('idtipo_pagamento');
            
    }

    /**
     * Method set_tipo
     * Sample of usage: $var->tipo = $object;
     * @param $object Instance of Tipo
     */
    public function set_fk_idtipo_pagamento(Tipo $object)
    {
        $this->fk_idtipo_pagamento = $object;
        $this->idtipo_pagamento = $object->idtipo;
    }

    /**
     * Method get_fk_idtipo_pagamento
     * Sample of usage: $var->fk_idtipo_pagamento->attribute;
     * @returns Tipo instance
     */
    public function get_fk_idtipo_pagamento()
    {
    
        // loads the associated object
        if (empty($this->fk_idtipo_pagamento))
            $this->fk_idtipo_pagamento = new Tipo($this->idtipo_pagamento);
    
        // returns the associated object
        return $this->fk_idtipo_pagamento;
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

    
}

