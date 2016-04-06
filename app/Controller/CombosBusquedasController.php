<?php

App::uses('AppController', 'Controller');


class CombosBusquedasController extends AppController {

    public function cargarsubforos($id_busca = null) {
    	//$this->autoRender = false;
        $this->layout = 'ajax';
        $this->loadModel('ForoSubforo');
        $descripciones = $this->ForoSubforo->find('list', array(
        	'conditions' => array(
        		'ForoSubforo.id_foro_categoria' => $id_busca),
        	'fields' => array('id','subforo'),
        	'order' => 'ForoSubforo.created ASC'
        ));
        array_unshift($descripciones, "Seleccione...");
        $this->set('subforos', $descripciones);
    }

    public function cargartemas($id_busca = null) {
    	//$this->autoRender = false;
        $this->loadModel('ForoTema');
        $this->layout = 'ajax';
        $descripciones = $this->ForoTema->find('list', array(
        	'conditions' => array(
        		'ForoTema.id_subforo' => $id_busca),
        	'fields' => array('id','titulo'), 
        	'order' => 'ForoTema.created ASC'
        ));
        array_unshift($descripciones, "Seleccione...");
        $this->set('temas', $descripciones);
    }

    public function cargarcomentarios($id_busca = null) {
    	//$this->autoRender = false;
        $this->loadModel('ComentarioForo');
        $this->layout = 'ajax';
        $descripciones = $this->ComentarioForo->find('list', array(
        	'conditions' => array(
        		'ComentarioForo.id_tema' => $id_busca),
        	'fields' => array('id','comentario'), 
        	'order' => 'ComentarioForo.created ASC'
        ));
        //array_unshift($descripciones, "Seleccione...");
        pr($descripciones);
        $this->set('comentarios', $descripciones);
    }

}
