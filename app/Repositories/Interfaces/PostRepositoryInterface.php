<?php

namespace App\Repositories\Interfaces;

use App\User;
use Illuminate\Support\Facades\DB;

interface PostRepositoryInterface
{
    /**
     * Get's all posts
     * @return array
     */
    public function all();

    /**
     * Get's a post by it's ID
     * @param int
     */
    public function getByID($post_id);

    /**
     * Deletes a post by given post ID
     * @param int
     */
    public function delete($post_id);

    /**
     * Updates a post.
     * 
     * @param int
     * @param array
     */
    public function update($post_id, array $post_data);

    /**
     * Creates new post
     * 
     * @param array
     */
    public function create(array $post_data);
}

?>