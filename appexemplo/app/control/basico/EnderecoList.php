<?php

class EnderecoList extends TPage
{
    private $form; // form
    private $datagrid; // listing
    private $pageNavigation;
    private $loaded;
    private $filter_criteria;
    private static $database = 'maindatabase';
    private static $activeRecord = 'Endereco';
    private static $primaryKey = 'idendereco';
    private static $formName = 'form_EnderecoList';
    private $showMethods = ['onReload', 'onSearch', 'onRefresh', 'onClearFilters'];
    private $limit = 20;

    /**
     * Class constructor
     * Creates the page, the form and the listing
     */
    public function __construct($param = null)
    {
        parent::__construct();

        if(!empty($param['target_container']))
        {
            $this->adianti_target_container = $param['target_container'];
        }

        // creates the form
        $this->form = new BootstrapFormBuilder(self::$formName);

        // define the form title
        $this->form->setFormTitle("Endereço");
        $this->limit = 20;

        $criteria_idpessoa = new TCriteria();
        $criteria_idtipo_endereco = new TCriteria();
        $criteria_cod_municipio = new TCriteria();

        $idendereco = new TEntry('idendereco');
        $idpessoa = new TDBCombo('idpessoa', 'maindatabase', 'Pessoa', 'idpessoa', '{nome}','nome asc' , $criteria_idpessoa );
        $idtipo_endereco = new TDBCombo('idtipo_endereco', 'maindatabase', 'Tipo', 'idtipo', '{idtipo}','idtipo asc' , $criteria_idtipo_endereco );
        $cod_municipio = new TDBCombo('cod_municipio', 'maindatabase', 'Municipio', 'id_municipio', '{fk_cod_uf->sig_uf} -{nom_municipio}','id_municipio asc' , $criteria_cod_municipio );
        $cep = new TEntry('cep');
        $endereco = new TEntry('endereco');
        $cidade = new TEntry('cidade');
        $numero = new TEntry('numero');
        $complemento = new TEntry('complemento');
        $bairro = new TEntry('bairro');


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

        $row1 = $this->form->addFields([new TLabel("id:", null, '14px', null)],[$idendereco]);
        $row2 = $this->form->addFields([new TLabel("Pessoa:", null, '14px', null)],[$idpessoa],[new TLabel("Tipo:", null, '14px', null)],[$idtipo_endereco]);
        $row3 = $this->form->addFields([new TLabel("Municipio:", null, '14px', null)],[$cod_municipio],[new TLabel("Cep:", null, '14px', null)],[$cep]);
        $row4 = $this->form->addFields([new TLabel("Endereco:", null, '14px', null)],[$endereco],[new TLabel("Cidade:", null, '14px', null)],[$cidade]);
        $row5 = $this->form->addFields([new TLabel("Numero:", null, '14px', null)],[$numero]);
        $row6 = $this->form->addFields([new TLabel("Complemento:", null, '14px', null)],[$complemento],[new TLabel("Bairro:", null, '14px', null)],[$bairro]);

        // keep the form filled during navigation with session data
        $this->form->setData( TSession::getValue(__CLASS__.'_filter_data') );

        $btn_onsearch = $this->form->addAction("Buscar", new TAction([$this, 'onSearch']), 'fas:search #ffffff');
        $this->btn_onsearch = $btn_onsearch;
        $btn_onsearch->addStyleClass('btn-primary'); 

        $btn_onshow = $this->form->addAction("Cadastrar", new TAction(['EnderecoForm', 'onShow']), 'fas:plus #69aa46');
        $this->btn_onshow = $btn_onshow;

        // creates a Datagrid
        $this->datagrid = new TDataGrid;
        $this->datagrid->disableHtmlConversion();
        $this->datagrid->setId(__CLASS__.'_datagrid');

        $this->datagrid_form = new TForm('datagrid_'.self::$formName);
        $this->datagrid_form->onsubmit = 'return false';

        $this->datagrid = new BootstrapDatagridWrapper($this->datagrid);
        $this->filter_criteria = new TCriteria;

        $this->datagrid->style = 'width: 100%';
        $this->datagrid->setHeight(250);

        $column_idendereco = new TDataGridColumn('idendereco', "id", 'center' , '70px');
        $column_idpessoa = new TDataGridColumn('idpessoa', "Pessoa", 'left');
        $column_fk_idtipo_endereco_descricao = new TDataGridColumn('fk_idtipo_endereco->descricao', "Tipo", 'left');
        $column_fk_cod_municipio_fk_cod_uf_sig_uf_fk_cod_municipio_nom_municipio = new TDataGridColumn('{fk_cod_municipio->fk_cod_uf->sig_uf}  - {fk_cod_municipio->nom_municipio}', "Municipio", 'left');
        $column_cidade = new TDataGridColumn('cidade', "Cidade", 'left');
        $column_bairro = new TDataGridColumn('bairro', "Bairro", 'left');
        $column_endereco = new TDataGridColumn('endereco', "Endereco", 'left');
        $column_complemento = new TDataGridColumn('complemento', "Complemento", 'left');
        $column_numero = new TDataGridColumn('numero', "Numero", 'left');
        $column_cep = new TDataGridColumn('cep', "Cep", 'left');

        $order_idendereco = new TAction(array($this, 'onReload'));
        $order_idendereco->setParameter('order', 'idendereco');
        $column_idendereco->setAction($order_idendereco);

        $this->datagrid->addColumn($column_idendereco);
        $this->datagrid->addColumn($column_idpessoa);
        $this->datagrid->addColumn($column_fk_idtipo_endereco_descricao);
        $this->datagrid->addColumn($column_fk_cod_municipio_fk_cod_uf_sig_uf_fk_cod_municipio_nom_municipio);
        $this->datagrid->addColumn($column_cidade);
        $this->datagrid->addColumn($column_bairro);
        $this->datagrid->addColumn($column_endereco);
        $this->datagrid->addColumn($column_complemento);
        $this->datagrid->addColumn($column_numero);
        $this->datagrid->addColumn($column_cep);

        $action_onEdit = new TDataGridAction(array('EnderecoForm', 'onEdit'));
        $action_onEdit->setUseButton(false);
        $action_onEdit->setButtonClass('btn btn-default btn-sm');
        $action_onEdit->setLabel("Editar");
        $action_onEdit->setImage('far:edit #478fca');
        $action_onEdit->setField(self::$primaryKey);

        $this->datagrid->addAction($action_onEdit);

        $action_onDelete = new TDataGridAction(array('EnderecoList', 'onDelete'));
        $action_onDelete->setUseButton(false);
        $action_onDelete->setButtonClass('btn btn-default btn-sm');
        $action_onDelete->setLabel("Excluir");
        $action_onDelete->setImage('fas:trash-alt #dd5a43');
        $action_onDelete->setField(self::$primaryKey);

        $this->datagrid->addAction($action_onDelete);

        // create the datagrid model
        $this->datagrid->createModel();

        // creates the page navigation
        $this->pageNavigation = new TPageNavigation;
        $this->pageNavigation->enableCounters();
        $this->pageNavigation->setAction(new TAction(array($this, 'onReload')));
        $this->pageNavigation->setWidth($this->datagrid->getWidth());

        $panel = new TPanelGroup();
        $panel->datagrid = 'datagrid-container';
        $this->datagridPanel = $panel;
        $this->datagrid_form->add($this->datagrid);
        $panel->add($this->datagrid_form);

        $panel->getBody()->class .= ' table-responsive';

        $panel->addFooter($this->pageNavigation);

        $headerActions = new TElement('div');
        $headerActions->class = ' datagrid-header-actions ';
        $headerActions->style = 'justify-content: space-between;';

        $head_left_actions = new TElement('div');
        $head_left_actions->class = ' datagrid-header-actions-left-actions ';

        $head_right_actions = new TElement('div');
        $head_right_actions->class = ' datagrid-header-actions-left-actions ';

        $headerActions->add($head_left_actions);
        $headerActions->add($head_right_actions);

        $panel->getBody()->insert(0, $headerActions);

        $dropdown_button_exportar = new TDropDown("Exportar", 'fas:file-export #2d3436');
        $dropdown_button_exportar->setPullSide('right');
        $dropdown_button_exportar->setButtonClass('btn btn-default waves-effect dropdown-toggle');
        $dropdown_button_exportar->addPostAction( "CSV", new TAction(['EnderecoList', 'onExportCsv'],['static' => 1]), 'datagrid_'.self::$formName, 'fas:file-csv #00b894' );
        $dropdown_button_exportar->addPostAction( "XLS", new TAction(['EnderecoList', 'onExportXls'],['static' => 1]), 'datagrid_'.self::$formName, 'fas:file-excel #4CAF50' );
        $dropdown_button_exportar->addPostAction( "PDF", new TAction(['EnderecoList', 'onExportPdf'],['static' => 1]), 'datagrid_'.self::$formName, 'far:file-pdf #e74c3c' );
        $dropdown_button_exportar->addPostAction( "XML", new TAction(['EnderecoList', 'onExportXml'],['static' => 1]), 'datagrid_'.self::$formName, 'far:file-code #95a5a6' );

        $head_right_actions->add($dropdown_button_exportar);

        // vertical box container
        $container = new TVBox;
        $container->style = 'width: 100%';
        if(empty($param['target_container']))
        {
            $container->add(TBreadCrumb::create(["Básico","Endereço"]));
        }
        $container->add($this->form);
        $container->add($panel);

        parent::add($container);

    }

