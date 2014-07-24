<?php

class Controller extends System {

    private $viewTitle;
    private $currentView;
    private $template = "layout";
    protected $data = array();

    protected function setViewTitle($viewTitle = NULL) {
        if ($viewTitle)
            $this->viewTitle = $viewTitle;
        else
            $this->viewTitle = APP_NAME;

        return $this;
    }

    public function getViewTitle() {
        return $this->viewTitle;
    }

    protected function setCurrentView($currentView) {
        $this->currentView = $currentView;
        return $this;
    }

    public function getCurrentView() {
        return $this->currentView;
    }

    protected function setTemplate($template) {
        $this->template = $template;
        return $this;
    }

    public function getTemplate() {
        return $this->template;
    }

    public function setData(array $data = NULL) {
        if ($data)
            $this->data = array_merge($this->data, $data);
    }

    //"Construtor do Controller", executa init antes de qualquer action
    public function init() {
        
    }

    //Executa após a action chamada
    public function finish() {
        
    }

    public function index_action() {
        
    }

    protected function renderLayout($data = NULL) {
        $this->setData($data);

        require_once( TEMPLATES . $this->template . '.phtml' );
    }

    protected function view($view = NULL) {
        $view = $view ? $view : $this->getCurrentView();

        if (is_array($this->data) && count($this->data) > 0) {
            extract($this->data, EXTR_PREFIX_ALL, 'view');
        }
        require_once( VIEWS . $this->_controller . '/' . $view . '.phtml' );
    }

    protected function template($templateView = NULL) {
        if ($templateView)
            require_once( TEMPLATES . $templateView . '.phtml' );
    }

}
?>

