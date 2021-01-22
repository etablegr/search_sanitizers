<?php

namespace Etable;

class SearchSanitizers
{
    /**
     * @param mixed $string
     *
     * @return string
     */
    public static function filterString($string): string
    {
        $string = is_scalar($string) ? (string)$string : '';

        return trim($string);
    }

    /**
     * @param mixed $string
     *
     * @return string
     */
    public static function removeExcessWhitespace($string): string
    {
        $string = self::filterString($string);
        $result = (string)preg_replace('/\s+/', ' ', $string);

        return $result;
    }

    public static function unaccentGreekString($value): string
    {
        $value        = self::filterString($value);
        $replacements = [
            'Ἀ' => 'Α',
            'Ἁ' => 'Α',
            'Ἂ' => 'Α',
            'Ἃ' => 'Α',
            'Ἄ' => 'Α',
            'Ἅ' => 'Α',
            'Ἆ' => 'Α',
            'Ἇ' => 'Α',
            'ᾈ' => 'Α',
            'ᾉ' => 'Α',
            'ᾊ' => 'Α',
            'ᾋ' => 'Α',
            'ᾌ' => 'Α',
            'ᾍ' => 'Α',
            'ᾎ' => 'Α',
            'ᾏ' => 'Α',
            'Ᾰ' => 'Α',
            'Ᾱ' => 'Α',
            'Ὰ' => 'Α',
            'Ά' => 'Α',
            'ᾼ' => 'Α',
            'ἀ' => 'α',
            'ἁ' => 'α',
            'ἂ' => 'α',
            'ἃ' => 'α',
            'ἄ' => 'α',
            'ἅ' => 'α',
            'ἆ' => 'α',
            'ἇ' => 'α',
            'ᾀ' => 'α',
            'ᾁ' => 'α',
            'ᾂ' => 'α',
            'ᾃ' => 'α',
            'ᾄ' => 'α',
            'ᾅ' => 'α',
            'ᾆ' => 'α',
            'ᾇ' => 'α',
            'ᾰ' => 'α',
            'ᾱ' => 'α',
            'ᾲ' => 'α',
            'ᾳ' => 'α',
            'ᾴ' => 'α',
            'ᾶ' => 'α',
            'ᾷ' => 'α',
            'ὰ' => 'α',
            'ά' => 'α',
            'ἐ' => 'ε',
            'ἑ' => 'ε',
            'ἒ' => 'ε',
            'ἓ' => 'ε',
            'ἔ' => 'ε',
            'ἕ' => 'ε',
            'Ἐ' => 'Ε',
            'Ἑ' => 'Ε',
            'Ἓ' => 'Ε',
            'Ἔ' => 'Ε',
            'Ἕ' => 'Ε',
            'ὲ' => 'ε',
            'έ' => 'ε',
            'Ὲ' => 'Ε',
            'Έ' => 'Ε',
            'ἠ' => 'η',
            'ἡ' => 'η',
            'ἢ' => 'η',
            'ἣ' => 'η',
            'ἤ' => 'η',
            'ἥ' => 'η',
            'ἦ' => 'η',
            'ἧ' => 'η',
            'Ἠ' => 'Η',
            'Ἡ' => 'Η',
            'Ἢ' => 'Η',
            'Ἣ' => 'Η',
            'Ἤ' => 'Η',
            'Ἥ' => 'Η',
            'Ἦ' => 'Η',
            'Ἧ' => 'Η',
            'ὴ' => 'η',
            'ή' => 'η',
            'ᾐ' => 'η',
            'ᾑ' => 'η',
            'ᾒ' => 'η',
            'ᾓ' => 'η',
            'ᾔ' => 'η',
            'ᾕ' => 'η',
            'ᾖ' => 'η',
            'ᾗ' => 'η',
            'ᾘ' => 'Η',
            'ᾙ' => 'Η',
            'ᾚ' => 'Η',
            'ᾛ' => 'Η',
            'ᾜ' => 'Η',
            'ᾝ' => 'Η',
            'ᾞ' => 'Η',
            'ᾟ' => 'Η',
            'ῂ' => 'η',
            'ῃ' => 'η',
            'ῄ' => 'η',
            'ῆ' => 'η',
            'ῇ' => 'η',
            'Ὴ' => 'Η',
            'Ή' => 'Η',
            'ῌ' => 'Η',
            'ἰ' => 'ι',
            'ἱ' => 'ι',
            'ἲ' => 'ι',
            'ἳ' => 'ι',
            'ἴ' => 'ι',
            'ἵ' => 'ι',
            'ἶ' => 'ι',
            'ἷ' => 'ι',
            'Ἰ' => 'Ι',
            'Ἱ' => 'Ι',
            'Ἲ' => 'Ι',
            'Ἳ' => 'Ι',
            'Ἴ' => 'Ι',
            'Ἵ' => 'Ι',
            'Ἶ' => 'Ι',
            'Ἷ' => 'Ι',
            'ὶ' => 'ι',
            'ί' => 'ι',
            'ῐ' => 'ι',
            'ῑ' => 'ι',
            'ῒ' => 'ι',
            'ΐ' => 'ι',
            'ῖ' => 'ι',
            'ῗ' => 'ι',
            'ϊ' => 'ι',
            'Ῐ' => 'Ι',
            'Ῑ' => 'Ι',
            'Ὶ' => 'Ι',
            'Ί' => 'Ι',
            'Ϊ' => 'Ι',
            'ὀ' => 'ο',
            'ὁ' => 'ο',
            'ὂ' => 'ο',
            'ὃ' => 'ο',
            'ὄ' => 'ο',
            'ὅ' => 'ο',
            'ὸ' => 'ο',
            'ό' => 'ο',
            'Ὀ' => 'Ο',
            'Ὁ' => 'Ο',
            'Ὂ' => 'Ο',
            'Ὃ' => 'Ο',
            'Ὄ' => 'Ο',
            'Ὅ' => 'Ο',
            'Ό' => 'Ο',
            'ϋ' => 'υ',
            'ὐ' => 'υ',
            'ὑ' => 'υ',
            'ὒ' => 'υ',
            'ὓ' => 'υ',
            'ὔ' => 'υ',
            'ὕ' => 'υ',
            'ὖ' => 'υ',
            'ὗ' => 'υ',
            'ὺ' => 'υ',
            'ύ' => 'υ',
            'ῠ' => 'υ',
            'ῡ' => 'υ',
            'ῢ' => 'υ',
            'ΰ' => 'υ',
            'ῦ' => 'υ',
            'ῧ' => 'υ',
            'Ὑ' => 'Υ',
            'Ὓ' => 'Υ',
            'Ὕ' => 'Υ',
            'Ὗ' => 'Υ',
            'Ῠ' => 'Υ',
            'Ῡ' => 'Υ',
            'Ὺ' => 'Υ',
            'Ύ' => 'Υ',
            'Ϋ' => 'Υ',
            'ῤ' => 'ρ',
            'ῥ' => 'ρ',
            'Ῥ' => 'Ρ',
            'ὠ' => 'ω',
            'ὡ' => 'ω',
            'ὢ' => 'ω',
            'ὣ' => 'ω',
            'ὤ' => 'ω',
            'ὥ' => 'ω',
            'ὦ' => 'ω',
            'ὧ' => 'ω',
            'ὼ' => 'ω',
            'ώ' => 'ω',
            'ᾠ' => 'ω',
            'ᾡ' => 'ω',
            'ᾢ' => 'ω',
            'ᾣ' => 'ω',
            'ᾤ' => 'ω',
            'ᾥ' => 'ω',
            'ᾦ' => 'ω',
            'ᾧ' => 'ω',
            'ῲ' => 'ω',
            'ῳ' => 'ω',
            'ῴ' => 'ω',
            'ῶ' => 'ω',
            'ῷ' => 'ω',
            'Ὠ' => 'Ω',
            'Ὡ' => 'Ω',
            'Ὢ' => 'Ω',
            'Ὣ' => 'Ω',
            'Ὤ' => 'Ω',
            'Ὥ' => 'Ω',
            'Ὦ' => 'Ω',
            'Ὧ' => 'Ω',
            'ᾨ' => 'Ω',
            'ᾩ' => 'Ω',
            'ᾪ' => 'Ω',
            'ᾫ' => 'Ω',
            'ᾬ' => 'Ω',
            'ᾭ' => 'Ω',
            'ᾮ' => 'Ω',
            'ᾯ' => 'Ω',
            'Ὼ' => 'Ω',
            'Ώ' => 'Ω',
            'ῼ' => 'Ω',
            'ς' => 'σ',
        ];

        if (!empty($value)) {
            $value = str_replace(
                array_keys($replacements),
                array_values($replacements),
                $value
            );
        }

        return $value;
    }

