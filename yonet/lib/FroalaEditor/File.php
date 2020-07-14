<?php

namespace FroalaEditor;

use FroalaEditor\Utils\DiskManagement;

class File
{
    public static $defaultUploadOptions = [
        'fieldname'  => 'file',
        'validation' => [
            'allowedExts'      => ['txt', 'pdf', 'doc'],
            'allowedMimeTypes' => ['text/plain', 'application/msword', 'application/x-pdf', 'application/pdf'],
        ],
    ];

    /**
     * File upload to disk.
     *
     * @param fileRoute string
     * @param options [optional]
     *   (
     *     fieldname => string
     *     validation => array OR function
     *   )
     *
     * @return {link: 'linkPath'} or error string
     */
    public static function upload($fileRoute, $options = null)
    {
        if (is_null($options)) {
            $options = self::$defaultUploadOptions;
        } else {
            $options = array_merge(self::$defaultUploadOptions, $options);
        }

        return DiskManagement::upload($fileRoute, $options);
    }

    /**
     * Delete file from disk.
     *
     * @param src string
     *
     * @return bool
     */
    public static function delete($src)
    {
        return DiskManagement::delete($src);
    }
}

class_alias('FroalaEditor\File', 'FroalaEditor_File');
