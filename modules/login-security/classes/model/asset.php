<?php

namespace WordfenceLS;

abstract class Model_Asset
{
    public static function js($file, string $path = null): string
    {
        if ($path != null) {
            return WORDFENCE_CDN_URL . $path . self::_versionedFileName($file);
        }
        return WORDFENCE_CDN_URL . 'js/' . self::_versionedFileName($file);
    }

    public static function css($file, string $path = null): string
    {
        if ($path != null) {
            return WORDFENCE_CDN_URL . $path . self::_versionedFileName($file);
        }
        return WORDFENCE_CDN_URL . 'css/' . self::_versionedFileName($file);
    }

    public static function img($file): string
    {
        return WORDFENCE_CDN_URL . 'img/' . $file;
	}
	
	protected static function _pluginBaseURL(): string
    {
		return plugins_url('', WORDFENCE_LS_FCPATH) . '/';
	}
	
	protected static function _versionedFileName($subpath) {
		$version = WORDFENCE_LS_BUILD_NUMBER;
		if ($version != 'WORDFENCE_LS_BUILD_NUMBER' && preg_match('/^(.+?)(\.[^\.]+)$/', $subpath, $matches)) {
			$prefix = $matches[1];
			$suffix = $matches[2];
			return $prefix . '.' . $version . $suffix;
		}
		
		return $subpath;
	}
}