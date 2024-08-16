<?php

class Telefone extends TRecord
{
    const TABLENAME  = 'telefone';
    const PRIMARYKEY = 'idtelefone';
    const IDPOLICY   =  'serial'; // {max, serial}

    const DELETEDAT  = 'dat_exclusao';
    const CREATEDAT  = 'dat_inclusao';
    const UPDATEDAT  = 'dat_alteracao';

    private $fk_idpessoa;
    private $fk_idtipo_telefone;
    private $fk_idendereco;
    private $idpessoa;
    private $idtipo_telefone;
    private $idendereco;

    //use SystemChangeLogTrait;
    /**
     * Constructor method
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('numero');
        parent::addAttribute('idpessoa');
        parent::addAttribute('idtipo_telefone');
        parent::addAttribute('idendereco');
        parent::addAttribute('sit_fixo');
        parent::addAttribute('whastapp');
        parent::addAttribute('telegram');
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
    public function set_fk_idtipo_telefone(Tipo $object)
    {
        $this->fk_idtipo_telefone = $object;
        $this->idtipo_telefone = $object->idtipo;
    }

    /**
     * Method get_fk_idtipo_telefone
     * Sample of usage: $var->fk_idtipo_telefone->attribute;
     * @returns Tipo instance
     */
    public function get_fk_idtipo_telefone()
    {
        // loads the associated object
        if (empty($this->fk_idtipo_telefone))
            $this->fk_idtipo_telefone = new Tipo($this->idtipo_telefone);
    
        // returns the associated object
        return $this->fk_idtipo_telefone;
    }
    /**
     * Method set_endereco
     * Sample of usage: $var->endereco = $object;
     * @param $object Instance of Endereco
     */
    public function set_fk_idendereco(Endereco $object)
    {
        $this->fk_idendereco = $object;
        $this->idendereco = $object->idendereco;
    }

    /**
     * Method get_fk_idendereco
     * Sample of usage: $var->fk_idendereco->attribute;
     * @returns Endereco instance
     */
    public function get_fk_idendereco()
    {
        // loads the associated object
        if (empty($this->fk_idendereco))
            $this->fk_idendereco = new Endereco($this->idendereco);
    
        // returns the associated object
        return $this->fk_idendereco;
    }
}