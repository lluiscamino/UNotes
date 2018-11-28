<?php
namespace src;

class Language {
    
    const GET_NAME = 'lang';
    const COOKIE_NAME = 'lang';
    const DEFAULT_LANGUAGE = 'en';
    const LANGUAGE_CODES = array('en', 'es');
    public $code;

    public function __construct(string $code) {
       if (self::langCodeIsValid($code)) {
           $this->code = $code;
       } else {
           throw new \Exception('Language code ' . $code . ' is not valid');
       }
    }
    
    private static function langCodeIsValid(string $code): bool {
        return in_array($code, self::LANGUAGE_CODES);
    }
    
    public function setCookie(): void {
        if ((!isset($_COOKIE[self::COOKIE_NAME])) || ($_COOKIE[self::COOKIE_NAME] !== $this->code)) {
            if (isset($_COOKIE[self::COOKIE_NAME])) {
                setcookie(self::COOKIE_NAME, $this->code, -1, '/');
            }
            // will expire in 2 years
            setcookie(self::COOKIE_NAME, $this->code, time()+63072000, '/');
        }
    }
    
    public static function getLanguage(): string {
        if (isset($_GET[self::GET_NAME]) && self::langCodeIsValid($_GET[self::GET_NAME])) {
            return $_GET[self::GET_NAME];
        }
        if (isset($_COOKIE[self::COOKIE_NAME]) && self::langCodeIsValid($_COOKIE[self::COOKIE_NAME])) {
            return $_COOKIE[self::COOKIE_NAME];
        }
        return self::DEFAULT_LANGUAGE;
    }
}

