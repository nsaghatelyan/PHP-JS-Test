<?php

class Article_model extends CI_Model
{

    function getArticles()
    {
        $this->db->order_by('id_article desc');
        $query = $this->db->get('article');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $value) {
                $data[] = $value;
            }
            return $data;
        }
    }


    function getAuthor($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row();
    }

    function create($data)
    {
        $this->db->insert('article', $data);
        return;
    }

    function delete($id)
    {
        $this->db->where('id_article', $id);
        $this->db->delete('article');
    }

    function getArticlesById($id)
    {
        $this->db->where('id_article', $id);
        $query = $this->db->get('article');
        if (!$query->row()) {
            show_404();
        }
        return $query->row();
    }

    function update($id, $data)
    {
        $this->db->where('id_article', $id);
        $this->db->update('article', $data);
    }
}

?>