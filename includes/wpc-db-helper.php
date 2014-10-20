<?php

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

class WPC_DB_Helper {

    private $db;
    private $dbprefix;
    private $users_voted;
    private $phrases;

    function __construct() {
        global $wpdb;
        $this->db = $wpdb;
        $this->dbprefix = $wpdb->prefix;
        $this->users_voted = $this->dbprefix . 'wpc_users_voted';
        $this->phrases = $this->dbprefix . 'wpc_phrases';
    }

    /**
     * create table in db on activation if not exists
     */
    public function create_tables() {
        if ($this->db->get_var("SHOW TABLES LIKE '$this->users_voted'") != $this->users_voted) {
            $sql = "CREATE TABLE `" . $this->users_voted . "`(`id` INT(11) NOT NULL AUTO_INCREMENT,`user_id` INT(11) NOT NULL, `comment_id` INT(11) NOT NULL, `vote_type` INT(11) DEFAULT NULL, PRIMARY KEY (`id`), KEY `user_id` (`user_id`), KEY `comment_id` (`comment_id`),  KEY `vote_type` (`vote_type`));";
            dbDelta($sql);
        }
        if ($this->db->get_var("SHOW TABLES LIKE '$this->phrases'") != $this->phrases) {
            $sql = "CREATE TABLE `" . $this->phrases . "`(`id` INT(11) NOT NULL AUTO_INCREMENT, `phrase_key` VARCHAR(255) NOT NULL, `phrase_value` VARCHAR(255) NOT NULL, PRIMARY KEY (`id`), KEY `phrase_key` (`phrase_key`) );";
            dbDelta($sql);
        }
    }

    /**
     * updates the comments to set comment type review if comment id is exists in comment meta table
     */
    public function update_comments_types() {
        $select_query = "SELECT `comment_id` FROM `" . $this->dbprefix . "commentmeta` WHERE `meta_key` LIKE 'rating';";
        $comments_ids = $this->db->get_results($select_query, ARRAY_A);

        if ($comments_ids) {
            $comment_ids_arr = array();
            foreach ($comments_ids as $comment_id) {
                $comment_ids_arr[] = $comment_id['comment_id'];
            }
            $comment_ids = implode(',', $comment_ids_arr);
            $update_query = "UPDATE `" . $this->dbprefix . "comments` SET `comment_type` = 'woodiscuz_review' WHERE `comment_ID` IN($comment_ids) AND `comment_type` LIKE '';";
            $this->db->query($update_query);
        }
    }

    /**
     * add vote type
     */
    public function add_vote_type($user_id, $comment_id, $vote_type) {
        $sql = $this->db->prepare("INSERT INTO `" . $this->users_voted . "`(`user_id`, `comment_id`, `vote_type`)VALUES(%d,%d,%d);", $user_id, $comment_id, $vote_type);
        return $this->db->query($sql);
    }

    /**
     * update vote type
     */
    public function update_vote_type($user_id, $comment_id, $vote_type) {
        $sql = $this->db->prepare("UPDATE `" . $this->users_voted . "` SET `vote_type` = %d WHERE `user_id` = %d AND `comment_id` = %d", $vote_type, $user_id, $comment_id);
        return $this->db->query($sql);
    }

    /**
     * returns reviews count
     */
    public function get_reviews_count($comment_type, $post_id) {
        $select_query = $this->db->prepare("SELECT count(*) FROM `" . $this->dbprefix . "comments` WHERE `comment_type` LIKE %s AND `comment_post_ID` = %d;", $comment_type, $post_id);
        $r_count = $this->db->get_var($select_query);
        return $r_count;
    }

    /**
     * check if the user is already voted on comment or not by user id and comment id
     */
    public function is_user_voted($user_id, $comment_id) {
        $sql = $this->db->prepare("SELECT `vote_type` FROM `" . $this->users_voted . "` WHERE `user_id` = %d AND `comment_id` = %d;", $user_id, $comment_id);
        return $this->db->get_var($sql);
    }

    /**
     * update phrases 
     */
    public function update_phrases($phrases) {
        if ($phrases) {
            foreach ($phrases as $phrase_key => $phrase_value) {
                if ($this->is_phrase_exists($phrase_key)) {
                    $sql = $this->db->prepare("UPDATE `" . $this->phrases . "` SET `phrase_value` = %s WHERE `phrase_key` = %s;", $phrase_value, $phrase_key);
                } else {
                    $sql = $this->db->prepare("INSERT INTO `" . $this->phrases . "`(`phrase_key`, `phrase_value`)VALUES(%s, %s);", $phrase_key, $phrase_value);
                }
                $this->db->query($sql);
            }
        }
    }

    public function is_phrase_exists($phrase_key) {
        $sql = $this->db->prepare("SELECT `phrase_value` FROM `" . $this->phrases . "` WHERE `phrase_key` LIKE %s", $phrase_key);
        return $this->db->get_var($sql);
    }

    /**
     * get phrases from db
     */
    public function get_phrases() {
        $sql = "SELECT `phrase_key`, `phrase_value` FROM `" . $this->phrases . "`;";
        $phrases = $this->db->get_results($sql, ARRAY_A);
        $tmp_phrases = array();
        foreach ($phrases as $phrase) {

            $tmp_phrases[$phrase['phrase_key']] = stripslashes($phrase['phrase_value']);
        }
        return $tmp_phrases;
    }

    /**
     * get product comments which types is null
     */
    public function get_empty_comment_types() {
        $result = $this->db->get_results("SELECT `comm`.`comment_ID` as `comment_id` FROM `" . $this->db->prefix . "comments` AS `comm`, `" . $this->db->prefix . "commentmeta` AS `meta` WHERE `comm`.`comment_ID` = `meta`.`comment_id` AND `comm`.`comment_type` LIKE '' AND `meta`.`meta_key` LIKE 'rating';", ARRAY_A);        
        return $result;
    }

}

?>