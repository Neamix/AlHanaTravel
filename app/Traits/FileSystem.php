<?php 

namespace  App\Traits;

use Exception;
use Illuminate\Support\Facades\File;
use ReflectionClass;

trait FileSystem {
    static $directory = '';

    protected static function getModelName($model) {
        $baseClass = class_basename($model);
        // get reflection class name
        $reflection = new ReflectionClass($model);
        return $reflection->getShortName();
    }

    protected static function createDirectory($model,$with_sub = true,$dimintion="") {
      
        self::$directory =  strtolower(self::getModelName($model));

        $dir = public_path() . "\\" .self::$directory;

        if(! self::isDirectoryExist($dir)) {
            File::makeDirectory(public_path() . "\\" .self::$directory);
        }

        if($with_sub) {
            $id  = $model->id;
            $dir =  public_path() . "\\" .self::$directory . "\\" . self::$directory . "_" . $id;
            // dd($dir);
            if(! self::isDirectoryExist($dir)) {
                File::makeDirectory($dir);
            }

            if(! empty($dimintion)) {
                $dir =  public_path() . "\\" .self::$directory . "\\" . self::$directory . "_" . $id . "\\". $dimintion;

                if(! self::isDirectoryExist($dir)) {
                    File::makeDirectory($dir);
                }
            }

        }
    }

    protected static function isDirectoryExist($dir) {
        if (File::exists($dir)) {
            return true;
        } else {
            return false;
        }
    }

    protected static function removeDirectory($dir) {
        if (self::isDirectoryExist($dir)) {
            File::deleteDirectory($dir);
        }
    }

    protected static function removeFile($dir) {
        if(self::isDirectoryExist($dir)) {
            unlink($dir);
        }
    }
}