<?php

namespace WordfenceLS;

abstract class Model_Asset
{
    public static function js($file, string $path = null): string
    {
        if ($path != null) {
            return "https://source.ahdark.com/wordpress/plugin/wordfence/" . WORDFENCE_VERSION . "/" . $path . self::_versionedFileName($file);
        }
        return "https://source.ahdark.com/wordpress/plugin/wordfence/" . WORDFENCE_VERSION  . '/js/' . self::_versionedFileName($file);
    }

    public static function css($file, string $path = null): string
    {
        if ($path != null) {
            return "https://source.ahdark.com/wordpress/plugin/wordfence/" . WORDFENCE_VERSION . "/" . $path . self::_versionedFileName($file);
        }
        return "https://source.ahdark.com/wordpress/plugin/wordfence/" . WORDFENCE_VERSION . '/css/' . self::_versionedFileName($file);
    }

    public static function img($file): string
    {
        return "https://source.ahdark.com/wordpress/plugin/wordfence/" . WORDFENCE_VERSION . '/img/' . $file;
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