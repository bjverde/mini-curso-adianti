<?php

class MunicipioForm extends TPage
{
    protected $form;
    private $formFields = [];
    private static $database = 'maindatabase';
    private static $activeRecord = 'Municipio';
    private static $primaryKey = 'id_municipio';
    private static $formName = 'form_MunicipioForm';

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
        $this->form->setFormTitle("Cadastro Municipio");

        $criteria_cod_uf = new TCriteria();

        $id_municipio = new TEntry('id_municipio');
        $cod_uf = new TDBCombo('cod_uf', 'maindatabase', 'Uf', 'cod_uf', '{nom_uf}','nom_uf asc' , $criteria_cod_uf );
        $nom_municipio = new TEntry('nom_municipio');

        $cod_uf->addValidation("Cod uf", new TRequiredValidator()); 
        $nom_municipio->addValidation("Nom municipio", new TRequiredValidator()); 

        $id_municipio->setEditable(false);
        $cod_uf->enableSearch();
        $nom_municipio->setMaxLength(200);
        $cod_uf->setSize('100%');
        $id_municipio->setSize(100);
        $nom_municipio->setSize('100%');

        $row1 = $this->form->addFields([new TLabel("Id municipio:", null, '14px', null)],[$id_municipio]);
        $row2 = $this->form->addFields([new TLabel("uf:", '#ff0000', '14px', null)],[$cod_uf]);
        $row3 = $this->form->addFields([new TLabel("nome:", '#ff0000', '14px', null)],[$nom_municipio]);

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
            $container->add(TBreadCrumb::create(["Básico","Cadastro Municipio"]));
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

            $object = new Municipio(); // create an empty object 

            $data = $this->form->getData(); // get form data as array
            $object->fromArray( (array) $data); // load the object with data

            $object->store(); // save the object 

            // get the generated {PRIMARY_KEY}
            $data->id_municipio = $object->id_municipio; 

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

                $object = new Municipio($key); // instantiates the Active Record 

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

