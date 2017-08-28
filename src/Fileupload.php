<?php

namespace Zoomyboy\Fileupload;

trait Fileupload {
	public function saveFile($filename, $disk = null) {
		$this->files()->save(new Image(['filename' => $filename, 'disk' => $disk]));
		echo $filename;
	}

	public function files() {
		return $this->morphMany(Image::class, 'model');
	}
}
