<?php
	class Main extends CI_Model
	{
		public $user;
		
		function __construct()
		{
			parent::__construct();
		}
		
		public function get_friends($friend_info)
		{
			// $select_user = "SELECT * FROM users WHERE email = ? AND password = ?";
			// $values = array($user_info['email'], $user_info['password']);
			// return $this->db->query($select_user, $values)->row_array();

			return $this->db->query("SELECT * FROM users WHERE name = '{$user_info[name]}'")->row_array();
		}
		
		public function addFriend ($friends){
			$add_query = "INSERT INTO friends (name, email, created_at)
								VALUES (?, ?, NOW())";
			$values = (array($user_info['first_name'], $user_info['last_name'], $user_info['email'], $user_info['password']));
			$this->db->query($insert_query, $values);
			return $this->db->insert_id();

		}
		
		public function deleteFriend ($friends){
			$add_query = "DELETE FROM friends (name, email, created_at)
								VALUES (?, ?, NOW())";
			$values = (array($user_info['first_name'], $user_info['last_name'], $user_info['email'], $user_info['password']));
			$this->db->query($insert_query, $values);
			return $this->db->insert_id();
		}

	}