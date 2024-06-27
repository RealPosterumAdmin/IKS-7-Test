<?php

class PostsClass
{
    public function __construct(DatabaseClass $db)
    {
        $this->db = $db;
    }
    public function CreatePost($userID,$title, $content, $parents = array())
    {
        try {
            $sql = "INSERT INTO posts (user_id, title, content) VALUES (?, ?, ?)";
            $id = $this->db->insert($sql, [$userID, $title, $content]);
            if ($parents[0] !=0 ){
                foreach ($parents as $parentId) {
                    $this->db->insert("INSERT INTO category_post (post_id, category_id) VALUES (?, ?)", [$id, $parentId]);
                }
            }
            return [$id, $title, $content];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return FALSE;
        }
    }

    public function get_all_posts($userID)
    {
        $sql = "SELECT 
            p.id as post_id, 
            p.title as post_name,
            p.created_at as created_at,
            GROUP_CONCAT(c.name) as categories 
        FROM 
            posts p
        LEFT JOIN 
            category_post cp ON p.id = cp.post_id
        LEFT JOIN 
            category c ON c.id = cp.category_id
        WHERE 
            p.id IN (SELECT id FROM posts WHERE user_id = ?)
        GROUP BY 
            p.id, p.title, p.created_at";
        return  $this->db->select($sql, [$userID]);
    }

    public function get_all_categories()
    {
        return  $this->db->select("SELECT * FROM category");
    }

    public function create_category($name, $parents = array())
    {
        try {
            $id = $this->db->insert("INSERT INTO category (name) VALUES (?)",[$name]);
            if ($parents[0] !=0 ){
                foreach ($parents as $parentId) {
                    $this->db->insert("INSERT INTO category_child (child_category, parent_category) VALUES (?, ?)", [$id, $parentId]);
                }
            }
            return [$id,$name];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return FALSE;
        }
    }

    public function view($id)
    {
        return  $this->db->select("SELECT * FROM posts WHERE id = ?", [$id]);
    }

}