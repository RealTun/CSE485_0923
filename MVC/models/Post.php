<?php
class Post{
    private ?int $postID;
    private string $title;
    private string $nameSong;
    private int $categoryID;
    private string $summary;
    private string $content;
    private int $authorID;
    private ?string $time;
    private string $postImage;
    
    public function __construct($postID, $title, $song, $categoryID, $summary, $content, $authorID, $time, $postImage)
    {
        $this->postID = $postID;
        $this->title = $title;
        $this->nameSong = $song;
        $this->categoryID = $categoryID;
        $this->summary = $summary;
        $this->content = $content;
        $this->authorID = $authorID;
        $this->time = $time;
        $this->postImage = $postImage;
    }

	/**
	 * @return int
	 */
	public function getPostID(): int {
		return $this->postID;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string {
		return $this->title;
	}

	/**
	 * @return string
	 */
	public function getNameSong(): string {
		return $this->nameSong;
	}

	/**
	 * @return int
	 */
	public function getCategoryID(): int {
		return $this->categoryID;
	}

	/**
	 * @return string
	 */
	public function getSummary(): string {
		return $this->summary;
	}

	/**
	 * @return string
	 */
	public function getContent(): string {
		return $this->content;
	}

	/**
	 * @return int
	 */
	public function getAuthorID(): int {
		return $this->authorID;
	}

	/**
	 * @return string
	 */
	public function getTime(): string {
		return $this->time;
	}

	/**
	 * @return string
	 */
	public function getPostImage(): string {
		return $this->postImage;
	}
}
?>