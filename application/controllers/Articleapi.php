<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class ArticleAPI extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_get()
    {
        $id = $this->get('id');
        if ($id == '') {
            $article = $this->db->get('article')->result();
        } else {
            $this->db->where('id_article', $id);
            $article = $this->db->get('article')->result();
        }
        $this->response($article, 200);
    }


    function index_post()
    {
        $data = array(
            'title' => $this->post('title'),
            'content' => $this->post('content'));
        $insert = $this->db->insert('article', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put()
    {
        $id = $this->put('id');
        $data = array(
            'title' => $this->put('title'),
            'content' => $this->put('content'));
        $this->db->where('id_article', $id);
        $update = $this->db->update('article', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete()
    {
        $id = $this->delete('id_article');
        $this->db->where('id_article', $id);
        $delete = $this->db->delete('article');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}

?>