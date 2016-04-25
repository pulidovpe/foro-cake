<?php

App::uses('AppController', 'Controller');


class CombosBusquedasController extends AppController {

    public function cargarsubforos($id_busca = null) {
        $this->layout = 'ajax';
        $this->loadModel('ForoSubforo');
        $descripciones = $this->ForoSubforo->find('list', array(
        	'conditions' => array(
        		'ForoSubforo.id_foro_categoria' => $id_busca),
        	'fields' => array('id','subforo'),
        	'order' => 'ForoSubforo.created ASC'
        ));
        $this->set('subforos', $descripciones);
    }

    public function cargartemas($id_busca = null) {
        $this->loadModel('ForoTema');
        $this->layout = 'ajax';
        $descripciones = $this->ForoTema->find('list', array(
        	'conditions' => array(
        		'ForoTema.id_subforo' => $id_busca),
        	'fields' => array('id','titulo'), 
        	'order' => 'ForoTema.created ASC'
        ));
        $this->set('temas', $descripciones);
        $this->set('id_tema',$id_busca);
    }

    public function cargarcomentarios($id_busca = null) {
        $this->loadModel('ComentarioForo');
        $this->layout = 'ajax';
        $descripciones = $this->ComentarioForo->find('list', array(
        	'conditions' => array(
        		'ComentarioForo.id_tema' => $id_busca),
        	'fields' => array('id','comentario'), 
        	'order' => 'ComentarioForo.created ASC'
        ));
        $this->set('id_tema',$id_busca);
        //$this->set('comentarios', $descripciones);
    }

}
