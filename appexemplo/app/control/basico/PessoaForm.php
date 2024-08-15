<?php

class PessoaForm extends TPage
{
    protected $form;
    private $formFields = [];
    private static $database = 'maindatabase';
    private static $activeRecord = 'Pessoa';
    private static $primaryKey = 'idpessoa';
    private static $formName = 'form_PessoaForm';

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
        $this->form->setFormTitle("Cadastar Pessoa");

        $criteria_id_municipio_nascimento = new TCriteria();

        $idpessoa = new TEntry('idpessoa');
        $nome = new TEntry('nome');
        $cpf = new TEntry('cpf');
        $dat_nascimento = new TDate('dat_nascimento');
        $id_municipio_nascimento = new TDBCombo('id_municipio_nascimento', 'maindatabase', 'Municipio', 'id_municipio', '{fk_cod_uf->sig_uf}  - {nom_municipio}','nom_municipio asc' , $criteria_id_municipio_nascimento );

        $nome->addValidation("Nome", new TRequiredValidator()); 

        $idpessoa->setEditable(false);
        $dat_nascimento->setMask('dd/mm/yyyy');
        $dat_nascimento->setDatabaseMask('yyyy-mm-dd');
        $id_municipio_nascimento->enableSearch();
        $cpf->setMaxLength(11);
        $nome->setMaxLength(200);

        $cpf->setSize('100%');
        $nome->setSize('100%');
        $idpessoa->setSize(100);
        $dat_nascimento->setSize(110);
        $id_municipio_nascimento->setSize('100%');

        $row1 = $this->form->addFields([new TLabel("id:", null, '14px', null)],[$idpessoa],[new TLabel("Nome:", '#ff0000', '14px', null)],[$nome]);
        $row2 = $this->form->addFields([new TLabel("CPf:", null, '14px', null)],[$cpf],[new TLabel("Data de Nascimento:", null, '14px', null)],[$dat_nascimento]);
        $row3 = $this->form->addFields([new TLabel("Municipio nascimento:", null, '14px', null)],[$id_municipio_nascimento],[],[]);

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
            $container->add(TBreadCrumb::create(["Básico","Cadastar Pessoa"]));
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

            $object = new Pessoa(); // create an empty object 

            $data = $this->form->getData(); // get form data as array
            $object->fromArray( (array) $data); // load the object with data

            $object->store(); // save the object 

            // get the generated {PRIMARY_KEY}
            $data->idpessoa = $object->idpessoa; 

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

                $object = new Pessoa($key); // instantiates the Active Record 

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

