<?php
namespace App\Repositories;

use App\Models\Posts;
use App\User;
use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PostRepository implements PostRepositoryInterface {

    public function all() {
        $allPostsSql = "SELECT * FROM posts";
        $selected = DB::select($allPostsSql);
        $postsArr = [];
        foreach ($selected as $p) {
            array_push($postsArr, (array) $p);
        }
        return $postsArr;
    }

    public function getByID($post_id) {
        return DB::table('posts')->where('id', '=', $post_id)->get();
    }

    public function delete($post_id) {
        DB::table('posts')->delete($post_id);
    }

    public function update($post_id, array $post_data) {
        DB::table('posts')->where('id', $post_id)->update($post_data);
    }

    public function create(array $post_data) {
        DB::table('posts')->insert($post_data);
    }

}

?>