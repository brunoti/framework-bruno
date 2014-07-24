<?php

class Index extends appController {

    public function index_action(){
        $this->setViewTitle('Pagina Inicial');
        $this->setCurrentView('index');
        $this->renderLayout();
    }

}
