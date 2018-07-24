<?php

namespace App\Model;


use Nette\Database\Context;

class PostFacade
{
	/** @var Context */
	private $db;


	public function __construct(Context $context)
	{
		$this->db = $context;
	}

	public function getCategories()
	{
		//return $this->db->query('SELECT * FROM category')->fetchPairs('id', 'name');
		return $this->db->table('category')->fetchPairs('id', 'name');
		//return $this->db->fetchPairs('SELECT id, name FROM category');
	}


	public function addPost($category_id, $title, $content, $draft, $author_id)
	{
		//$this->db->query('INSERT INTO `post`', [
		$this->db->table('post')->insert([
			'author_id' => $author_id,
			'category_id' => $category_id,
			'title' => $title,
			'content' => $content,
			'published_at' => new \DateTime(),
			'draft' => $draft,
		]);
	}


	public function getAllPosts()
	{
		return $this->db->table('post');
		//return $this->db->query('SELECT * FROM post');
	}

	/** @param int */
	public function deletePost( $id)
	{
		$this->db->table('post')
		->where('id', $id)
		->delete();
	}

}