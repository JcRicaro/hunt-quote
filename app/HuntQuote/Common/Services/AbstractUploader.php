<?php namespace HuntQuote\Common\Services;

class AbstractUploader {

	/**
	 * Directory which to save the files
	 * @var str
	 */
	protected $directory;

	/**
	 * Base directory where to save the uploaded files
	 * @var str
	 */
	protected $base = '/uploads/';

	/**
	 * Class constructor
	 *
	 */
	public function __construct()
	{
		
	}

	/**
	 * Uploads the given file 
	 * @return [type] [description]
	 */
	public function upload($file, $fileCallback = true)
	{
		$ext = $file->getClientOriginalExtension();
		$origin = $file->getClientOriginalName();

		$filename = !! $fileCallback
			? $this->getFilename($origin, $ext)
			: $origin;

		$directory = $this->getDirectory();

		$file->move($directory, $filename);

		return $filename;
	}

	/**
	 * Generates the directory with the class properties
	 * @return str
	 */
	protected function getDirectory()
	{
		return public_path() . $this->base . $this->directory;
	}

	/**
	 * Generates the filename
	 * @param  str $filename
	 * @return [type]       [description]
	 */
	protected function getFilename($filename, $extension)
	{
		// In this case, we simply return a random string
		// of 20 characters.
		$random = \str_random(20);
		return "{$random}.{$extension}";
	}

}