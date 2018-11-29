<?php
namespace src;

class Translations {
    
    const LANGUAGES_FOLDER = './languages/';
    const LANGUAGES_EXTENSION = '.ini';
    private $translationsArray;
    private $langFile;
    public $langCode;

    public function __construct(string $langCode) {
        $this->langFile = self::LANGUAGES_FOLDER . $langCode . self::LANGUAGES_EXTENSION;
        if (!$this->langAvailable()) {
            echo $this->langFile;
            throw new \Exception('Lang ' . $langCode . ' is not valid.');
        }
        $this->langCode = $langCode;
        $this->translationsArray = $this->getTranslationsArray();
    }
    
    private function langAvailable(): bool {
        return file_exists($this->langFile);
    }
    
    private function getTranslationsArray(): array {
        $ini = parse_ini_file($this->langFile);
        if ($ini !== false) {
            return $ini;
        }
        throw new \Exception('INI file error.');
    }
    
    public function get(string $translationCode): string {
        if (isset($this->translationsArray[$translationCode])) {
            return $this->translationsArray[$translationCode];
        }
        throw new \Exception('Translation not available.' . $translationCode);
    }
}

