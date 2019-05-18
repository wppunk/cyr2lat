<?php
/**
 * Test_Cyr_To_Lat_Conversion_Tables class file
 *
 * @package cyr-to-lat
 */

use PHPUnit\Framework\TestCase;

/**
 * Class Test_Cyr_To_Lat_Conversion_Tables
 *
 * @group tables
 */
class Test_Cyr_To_Lat_Conversion_Tables extends TestCase {

	/**
	 * Test get()
	 */
	public function test_get() {
		$iso9 = [
			'А' => 'A',
			'Б' => 'B',
			'В' => 'V',
			'Г' => 'G',
			'Д' => 'D',
			'Е' => 'E',
			'Ё' => 'YO',
			'Ж' => 'ZH',
			'З' => 'Z',
			'И' => 'I',
			'Й' => 'J',
			'І' => 'I',
			'К' => 'K',
			'Л' => 'L',
			'М' => 'M',
			'Н' => 'N',
			'О' => 'O',
			'П' => 'P',
			'Р' => 'R',
			'С' => 'S',
			'Т' => 'T',
			'У' => 'U',
			'Ф' => 'F',
			'Х' => 'H',
			'Ц' => 'CZ',
			'Ч' => 'CH',
			'Ш' => 'SH',
			'Щ' => 'SHH',
			'Ъ' => '',
			'Ы' => 'Y',
			'Ь' => '',
			'Э' => 'E',
			'Ю' => 'YU',
			'Я' => 'YA',
			'Ѣ' => 'YE',
			'Ѳ' => 'FH',
			'Ѵ' => 'YH',
			'а' => 'a',
			'б' => 'b',
			'в' => 'v',
			'г' => 'g',
			'д' => 'd',
			'е' => 'e',
			'ё' => 'yo',
			'ж' => 'zh',
			'з' => 'z',
			'и' => 'i',
			'й' => 'j',
			'і' => 'i',
			'к' => 'k',
			'л' => 'l',
			'м' => 'm',
			'н' => 'n',
			'о' => 'o',
			'п' => 'p',
			'р' => 'r',
			'с' => 's',
			'т' => 't',
			'у' => 'u',
			'ф' => 'f',
			'х' => 'h',
			'ц' => 'cz',
			'ч' => 'ch',
			'ш' => 'sh',
			'щ' => 'shh',
			'ъ' => '',
			'ы' => 'y',
			'ь' => '',
			'э' => 'e',
			'ю' => 'yu',
			'я' => 'ya',
			'ѣ' => 'ye',
			'ѳ' => 'fh',
			'ѵ' => 'yh',
		];

		$bel = [
			'А' => 'A',
			'Б' => 'B',
			'В' => 'V',
			'Г' => 'G',
			'Д' => 'D',
			'Е' => 'E',
			'Ё' => 'YO',
			'Ж' => 'ZH',
			'З' => 'Z',
			'Й' => 'J',
			'І' => 'I',
			'К' => 'K',
			'Л' => 'L',
			'М' => 'M',
			'Н' => 'N',
			'О' => 'O',
			'П' => 'P',
			'Р' => 'R',
			'С' => 'S',
			'Т' => 'T',
			'У' => 'U',
			'Ф' => 'F',
			'Х' => 'H',
			'Ц' => 'CZ',
			'Ч' => 'CH',
			'Ш' => 'SH',
			'Ы' => 'Y',
			'Ь' => '',
			'Э' => 'E',
			'Ю' => 'YU',
			'Я' => 'YA',
			'а' => 'a',
			'б' => 'b',
			'в' => 'v',
			'г' => 'g',
			'д' => 'd',
			'е' => 'e',
			'ё' => 'yo',
			'ж' => 'zh',
			'з' => 'z',
			'й' => 'j',
			'і' => 'i',
			'к' => 'k',
			'л' => 'l',
			'м' => 'm',
			'н' => 'n',
			'о' => 'o',
			'п' => 'p',
			'р' => 'r',
			'с' => 's',
			'т' => 't',
			'у' => 'u',
			'ф' => 'f',
			'х' => 'h',
			'ц' => 'cz',
			'ч' => 'ch',
			'ш' => 'sh',
			'ы' => 'y',
			'ь' => '',
			'э' => 'e',
			'ю' => 'yu',
			'я' => 'ya',
			'Ў' => 'U',
			'ў' => 'u',
		];

		$uk = [
			'А' => 'A',
			'Б' => 'B',
			'В' => 'V',
			'Г' => 'G',
			'Д' => 'D',
			'Е' => 'E',
			'Ж' => 'ZH',
			'З' => 'Z',
			'И' => 'Y',
			'Й' => 'J',
			'І' => 'I',
			'К' => 'K',
			'Л' => 'L',
			'М' => 'M',
			'Н' => 'N',
			'О' => 'O',
			'П' => 'P',
			'Р' => 'R',
			'С' => 'S',
			'Т' => 'T',
			'У' => 'U',
			'Ф' => 'F',
			'Х' => 'H',
			'Ц' => 'CZ',
			'Ч' => 'CH',
			'Ш' => 'SH',
			'Щ' => 'SHH',
			'Ь' => '',
			'Ю' => 'YU',
			'Я' => 'YA',
			'а' => 'a',
			'б' => 'b',
			'в' => 'v',
			'г' => 'g',
			'д' => 'd',
			'е' => 'e',
			'ж' => 'zh',
			'з' => 'z',
			'и' => 'y',
			'й' => 'j',
			'і' => 'i',
			'к' => 'k',
			'л' => 'l',
			'м' => 'm',
			'н' => 'n',
			'о' => 'o',
			'п' => 'p',
			'р' => 'r',
			'с' => 's',
			'т' => 't',
			'у' => 'u',
			'ф' => 'f',
			'х' => 'h',
			'ц' => 'cz',
			'ч' => 'ch',
			'ш' => 'sh',
			'щ' => 'shh',
			'ь' => '',
			'ю' => 'yu',
			'я' => 'ya',
			'Ґ' => 'G',
			'ґ' => 'g',
			'Є' => 'YE',
			'є' => 'ye',
			'Ї' => 'YI',
			'ї' => 'yi',
		];

		$bg_BG = [
			'А' => 'A',
			'Б' => 'B',
			'В' => 'V',
			'Г' => 'G',
			'Д' => 'D',
			'Е' => 'E',
			'Ж' => 'ZH',
			'З' => 'Z',
			'И' => 'I',
			'Й' => 'J',
			'І' => 'I',
			'К' => 'K',
			'Л' => 'L',
			'М' => 'M',
			'Н' => 'N',
			'О' => 'O',
			'П' => 'P',
			'Р' => 'R',
			'С' => 'S',
			'Т' => 'T',
			'У' => 'U',
			'Ф' => 'F',
			'Х' => 'H',
			'Ц' => 'CZ',
			'Ч' => 'CH',
			'Ш' => 'SH',
			'Щ' => 'STH',
			'Ъ' => 'A',
			'Ь' => '',
			'Ю' => 'YU',
			'Я' => 'YA',
			'Ѣ' => 'YE',
			'Ѳ' => 'FH',
			'Ѵ' => 'YH',
			'а' => 'a',
			'б' => 'b',
			'в' => 'v',
			'г' => 'g',
			'д' => 'd',
			'е' => 'e',
			'ж' => 'zh',
			'з' => 'z',
			'и' => 'i',
			'й' => 'j',
			'і' => 'i',
			'к' => 'k',
			'л' => 'l',
			'м' => 'm',
			'н' => 'n',
			'о' => 'o',
			'п' => 'p',
			'р' => 'r',
			'с' => 's',
			'т' => 't',
			'у' => 'u',
			'ф' => 'f',
			'х' => 'h',
			'ц' => 'cz',
			'ч' => 'ch',
			'ш' => 'sh',
			'щ' => 'sth',
			'ъ' => 'a',
			'ь' => '',
			'ю' => 'yu',
			'я' => 'ya',
			'ѣ' => 'ye',
			'ѳ' => 'fh',
			'ѵ' => 'yh',
			'Ѫ' => 'О',
			'ѫ' => 'о',
		];

		$mk_MK = [
			'А' => 'A',
			'Б' => 'B',
			'В' => 'V',
			'Г' => 'G',
			'Д' => 'D',
			'Е' => 'E',
			'Ж' => 'ZH',
			'З' => 'Z',
			'И' => 'I',
			'І' => 'I',
			'К' => 'K',
			'Л' => 'L',
			'М' => 'M',
			'Н' => 'N',
			'О' => 'O',
			'П' => 'P',
			'Р' => 'R',
			'С' => 'S',
			'Т' => 'T',
			'У' => 'U',
			'Ф' => 'F',
			'Х' => 'H',
			'Ц' => 'CZ',
			'Ч' => 'CH',
			'Ш' => 'SH',
			'а' => 'a',
			'б' => 'b',
			'в' => 'v',
			'г' => 'g',
			'д' => 'd',
			'е' => 'e',
			'ж' => 'zh',
			'з' => 'z',
			'и' => 'i',
			'і' => 'i',
			'к' => 'k',
			'л' => 'l',
			'м' => 'm',
			'н' => 'n',
			'о' => 'o',
			'п' => 'p',
			'р' => 'r',
			'с' => 's',
			'т' => 't',
			'у' => 'u',
			'ф' => 'f',
			'х' => 'h',
			'ц' => 'cz',
			'ч' => 'ch',
			'ш' => 'sh',
			'Ѓ' => 'G',
			'ѓ' => 'g',
			'Ѕ' => 'Z',
			'ѕ' => 'z',
			'Ј' => 'J',
			'ј' => 'j',
			'Ќ' => 'K',
			'ќ' => 'k',
			'Љ' => 'L',
			'љ' => 'l',
			'Њ' => 'N',
			'њ' => 'n',
			'Џ' => 'DH',
			'џ' => 'dh',
		];

		$ka_GE = [
			'А'   => 'A',
			'Б'   => 'B',
			'В'   => 'V',
			'Г'   => 'G',
			'Д'   => 'D',
			'Е'   => 'E',
			'Ё'   => 'YO',
			'Ж'   => 'ZH',
			'З'   => 'Z',
			'И'   => 'I',
			'Й'   => 'J',
			'І'   => 'I',
			'К'   => 'K',
			'Л'   => 'L',
			'М'   => 'M',
			'Н'   => 'N',
			'О'   => 'O',
			'П'   => 'P',
			'Р'   => 'R',
			'С'   => 'S',
			'Т'   => 'T',
			'У'   => 'U',
			'Ф'   => 'F',
			'Х'   => 'H',
			'Ц'   => 'CZ',
			'Ч'   => 'CH',
			'Ш'   => 'SH',
			'Щ'   => 'SHH',
			'Ъ'   => '',
			'Ы'   => 'Y',
			'Ь'   => '',
			'Э'   => 'E',
			'Ю'   => 'YU',
			'Я'   => 'YA',
			'Ѣ'   => 'YE',
			'Ѳ'   => 'FH',
			'Ѵ'   => 'YH',
			'а'   => 'a',
			'б'   => 'b',
			'в'   => 'v',
			'г'   => 'g',
			'д'   => 'd',
			'е'   => 'e',
			'ё'   => 'yo',
			'ж'   => 'zh',
			'з'   => 'z',
			'и'   => 'i',
			'й'   => 'j',
			'і'   => 'i',
			'к'   => 'k',
			'л'   => 'l',
			'м'   => 'm',
			'н'   => 'n',
			'о'   => 'o',
			'п'   => 'p',
			'р'   => 'r',
			'с'   => 's',
			'т'   => 't',
			'у'   => 'u',
			'ф'   => 'f',
			'х'   => 'h',
			'ц'   => 'cz',
			'ч'   => 'ch',
			'ш'   => 'sh',
			'щ'   => 'shh',
			'ъ'   => '',
			'ы'   => 'y',
			'ь'   => '',
			'э'   => 'e',
			'ю'   => 'yu',
			'я'   => 'ya',
			'ѣ'   => 'ye',
			'ѳ'   => 'fh',
			'ѵ'   => 'yh',
			'áƒ' => 'a',
			'áƒ‘' => 'b',
			'áƒ’' => 'g',
			'áƒ“' => 'd',
			'áƒ”' => 'e',
			'áƒ•' => 'v',
			'áƒ–' => 'z',
			'áƒ—' => 'th',
			'áƒ˜' => 'i',
			'áƒ™' => 'k',
			'áƒš' => 'l',
			'áƒ›' => 'm',
			'áƒœ' => 'n',
			'áƒ' => 'o',
			'áƒž' => 'p',
			'áƒŸ' => 'zh',
			'áƒ ' => 'r',
			'áƒ¡' => 's',
			'áƒ¢' => 't',
			'áƒ£' => 'u',
			'áƒ¤' => 'ph',
			'áƒ¥' => 'q',
			'áƒ¦' => 'gh',
			'áƒ§' => 'qh',
			'áƒ¨' => 'sh',
			'áƒ©' => 'ch',
			'áƒª' => 'ts',
			'áƒ«' => 'dz',
			'áƒ¬' => 'ts',
			'áƒ­' => 'tch',
			'áƒ®' => 'kh',
			'áƒ¯' => 'j',
			'áƒ°' => 'h',
		];

		$kk = [
			'А' => 'A',
			'Б' => 'B',
			'В' => 'V',
			'Г' => 'G',
			'Д' => 'D',
			'Е' => 'E',
			'Ж' => 'ZH',
			'З' => 'Z',
			'И' => 'I',
			'Й' => 'J',
			'І' => 'I',
			'К' => 'K',
			'Л' => 'L',
			'М' => 'M',
			'Н' => 'N',
			'О' => 'O',
			'П' => 'P',
			'Р' => 'R',
			'С' => 'S',
			'Т' => 'T',
			'У' => 'W',
			'Ф' => 'F',
			'Х' => 'H',
			'Ц' => 'C',
			'Ч' => 'CH',
			'Ш' => 'SH',
			'Ы' => 'Y',
			'Ѣ' => 'YE',
			'Ѳ' => 'FH',
			'Ѵ' => 'YH',
			'а' => 'a',
			'б' => 'b',
			'в' => 'v',
			'г' => 'g',
			'д' => 'd',
			'е' => 'e',
			'ж' => 'zh',
			'з' => 'z',
			'и' => 'i',
			'й' => 'j',
			'і' => 'i',
			'к' => 'k',
			'л' => 'l',
			'м' => 'm',
			'н' => 'n',
			'о' => 'o',
			'п' => 'p',
			'р' => 'r',
			'с' => 's',
			'т' => 't',
			'у' => 'w',
			'ф' => 'f',
			'х' => 'h',
			'ц' => 'c',
			'ч' => 'ch',
			'ш' => 'sh',
			'ы' => 'y',
			'ѣ' => 'ye',
			'ѳ' => 'fh',
			'ѵ' => 'yh',
			'Ә' => 'Ae',
			'ә' => 'ae',
			'Ғ' => 'Gh',
			'ғ' => 'gh',
			'Қ' => 'Q',
			'қ' => 'q',
			'Ң' => 'Ng',
			'ң' => 'ng',
			'Ө' => 'Oe',
			'ө' => 'oe',
			'Ұ' => 'U',
			'ұ' => 'u',
			'Ү' => 'Ue',
			'ү' => 'ue',
			'Һ' => 'H',
			'һ' => 'h',
			'Á' => 'A',
			'á' => 'a',
			'Ǵ' => 'G',
			'ǵ' => 'g',
			'I' => 'I',
			'ı' => 'i',
			'Ń' => 'N',
			'ń' => 'n',
			'Ó' => 'O',
			'ó' => 'o',
			'Ú' => 'O',
			'ú' => 'o',
			'Ý' => 'O',
			'ý' => 'o',
		];

		$he_IL = [
			'א' => '',
			'ב' => 'b',
			'ג' => 'g',
			'ד' => 'd',
			'ה' => 'h',
			'ו' => 'w',
			'ז' => 'z',
			'ח' => 'x',
			'ט' => 't',
			'י' => 'y',
			'ך' => '',
			'כ' => 'kh',
			'ל' => 'l',
			'ם' => '',
			'מ' => 'm',
			'ן' => '',
			'נ' => 'n',
			'ס' => 's',
			'ע' => '',
			'ף' => '',
			'פ' => 'ph',
			'ץ' => '',
			'צ' => 's',
			'ק' => 'k',
			'ר' => 'r',
			'ש' => 'sh',
			'ת' => 'th',
			'֐' => '',
			'֑' => '',
			'֒' => '',
			'֓' => '',
			'֔' => '',
			'֕' => '',
			'֖' => '',
			'֗' => '',
			'֘' => '',
			'֙' => '',
			'֚' => '',
			'֛' => '',
			'֜' => '',
			'֝' => '',
			'֞' => '',
			'֟' => '',
			'֠' => '',
			'֡' => '',
			'֢' => '',
			'֣' => '',
			'֤' => '',
			'֥' => '',
			'֦' => '',
			'֧' => '',
			'֨' => '',
			'֩' => '',
			'֪' => '',
			'֫' => '',
			'֬' => '',
			'֭' => '',
			'֮' => '',
			'֯' => '',
			'ְ' => '',
			'ֱ' => '',
			'ֲ' => '',
			'ֳ' => '',
			'ִ' => '',
			'ֵ' => '',
			'ֶ' => '',
			'ַ' => '',
			'ָ' => '',
			'ֹ' => '',
			'ֺ' => '',
			'ֻ' => '',
			'ּ' => '',
			'ֽ' => '',
			'־' => '',
			'ֿ' => '',
			'׀' => '',
			'ׁ' => '',
			'ׂ' => '',
			'׃' => '',
			'ׄ' => '',
			'ׅ' => '',
			'׆' => '',
			'ׇ' => '',
			'׈' => '',
			'׉' => '',
			'׊' => '',
			'׋' => '',
			'׌' => '',
			'׍' => '',
			'׎' => '',
			'׏' => '',
			'װ' => '',
			'ױ' => '',
			'ײ' => '',
			'׳' => '',
			'״' => '',
			'׵' => '',
			'יִ' => '',
			'ﬞ' => '',
			'ײַ' => '',
			'ﬠ' => '',
			'ﬡ' => '',
			'ﬢ' => '',
			'ﬣ' => '',
			'ﬤ' => '',
			'ﬥ' => '',
			'ﬦ' => '',
			'ﬧ' => '',
			'ﬨ' => '',
			'﬩' => '',
			'שׁ' => '',
			'שׂ' => '',
			'שּׁ' => '',
			'שּׂ' => '',
			'אַ' => '',
			'אָ' => '',
			'אּ' => '',
			'בּ' => '',
			'גּ' => '',
			'דּ' => '',
			'הּ' => '',
			'וּ' => '',
			'זּ' => '',
			'﬷' => '',
			'טּ' => '',
			'יּ' => '',
			'ךּ' => '',
			'כּ' => '',
			'לּ' => '',
			'﬽' => '',
			'מּ' => '',
			'﬿' => '',
			'נּ' => '',
			'סּ' => '',
			'﭂' => '',
			'ףּ' => '',
			'פּ' => '',
			'﭅' => '',
			'צּ' => '',
			'קּ' => '',
			'רּ' => '',
			'שּ' => '',
			'תּ' => '',
			'וֹ' => '',
			'בֿ' => '',
			'כֿ' => '',
			'פֿ' => '',
			'ﭏ' => '',
		];

		$this->assertSame( $iso9, \Cyr_To_Lat_Conversion_Tables::get() );
		$this->assertSame( $bel, \Cyr_To_Lat_Conversion_Tables::get( 'bel' ) );
		$this->assertSame( $uk, \Cyr_To_Lat_Conversion_Tables::get( 'uk' ) );
		$this->assertSame( $bg_BG, \Cyr_To_Lat_Conversion_Tables::get( 'bg_BG' ) );
		$this->assertSame( $mk_MK, \Cyr_To_Lat_Conversion_Tables::get( 'mk_MK' ) );
		$this->assertSame( $ka_GE, \Cyr_To_Lat_Conversion_Tables::get( 'ka_GE' ) );
		$this->assertSame( $kk, \Cyr_To_Lat_Conversion_Tables::get( 'kk' ) );
		$this->assertSame( $he_IL, \Cyr_To_Lat_Conversion_Tables::get( 'he_IL' ) );
	}

	/**
	 * Test mb_chr()
	 */
	public function test_mb_chr() {
		$this->assertSame( ' ', Cyr_To_Lat_Conversion_Tables::mb_chr( 0x0020 ) );
		$this->assertSame( 'א', Cyr_To_Lat_Conversion_Tables::mb_chr( 0x05D0 ) );
		$this->assertSame( 'ࠀ', Cyr_To_Lat_Conversion_Tables::mb_chr( 0x0800 ) );
		$this->assertSame( '𐂃', Cyr_To_Lat_Conversion_Tables::mb_chr( 0x10083 ) );
	}
}
