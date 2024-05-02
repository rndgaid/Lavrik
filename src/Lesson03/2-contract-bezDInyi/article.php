<?php

class Article{
	protected int $id; 
	public string $title; 
	public string $content; 
	protected IStorage $storage;

	public function __construct(){
		$this->storage = new FileStorage('articles.json');
	}

	public function create(){
		$this->id = $this->storage->create();
	}

	public function load(int $id){
		$data = $this->storage->get($id);

		if($data === null){
			throw new Exception("article with id=$id not found");
		}

		$this->id = $id;
		$this->title = $data['title'];
		$this->content = $data['content'];
	}

	public function save(){
		$this->storage->update($this->id, [
			'title' => $this->title,
			'content' => $this->content
		]);
	}
}
