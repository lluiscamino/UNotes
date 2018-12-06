<?php
namespace src;

class Captcha {
    
    const SESSION_NAME = 'captcha';
    const CODE_LENGTH = 7;
    const CODE_PATTERN = 'QWETYUPDFGHJKXVBNM';
    const cURL = 'https://hsource.fr/font/wall/';
    const IMAGE_FORMAT = '.gif';
    private $code;

    public function __construct() {
        $this->code = $this->generateCode();
    }
    
    private function generateCode(): string {
        return substr(str_shuffle(self::CODE_PATTERN), 0, self::CODE_LENGTH);
    }
    
    public static function generateImage($code): array {
        $ch = curl_init(self::cURL . $code . self::IMAGE_FORMAT);
        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => false,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.75 Safari/537.36',
            CURLOPT_AUTOREFERER    => true,
            CURLOPT_SSL_VERIFYPEER => false
        ));
        return array('content' => curl_exec($ch), 'type' => curl_getinfo($ch, CURLINFO_CONTENT_TYPE));
    }
    
    public function getCode(): string {
        return $this->code;
    }
    
    public function createSession(): void {
        $_SESSION[self::SESSION_NAME] = $this->code;
    }
    
    public static function destroySession(): void {
        unset($_SESSION[self::SESSION_NAME]);
    }
}