    public function onDelete($param = null) 
    { 
        if(isset($param['delete']) && $param['delete'] == 1)
        {
            try
            {
                // get the paramseter $key
                $key = $param['key'];
                // open a transaction with database
                TTransaction::open(self::$database);

                // instantiates object
                $object = new Endereco($key, FALSE); 

                // deletes the object from the database
                $object->delete();

                // close the transaction
                TTransaction::close();

                // reload the listing
                $this->onReload( $param );
                // shows the success message
                new TMessage('info', AdiantiCoreTranslator::translate('Record deleted'));
            }
            catch (Exception $e) // in case of exception
            {
                // shows the exception error message
                new TMessage('error', $e->getMessage());
                // undo all pending operations
                TTransaction::rollback();
            }
        }
        else
        {
            // define the delete action
            $action = new TAction(array($this, 'onDelete'));
            $action->setParameters($param); // pass the key paramseter ahead
            $action->setParameter('delete', 1);
            // shows a dialog to the user
            new TQuestion(AdiantiCoreTranslator::translate('Do you really want to delete ?'), $action);   
        }
    }

    public function onExportCsv($param = null) 
    {
        try
        {
            $output = 'app/output/'.uniqid().'.csv';

            if ( (!file_exists($output) && is_writable(dirname($output))) OR is_writable($output))
            {
                $this->limit = 0;
                $objects = $this->onReload();

                if ($objects)
                {
                    $handler = fopen($output, 'w');
                    TTransaction::open(self::$database);

                    foreach ($objects as $object)
                    {
                        $row = [];
                        foreach ($this->datagrid->getColumns() as $column)
                        {
                            $column_name = $column->getName();

                            if (isset($object->$column_name))
                            {
                                $row[] = is_scalar($object->$column_name) ? $object->$column_name : '';
                            }
                            else if (method_exists($object, 'render'))
                            {
                                $column_name = (strpos((string)$column_name, '{') === FALSE) ? ( '{' . $column_name . '}') : $column_name;
                                $row[] = $object->render($column_name);
                            }
                        }

                        fputcsv($handler, $row);
                    }

                    fclose($handler);
                    TTransaction::close();
                }
                else
                {
                    throw new Exception(_t('No records found'));
                }

                TPage::openFile($output);
            }
            else
            {
                throw new Exception(_t('Permission denied') . ': ' . $output);
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
        }
    }

    public function onExportXls($param = null) 
    {
        try
        {
            $output = 'app/output/'.uniqid().'.xls';

            if ( (!file_exists($output) && is_writable(dirname($output))) OR is_writable($output))
            {
                $widths = [];
                $titles = [];

                foreach ($this->datagrid->getColumns() as $column)
                {
                    $titles[] = $column->getLabel();
                    $width    = 100;

                    if (is_null($column->getWidth()))
                    {
                        $width = 100;
                    }
                    else if (strpos((string)$column->getWidth(), '%') !== false)
                    {
                        $width = ((int) $column->getWidth()) * 5;
                    }
                    else if (is_numeric($column->getWidth()))
                    {
                        $width = $column->getWidth();
                    }

                    $widths[] = $width;
                }

                $table = new \TTableWriterXLS($widths);
                $table->addStyle('title',  'Helvetica', '10', 'B', '#ffffff', '#617FC3');
                $table->addStyle('data',   'Helvetica', '10', '',  '#000000', '#FFFFFF', 'LR');

                $table->addRow();

                foreach ($titles as $title)
                {
                    $table->addCell($title, 'center', 'title');
                }

                $this->limit = 0;
                $objects = $this->onReload();

                TTransaction::open(self::$database);
                if ($objects)
                {
                    foreach ($objects as $object)
                    {
                        $table->addRow();
                        foreach ($this->datagrid->getColumns() as $column)
                        {
                            $column_name = $column->getName();
                            $value = '';
                            if (isset($object->$column_name))
                            {
                                $value = is_scalar($object->$column_name) ? $object->$column_name : '';
                            }
                            else if (method_exists($object, 'render'))
                            {
                                $column_name = (strpos((string)$column_name, '{') === FALSE) ? ( '{' . $column_name . '}') : $column_name;
                                $value = $object->render($column_name);
                            }

                            $transformer = $column->getTransformer();
                            if ($transformer)
                            {
                                $value = strip_tags((string)call_user_func($transformer, $value, $object, null));
                            }

                            $table->addCell($value, 'center', 'data');
                        }
                    }
                }
                $table->save($output);
                TTransaction::close();

                TPage::openFile($output);
            }
            else
            {
                throw new Exception(_t('Permission denied') . ': ' . $output);
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
        }
    }

    public function onExportPdf($param = null) 
    {
        try
        {
            $output = 'app/output/'.uniqid().'.pdf';

            if ( (!file_exists($output) && is_writable(dirname($output))) OR is_writable($output))
            {
                $this->limit = 0;
                $this->datagrid->prepareForPrinting();
                $this->onReload();

                $html = clone $this->datagrid;
                $contents = file_get_contents('app/resources/styles-print.html') . $html->getContents();

                $dompdf = new \Dompdf\Dompdf;
                $dompdf->loadHtml($contents);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();

                file_put_contents($output, $dompdf->output());

                $window = TWindow::create('PDF', 0.8, 0.8);
                $object = new TElement('iframe');
                $object->src  = $output;
                $object->type  = 'application/pdf';
                $object->style = "width: 100%; height:calc(100% - 10px)";

                $window->add($object);
                $window->show();
            }
            else
            {
                throw new Exception(_t('Permission denied') . ': ' . $output);
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
        }
    }

    public function onExportXml($param = null) 
    {
        try
        {
            $output = 'app/output/'.uniqid().'.xml';

            if ( (!file_exists($output) && is_writable(dirname($output))) OR is_writable($output))
            {
                $this->limit = 0;
                $objects = $this->onReload();

                if ($objects)
                {
                    TTransaction::open(self::$database);

                    $dom = new DOMDocument('1.0', 'UTF-8');
                    $dom->{'formatOutput'} = true;
                    $dataset = $dom->appendChild( $dom->createElement('dataset') );

                    foreach ($objects as $object)
                    {
                        $row = $dataset->appendChild( $dom->createElement( self::$activeRecord ) );

                        foreach ($this->datagrid->getColumns() as $column)
                        {
                            $column_name = $column->getName();
                            $column_name_raw = str_replace(['(','{','->', '-','>','}',')', ' '], ['','','_','','','','','_'], $column_name);

                            if (isset($object->$column_name))
                            {
                                $value = is_scalar($object->$column_name) ? $object->$column_name : '';
                                $row->appendChild($dom->createElement($column_name_raw, $value)); 
                            }
                            else if (method_exists($object, 'render'))
                            {
                                $column_name = (strpos((string)$column_name, '{') === FALSE) ? ( '{' . $column_name . '}') : $column_name;
                                $value = $object->render($column_name);
                                $row->appendChild($dom->createElement($column_name_raw, $value));
                            }
                        }
                    }

                    $dom->save($output);

                    TTransaction::close();
                }
                else
                {
                    throw new Exception(_t('No records found'));
                }

                TPage::openFile($output);
            }
            else
            {
                throw new Exception(_t('Permission denied') . ': ' . $output);
            }
        }
        catch (Exception $e) // in case of exception
        {
            new TMessage('error', $e->getMessage()); // shows the exception error message
            TTransaction::rollback(); // undo all pending operations
        }
    }

    /**
     * Register the filter in the session
     */
    public function onSearch($param = null)
    {
        $data = $this->form->getData();
        $filters = [];

        TSession::setValue(__CLASS__.'_filter_data', NULL);
        TSession::setValue(__CLASS__.'_filters', NULL);

        if (isset($data->idendereco) AND ( (is_scalar($data->idendereco) AND $data->idendereco !== '') OR (is_array($data->idendereco) AND (!empty($data->idendereco)) )) )
        {

            $filters[] = new TFilter('idendereco', '=', $data->idendereco);// create the filter 
        }

        if (isset($data->idpessoa) AND ( (is_scalar($data->idpessoa) AND $data->idpessoa !== '') OR (is_array($data->idpessoa) AND (!empty($data->idpessoa)) )) )
        {

            $filters[] = new TFilter('idpessoa', '=', $data->idpessoa);// create the filter 
        }

        if (isset($data->idtipo_endereco) AND ( (is_scalar($data->idtipo_endereco) AND $data->idtipo_endereco !== '') OR (is_array($data->idtipo_endereco) AND (!empty($data->idtipo_endereco)) )) )
        {

            $filters[] = new TFilter('idtipo_endereco', '=', $data->idtipo_endereco);// create the filter 
        }

        if (isset($data->cod_municipio) AND ( (is_scalar($data->cod_municipio) AND $data->cod_municipio !== '') OR (is_array($data->cod_municipio) AND (!empty($data->cod_municipio)) )) )
        {

            $filters[] = new TFilter('cod_municipio', '=', $data->cod_municipio);// create the filter 
        }

        if (isset($data->cep) AND ( (is_scalar($data->cep) AND $data->cep !== '') OR (is_array($data->cep) AND (!empty($data->cep)) )) )
        {

            $filters[] = new TFilter('cep', 'like', "%{$data->cep}%");// create the filter 
        }

        if (isset($data->endereco) AND ( (is_scalar($data->endereco) AND $data->endereco !== '') OR (is_array($data->endereco) AND (!empty($data->endereco)) )) )
        {

            $filters[] = new TFilter('endereco', 'like', "%{$data->endereco}%");// create the filter 
        }

        if (isset($data->cidade) AND ( (is_scalar($data->cidade) AND $data->cidade !== '') OR (is_array($data->cidade) AND (!empty($data->cidade)) )) )
        {

            $filters[] = new TFilter('cidade', 'like', "%{$data->cidade}%");// create the filter 
        }

        if (isset($data->numero) AND ( (is_scalar($data->numero) AND $data->numero !== '') OR (is_array($data->numero) AND (!empty($data->numero)) )) )
        {

            $filters[] = new TFilter('numero', 'like', "%{$data->numero}%");// create the filter 
        }

        if (isset($data->complemento) AND ( (is_scalar($data->complemento) AND $data->complemento !== '') OR (is_array($data->complemento) AND (!empty($data->complemento)) )) )
        {

            $filters[] = new TFilter('complemento', 'like', "%{$data->complemento}%");// create the filter 
        }

        if (isset($data->bairro) AND ( (is_scalar($data->bairro) AND $data->bairro !== '') OR (is_array($data->bairro) AND (!empty($data->bairro)) )) )
        {

            $filters[] = new TFilter('bairro', 'like', "%{$data->bairro}%");// create the filter 
        }

        // fill the form with data again
        $this->form->setData($data);

        // keep the search data in the session
        TSession::setValue(__CLASS__.'_filter_data', $data);
        TSession::setValue(__CLASS__.'_filters', $filters);

        $this->onReload(['offset' => 0, 'first_page' => 1]);
    }

    /**
     * Load the datagrid with data
     */
    public function onReload($param = NULL)
    {
        try
        {
            // open a transaction with database 'maindatabase'
            TTransaction::open(self::$database);

            // creates a repository for Endereco
            $repository = new TRepository(self::$activeRecord);

            $criteria = clone $this->filter_criteria;

            if (empty($param['order']))
            {
                $param['order'] = 'idendereco';    
            }

            if (empty($param['direction']))
            {
                $param['direction'] = 'desc';
            }

            $criteria->setProperties($param); // order, offset
            $criteria->setProperty('limit', $this->limit);

            if($filters = TSession::getValue(__CLASS__.'_filters'))
            {
                foreach ($filters as $filter) 
                {
                    $criteria->add($filter);       
                }
            }

            // load the objects according to criteria
            $objects = $repository->load($criteria, FALSE);

            $this->datagrid->clear();
            if ($objects)
            {
                // iterate the collection of active records
                foreach ($objects as $object)
                {

                    $row = $this->datagrid->addItem($object);
                    $row->id = "row_{$object->idendereco}";

                }
            }

            // reset the criteria for record count
            $criteria->resetProperties();
            $count= $repository->count($criteria);

            $this->pageNavigation->setCount($count); // count of records
            $this->pageNavigation->setProperties($param); // order, page
            $this->pageNavigation->setLimit($this->limit); // limit

            // close the transaction
            TTransaction::close();
            $this->loaded = true;

            return $objects;
        }
        catch (Exception $e) // in case of exception
        {
            // shows the exception error message
            new TMessage('error', $e->getMessage());
            // undo all pending operations
            TTransaction::rollback();
        }
    }

    public function onShow($param = null)
    {

    }

    /**
     * method show()
     * Shows the page
     */
    public function show()
    {
        // check if the datagrid is already loaded
        if (!$this->loaded AND (!isset($_GET['method']) OR !(in_array($_GET['method'],  $this->showMethods))) )
        {
            if (func_num_args() > 0)
            {
                $this->onReload( func_get_arg(0) );
            }
            else
            {
                $this->onReload();
            }
        }
        parent::show();
    }

    public static function manageRow($id)
    {
        $list = new self([]);

        $openTransaction = TTransaction::getDatabase() != self::$database ? true : false;

        if($openTransaction)
        {
            TTransaction::open(self::$database);    
        }

        $object = new Endereco($id);

        $row = $list->datagrid->addItem($object);
        $row->id = "row_{$object->idendereco}";

        if($openTransaction)
        {
            TTransaction::close();    
        }

        TDataGrid::replaceRowById(__CLASS__.'_datagrid', $row->id, $row);
    }

}

