<?php

namespace Zoomyboy\Fileupload;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

    public $fillable = ['disk', 'filename'];

    public $appends = [
        'url'
    ];

    public function model() {
        return $this->morphTo();
    }

    public static function boot() {
        parent::boot();

        static::saving(function($model) {
            if (!$model->disk) {
                $model->disk = config('filesystems.default');
            }
        });
    }

    public function getUrlAttribute() {
        return url('/files/'.$this->filename);
    }
}
