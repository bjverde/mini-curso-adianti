<?php

class TelefoneForm extends TPage
{
    protected $form;
    private $formFields = [];
    private static $database = 'maindatabase';
    private static $activeRecord = 'Telefone';
    private static $primaryKey = 'idtelefone';
    private static $formName = 'form_TelefoneForm';

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
        $this->form->setFormTitle("Cadastro Telefone");

        $criteria_idpessoa = new TCriteria();
        $criteria_idtipo_telefone = new TCriteria();
        $criteria_idendereco = new TCriteria();

        $idtelefone = new TEntry('idtelefone');
        $numero = new TEntry('numero');
        $idpessoa = new TDBCombo('idpessoa', 'maindatabase', 'Pessoa', 'idpessoa', '{nome}','nome asc' , $criteria_idpessoa );
        $idtipo_telefone = new TDBCombo('idtipo_telefone', 'maindatabase', 'Tipo', 'idtipo', '{descricao}','descricao asc' , $criteria_idtipo_telefone );
        $idendereco = new TDBCombo('idendereco', 'maindatabase', 'Endereco', 'idendereco', '{endereco}','idendereco asc' , $criteria_idendereco );
        $sit_fixo = new TRadioGroup('sit_fixo');
        $whastapp = new TRadioGroup('whastapp');
        $telegram = new TRadioGroup('telegram');

        $numero->addValidation("Numero", new TRequiredValidator()); 
        $idpessoa->addValidation("Idpessoa", new TRequiredValidator()); 
        $idtipo_telefone->addValidation("Idtipo telefone", new TRequiredValidator()); 
        $sit_fixo->addValidation("Fixo", new TRequiredValidator()); 

        $idtelefone->setEditable(false);
        $numero->setMask('(99) 99999-9999');
        $numero->setMaxLength(45);
        $idpessoa->enableSearch();
        $idendereco->enableSearch();
        $idtipo_telefone->enableSearch();

        $sit_fixo->addItems(["1"=>"Sim","2"=>"Não"]);
        $whastapp->addItems(["1"=>"Sim","2"=>"Não"]);
        $telegram->addItems(["1"=>"Sim","2"=>"Não"]);

        $sit_fixo->setLayout('horizontal');
        $whastapp->setLayout('horizontal');
        $telegram->setLayout('horizontal');

        $sit_fixo->setBooleanMode();
        $whastapp->setBooleanMode();
        $telegram->setBooleanMode();

        $numero->setSize('100%');
        $idtelefone->setSize(100);
        $idpessoa->setSize('100%');
        $sit_fixo->setSize('100%');
        $whastapp->setSize('100%');
        $telegram->setSize('100%');
        $idendereco->setSize('100%');
        $idtipo_telefone->setSize('100%');

        $row1 = $this->form->addFields([new TLabel("Idtelefone:", null, '14px', null)],[$idtelefone],[new TLabel("Numero:", '#ff0000', '14px', null)],[$numero]);
        $row2 = $this->form->addFields([new TLabel("Pessoa:", '#ff0000', '14px', null)],[$idpessoa],[new TLabel("tipo:", '#ff0000', '14px', null)],[$idtipo_telefone]);
        $row3 = $this->form->addFields([new TLabel("Endereço:", null, '14px', null)],[$idendereco],[new TLabel("Fixo:", null, '14px', null)],[$sit_fixo]);
        $row4 = $this->form->addFields([new TLabel("Whastapp:", null, '14px', null)],[$whastapp],[new TLabel("Telegram:", null, '14px', null)],[$telegram]);

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
            $container->add(TBreadCrumb::create(["Básico","Cadastro Telefone"]));
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

            $object = new Telefone(); // create an empty object 

            $data = $this->form->getData(); // get form data as array
            $object->fromArray( (array) $data); // load the object with data

            $object->store(); // save the object 

            // get the generated {PRIMARY_KEY}
            $data->idtelefone = $object->idtelefone; 

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

                $object = new Telefone($key); // instantiates the Active Record 

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

