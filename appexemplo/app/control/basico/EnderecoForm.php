<?php

class EnderecoForm extends TPage
{
    protected $form;
    private $formFields = [];
    private static $database = 'maindatabase';
    private static $activeRecord = 'Endereco';
    private static $primaryKey = 'idendereco';
    private static $formName = 'form_EnderecoForm';

    /**
     * Form constructor
     * @param $param Request
     */
    public function __construct( $param )
    {
        parent::__construct();

        if(!empty($param['target_container']))
        {
            $this->adianti_target_container = $param['target_container'];
        }

        // creates the form
        $this->form = new BootstrapFormBuilder(self::$formName);
        // define the form title
        $this->form->setFormTitle("Cadastrar Endereço");

        $criteria_idpessoa = new TCriteria();
        $criteria_idtipo_endereco = new TCriteria();
        $criteria_cod_municipio = new TCriteria();

        $idendereco = new TEntry('idendereco');
        $idpessoa = new TDBCombo('idpessoa', 'maindatabase', 'Pessoa', 'idpessoa', '{nome}','nome asc' , $criteria_idpessoa );
        $idtipo_endereco = new TDBCombo('idtipo_endereco', 'maindatabase', 'Tipo', 'idtipo', '{idtipo}','descricao desc' , $criteria_idtipo_endereco );
        $cod_municipio = new TDBCombo('cod_municipio', 'maindatabase', 'Municipio', 'id_municipio', '{fk_cod_uf->sig_uf} -{nom_municipio}','nom_municipio asc' , $criteria_cod_municipio );
        $endereco = new TEntry('endereco');
        $cidade = new TEntry('cidade');
        $cep = new TEntry('cep');
        $numero = new TEntry('numero');
        $complemento = new TEntry('complemento');
        $bairro = new TEntry('bairro');

        $idpessoa->addValidation("Idpessoa", new TRequiredValidator()); 
        $idtipo_endereco->addValidation("Idtipo endereco", new TRequiredValidator()); 
        $cod_municipio->addValidation("Cod municipio", new TRequiredValidator()); 
        $endereco->addValidation("Endereco", new TRequiredValidator()); 

        $idendereco->setEditable(false);
        $idpessoa->enableSearch();
        $cod_municipio->enableSearch();
        $idtipo_endereco->enableSearch();

        $cep->setMaxLength(8);
        $numero->setMaxLength(5);
        $cidade->setMaxLength(300);
        $bairro->setMaxLength(300);
        $endereco->setMaxLength(300);
        $complemento->setMaxLength(300);

        $cep->setSize('100%');
        $cidade->setSize('100%');
        $numero->setSize('100%');
        $bairro->setSize('100%');
        $idendereco->setSize(100);
        $idpessoa->setSize('100%');
        $endereco->setSize('100%');
        $complemento->setSize('100%');
        $cod_municipio->setSize('100%');
        $idtipo_endereco->setSize('100%');

        $row1 = $this->form->addFields([new TLabel("Idendereco:", null, '14px', null)],[$idendereco],[new TLabel("Pessoa:", '#ff0000', '14px', null)],[$idpessoa]);
        $row2 = $this->form->addFields([new TLabel("Tipo:", '#ff0000', '14px', null)],[$idtipo_endereco],[new TLabel("Municipio:", '#ff0000', '14px', null)],[$cod_municipio]);
        $row3 = $this->form->addFields([new TLabel("Endereco:", '#ff0000', '14px', null)],[$endereco],[new TLabel("Cidade:", null, '14px', null)],[$cidade]);
        $row4 = $this->form->addFields([new TLabel("Cep:", null, '14px', null)],[$cep],[new TLabel("Numero:", null, '14px', null)],[$numero]);
        $row5 = $this->form->addFields([new TLabel("Complemento:", null, '14px', null)],[$complemento],[new TLabel("Bairro:", null, '14px', null)],[$bairro]);

        // create the form actions
        $btn_onsave = $this->form->addAction("Salvar", new TAction([$this, 'onSave']), 'fas:save #ffffff');
        $this->btn_onsave = $btn_onsave;
        $btn_onsave->addStyleClass('btn-primary'); 

        $btn_onclear = $this->form->addAction("Limpar formulário", new TAction([$this, 'onClear']), 'fas:eraser #dd5a43');
        $this->btn_onclear = $btn_onclear;

        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        $container->class = 'form-container';
        if(empty($param['target_container']))
        {
            $container->add(TBreadCrumb::create(["Básico","Cadastrar Endereço"]));
        }
        $container->add($this->form);

        parent::add($container);

    }

    public function onSave($param = null) 
    {
        try
        {
            TTransaction::open(self::$database); // open a transaction

            $messageAction = null;

            $this->form->validate(); // validate form data

            $object = new Endereco(); // create an empty object 

            $data = $this->form->getData(); // get form data as array
            $object->fromArray( (array) $data); // load the object with data

            $object->store(); // save the object 

            // get the generated {PRIMARY_KEY}
            $data->idendereco = $object->idendereco; 

            $this->form->setData($data); // fill form data
            TTransaction::close(); // close the transaction

            new TMessage('info', "Registro salvo", $messageAction); 

        }
        catch (Exception $e) // in case of exception
        {
            //</catchAutoCode> 

            new TMessage('error', $e->getMessage()); // shows the exception error message
            $this->form->setData( $this->form->getData() ); // keep form data
            TTransaction::rollback(); // undo all pending operations
        }
    }

    public function onEdit( $param )
    {
        try
        {
            if (isset($param['key']))
            {
                $key = $param['key'];  // get the parameter $key
                TTransaction::open(self::$database); // open a transaction

                $object = new Endereco($key); // instantiates the Active Record 

                $this->form->setData($object); // fill the form 

                TTransaction::close(); // close the transaction 
            }
            else
            {
                $this->form->clear();
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }

    /**
     * Clear form data
     * @param $param Request
     */
    public function onClear( $param )
    {
        $this->form->clear(true);

    }

    public function onShow($param = null)
    {

    } 

    public static function getFormName()
    {
        return self::$formName;
    }

}

