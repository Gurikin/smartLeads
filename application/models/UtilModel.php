<?php
class UtilModel {

    /**
     * @param $data
     * @param string $type
     * @return float|int|string
     */
    public static function clearData($data, $type="s")
    {
	switch($type) {
            case "s":
            $data = trim(strip_tags($data));
            break;
            case "i":
		$data = abs((int)$data);
            break;
	}
	return $data;
    }

    /**
     * @param $bytes
     * @param int $precision
     * @return string
     */
    public static function formatBytes($bytes, $precision = 2) {
        $units = array("b", "kb", "mb", "gb", "tb");

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . " " . $units[$pow];
    }

    /**
     * @return string
     */
    public static function memoryTest() {
        memory_get_peak_usage();
        return self::formatBytes(memory_get_peak_usage());
    }

    public static function printf_array($format, $arr)
    {
        return call_user_func_array('printf', array_merge((array)$format, $arr));
    }
}
?>