    public static function sanitizeSearchTerm($value): string
    {
        $value = self::filterString($value);
        $value = mb_strtolower($value);
        $value = str_replace(['!', '#', '(', ')', '.', '-', '_', '+', '&', ',', "'", '`', '"',']','[','{','}'], '', $value);
        $value = self::unaccentGreekString($value);
        $value = self::removeExcessWhitespace($value);

        return $value;
    }

    /**
     * Romanize greek letters
     * @param string $value The value containing greek strings
     */
    public static function greekRomanize($value): string
    {
        $value        = self::filterString($value);
        $value        = mb_strtolower($value);

        $doubleCharReplacements = [
            'γκ' => 'g',
            'αυ' => 'af',
            'ευ' => 'ef',
            'αι' => 'e',
            'γγ' => 'g',
            'ει' => 'i',
            'οι' => 'i'
        ];

        $replacements = [
            "α" => "a",
            "β" => "b",
            "γ" => "g",
            "δ" => "d",
            "ε" => "e",
            "ζ" => "z",
            "η" => "i",
            "θ" => "th",
            "ι" => "i",
            "κ" => "k",
            "λ" => "l",
            "μ" => "m",
            "ν" => "n",
            "ξ" => "ks",
            "ο" => "o",
            "π" => "p",
            "ρ" => "r",
            "σ" => "s",
            "τ" => "t",
            "υ" => "i",
            "φ" => "f",
            "χ" => "x",
            "ψ" => "ps",
            "ω" => "o",
            'ά'  => 'a',
            'ώ'  => "o",
            'ς'  => "s",
            'ό'  => 'o'
        ];

        if (!empty($value)) {
            $value = str_replace(
                array_keys($doubleCharReplacements),
                array_values($doubleCharReplacements),
                $value
            );

            $value = str_replace(
                array_keys($replacements),
                array_values($replacements),
                $value
            );
        }

        return $value;
    }

    /**
     * Replaces some 2 characters sets into different ones.
     * @param string $value The value that contains the characters need to be replaced.
     */
    public static function replaceRomanDoubleChars($value): string
    {
        $doubleCharReplacements = [
            'gk' => 'g',
            'ai' => 'e',
            'gg' => 'g',
            'ei' => 'i',
            'oi' => 'i',
            'ph' => 'f'
        ];

        if (!empty($value)) {
            $value = str_replace(
                array_keys($doubleCharReplacements),
                array_values($doubleCharReplacements),
                $value
            );
        }

        return $value;
    } 


    /**
     * Turns greek letters into romanized ones.
     * @param string $value The value 
     */
    public static function sanitizeSearchTermRomanized($value): string
    {
        $term = self::sanitizeSearchTerm($value);
        $term = self::greekRomanize($term);
        $term = preg_replace("/([a-zA-Z])\\1+/","$1",$term);
        $term = self::replaceRomanDoubleChars($term);

        return $term;
    }
}


