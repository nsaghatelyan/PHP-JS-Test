<?php

class Article extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->database();
        $this->load->model('Article_model');
        $this->load->library('session');

        if (!$_SESSION["user_id"]) {
            redirect('user/login');
        }
    }

    function index()
    {
        $data['articles'] = $this->Article_model->getArticles();
        $data['user_id'] = $_SESSION["user_id"];

//        \debug\debug::trace($data)

        foreach ($data['articles'] as $val) {
            $val->author = $this->Article_model->getAuthor($val->id_user);
        }

        $this->load->view('header');
        $this->load->view('list', $data);
        $this->load->view('footer');
    }

    function create()
    {
        $this->load->view('header');
        $this->load->view('create');
        $this->load->view('footer');
    }

    function createArticle()
    {
        if (!empty($this->input->post())) {
            $data['title'] = $this->input->post('title');
            $data['content'] = $this->input->post('content');
            $data['id_user'] = $_SESSION["user_id"];

            $this->Article_model->create($data);
        }
        $this->index();
    }

    function delete()
    {
        $id = $this->uri->segment(3);

        $article = $this->Article_model->getArticlesById($id);
        $author_id = $this->Article_model->getAuthor($article->id_user)->id;

        if ($author_id != $_SESSION['user_id']) {
            $this->load->view('header');
            $this->load->view('permission_denied');
            $this->load->view('footer');
            return;
        }
        $this->Article_model->delete($id);
        $this->index();
    }

    function edit()
    {
        $id = $this->uri->segment(3);

        $data['article'] = $this->Article_model->getArticlesById($id);
        $author_id = $this->Article_model->getAuthor($data["article"]->id_user)->id;
//        \debug\debug::trace($author_id);
        if ($author_id != $_SESSION['user_id']) {
            $this->load->view('header');
            $this->load->view('permission_denied');
            $this->load->view('footer');
            return;
        }
        $this->load->view('header');
        $this->load->view('edit', $data);
        $this->load->view('footer');
    }

    function update()
    {
        $id = $this->input->post('id');
        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content')
        );
        $this->Article_model->update($id, $data);
        $this->index();
    }
}

?>