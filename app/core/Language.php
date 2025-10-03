<?php
/**
 * Multi-language support for The Way of Hope
 */

class Language {
    private static $currentLanguage;
    private static $translations = [];
    
    public static function init() {
        // Get language from session or default
        self::$currentLanguage = $_SESSION['language'] ?? DEFAULT_LANGUAGE;
        
        // Load translations
        self::loadTranslations();
    }
    
    private static function loadTranslations() {
        $langFile = __DIR__ . "/../../languages/" . self::$currentLanguage . ".php";
        if (file_exists($langFile)) {
            self::$translations = include $langFile;
        }
    }
    
    public static function setLanguage($lang) {
        if (in_array($lang, SUPPORTED_LANGUAGES)) {
            $_SESSION['language'] = $lang;
            self::$currentLanguage = $lang;
            self::loadTranslations();
        }
    }
    
    public static function get($key, $default = '') {
        return self::$translations[$key] ?? $default;
    }
    
    public static function getCurrentLanguage() {
        return self::$currentLanguage;
    }
    
    public static function getSupportedLanguages() {
        return SUPPORTED_LANGUAGES;
    }
}
