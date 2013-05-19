<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Model;

class Color
{
    protected $color;
    protected $format;

    const COLOR_FORMAT_HEX = 'hex';
    const COLOR_FORMAT_DEC = 'dec';
    const COLOR_FORMAT_HSL = 'hsl';

    public static $webColorHexaMap = array(
        "AliceBlue" => "#F0F8FF",
        "AntiqueWhite" => "#FAEBD7",
        "Aqua" => "#00FFFF",
        "Aquamarine" => "#7FFFD4",
        "Azure" => "#F0FFFF",
        "Beige" => "#F5F5DC",
        "Bisque" => "#FFE4C4",
        "Black" => "#000000",
        "BlanchedAlmond" => "#FFEBCD",
        "Blue" => "#0000FF",
        "BlueViolet" => "#8A2BE2",
        "Brown" => "#A52A2A",
        "BurlyWood" => "#DEB887",
        "CadetBlue" => "#5F9EA0",
        "Chartreuse" => "#7FFF00",
        "Chocolate" => "#D2691E",
        "Coral" => "#FF7F50",
        "CornflowerBlue" => "#6495ED",
        "Cornsilk" => "#FFF8DC",
        "Crimson" => "#DC143C",
        "Cyan" => "#00FFFF",
        "DarkBlue" => "#00008B",
        "DarkCyan" => "#008B8B",
        "DarkGoldenRod" => "#B8860B",
        "DarkGray" => "#A9A9A9",
        "DarkGreen" => "#006400",
        "DarkKhaki" => "#BDB76B",
        "DarkMagenta" => "#8B008B",
        "DarkOliveGreen" => "#556B2F",
        "Darkorange" => "#FF8C00",
        "DarkOrchid" => "#9932CC",
        "DarkRed" => "#8B0000",
        "DarkSalmon" => "#E9967A",
        "DarkSeaGreen" => "#8FBC8F",
        "DarkSlateBlue" => "#483D8B",
        "DarkSlateGray" => "#2F4F4F",
        "DarkTurquoise" => "#00CED1",
        "DarkViolet" => "#9400D3",
        "DeepPink" => "#FF1493",
        "DeepSkyBlue" => "#00BFFF",
        "DimGray" => "#696969",
        "DimGrey" => "#696969",
        "DodgerBlue" => "#1E90FF",
        "FireBrick" => "#B22222",
        "FloralWhite" => "#FFFAF0",
        "ForestGreen" => "#228B22",
        "Fuchsia" => "#FF00FF",
        "Gainsboro" => "#DCDCDC",
        "GhostWhite" => "#F8F8FF",
        "Gold" => "#FFD700",
        "GoldenRod" => "#DAA520",
        "Gray" => "#808080",
        "Green" => "#008000",
        "GreenYellow" => "#ADFF2F",
        "HoneyDew" => "#F0FFF0",
        "HotPink" => "#FF69B4",
        "IndianRed " => "#CD5C5C",
        "Indigo " => "#4B0082",
        "Ivory" => "#FFFFF0",
        "Khaki" => "#F0E68C",
        "Lavender" => "#E6E6FA",
        "LavenderBlush" => "#FFF0F5",
        "LawnGreen" => "#7CFC00",
        "LemonChiffon" => "#FFFACD",
        "LightBlue" => "#ADD8E6",
        "LightCoral" => "#F08080",
        "LightCyan" => "#E0FFFF",
        "LightGoldenRodYellow" => "#FAFAD2",
        "LightGray" => "#D3D3D3",
        "LightGreen" => "#90EE90",
        "LightPink" => "#FFB6C1",
        "LightSalmon" => "#FFA07A",
        "LightSeaGreen" => "#20B2AA",
        "LightSkyBlue" => "#87CEFA",
        "LightSlateGray" => "#778899",
        "LightSteelBlue" => "#B0C4DE",
        "LightYellow" => "#FFFFE0",
        "Lime" => "#00FF00",
        "LimeGreen" => "#32CD32",
        "Linen" => "#FAF0E6",
        "Magenta" => "#FF00FF",
        "Maroon" => "#800000",
        "MediumAquaMarine" => "#66CDAA",
        "MediumBlue" => "#0000CD",
        "MediumOrchid" => "#BA55D3",
        "MediumPurple" => "#9370DB",
        "MediumSeaGreen" => "#3CB371",
        "MediumSlateBlue" => "#7B68EE",
        "MediumSpringGreen" => "#00FA9A",
        "MediumTurquoise" => "#48D1CC",
        "MediumVioletRed" => "#C71585",
        "MidnightBlue" => "#191970",
        "MintCream" => "#F5FFFA",
        "MistyRose" => "#FFE4E1",
        "Moccasin" => "#FFE4B5",
        "NavajoWhite" => "#FFDEAD",
        "Navy" => "#000080",
        "OldLace" => "#FDF5E6",
        "Olive" => "#808000",
        "OliveDrab" => "#6B8E23",
        "Orange" => "#FFA500",
        "OrangeRed" => "#FF4500",
        "Orchid" => "#DA70D6",
        "PaleGoldenRod" => "#EEE8AA",
        "PaleGreen" => "#98FB98",
        "PaleTurquoise" => "#AFEEEE",
        "PaleVioletRed" => "#DB7093",
        "PapayaWhip" => "#FFEFD5",
        "PeachPuff" => "#FFDAB9",
        "Peru" => "#CD853F",
        "Pink" => "#FFC0CB",
        "Plum" => "#DDA0DD",
        "PowderBlue" => "#B0E0E6",
        "Purple" => "#800080",
        "Red" => "#FF0000",
        "RosyBrown" => "#BC8F8F",
        "RoyalBlue" => "#4169E1",
        "SaddleBrown" => "#8B4513",
        "Salmon" => "#FA8072",
        "SandyBrown" => "#F4A460",
        "SeaGreen" => "#2E8B57",
        "SeaShell" => "#FFF5EE",
        "Sienna" => "#A0522D",
        "Silver" => "#C0C0C0",
        "SkyBlue" => "#87CEEB",
        "SlateBlue" => "#6A5ACD",
        "SlateGray" => "#708090",
        "Snow" => "#FFFAFA",
        "SpringGreen" => "#00FF7F",
        "SteelBlue" => "#4682B4",
        "Tan" => "#D2B48C",
        "Teal" => "#008080",
        "Thistle" => "#D8BFD8",
        "Tomato" => "#FF6347",
        "Turquoise" => "#40E0D0",
        "Violet" => "#EE82EE",
        "Wheat" => "#F5DEB3",
        "White" => "#FFFFFF",
        "WhiteSmoke" => "#F5F5F5",
        "Yellow" => "#FFFF00",
        "YellowGreen" => "#9ACD32"
    );

    /**
     * Construcutor
     *
     * @param string $color
     */
    public function __construct($color)
    {
        $this->setColor($color);
    }

    /**
     * Set Color
     *
     * @param string $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * Get Color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set Format
     *
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->format = $format;
    }

    /**
     * Get Format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    // ====================
    // = Public Interface =
    // ====================

    /**
     * Given a HEX string returns a HSL array equivalent.
     *
     * @param string $color
     * @return array HSL associative array
     */
    public static function hexToHsl( $color )
    {
        // Sanity check
        $color = self::_checkHex($color);

        // Convert HEX to DEC
        $R = hexdec($color[0].$color[1]);
        $G = hexdec($color[2].$color[3]);
        $B = hexdec($color[4].$color[5]);

        $HSL = array();

        $var_R = ($R / 255);
        $var_G = ($G / 255);
        $var_B = ($B / 255);

        $var_Min = min($var_R, $var_G, $var_B);
        $var_Max = max($var_R, $var_G, $var_B);
        $del_Max = $var_Max - $var_Min;

        $L = ($var_Max + $var_Min) / 2;

        if ($del_Max == 0) {
            $H = 0;
            $S = 0;
        } else {
            if ($L < 0.5) {
                $S = $del_Max / ( $var_Max + $var_Min );
            } else {
                $S = $del_Max / ( 2 - $var_Max - $var_Min );
            }

            $del_R = ( ( ( $var_Max - $var_R ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
            $del_G = ( ( ( $var_Max - $var_G ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
            $del_B = ( ( ( $var_Max - $var_B ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;

            if ($var_R == $var_Max) {
                $H = $del_B - $del_G;
            } else if ($var_G == $var_Max) {
              $H = ( 1 / 3 ) + $del_R - $del_B;
            } else if ($var_B == $var_Max) {
                $H = ( 2 / 3 ) + $del_G - $del_R;
            }

            if ($H<0) {
                $H++;
            }
            if ($H>1) {
                $H--;
            }
        }

        $HSL['H'] = ($H*360);
        $HSL['S'] = $S;
        $HSL['L'] = $L;

        return $HSL;
    }

    /**
     * Given a HSL associative array returns the equivalent HEX string
     *
     * @param array $hsl
     * @return string HEX string
     * @throws Exception "Bad HSL Array"
     */
    public static function hslToHex($hsl = array())
    {
         // Make sure it's HSL
        if(empty($hsl) || !isset($hsl["H"]) || !isset($hsl["S"]) || !isset($hsl["L"]) ) {
            throw new \Exception("Param was not an HSL array");
        }

        list($H, $S, $L) = array($hsl['H']/360, $hsl['S'], $hsl['L'] );

        if( $S == 0 ) {
            $r = $L * 255;
            $g = $L * 255;
            $b = $L * 255;
        } else {
            if($L<0.5) {
                $var_2 = $L * (1+$S);
            } else {
                $var_2 = ($L+$S) - ($S*$L);
            }

            $var_1 = 2 * $L - $var_2;
            $r = round(255 * self::_huetorgb($var_1, $var_2, $H + (1/3)));
            $g = round(255 * self::_huetorgb($var_1, $var_2, $H ));
            $b = round(255 * self::_huetorgb($var_1, $var_2, $H - (1/3)));
        }

        // Convert to hex
        $r = dechex($r);
        $g = dechex($g);
        $b = dechex($b);

        // Make sure we get 2 digits for decimals
        $r = (strlen("".$r)===1) ? "0".$r:$r;
        $g = (strlen("".$g)===1) ? "0".$g:$g;
        $b = (strlen("".$b)===1) ? "0".$b:$b;

        return $r.$g.$b;
    }


    /**
     * Given a HEX string returns a RGB array equivalent.
     *
     * @param string $color
     * @return array RGB associative array
     */
    public static function hexToRgb( $color )
    {
        // Sanity check
        $color = self::_checkHex($color);

        // Convert HEX to DEC
        $R = hexdec($color[0].$color[1]);
        $G = hexdec($color[2].$color[3]);
        $B = hexdec($color[4].$color[5]);

        $RGB['R'] = $R;
        $RGB['G'] = $G;
        $RGB['B'] = $B;

        return $RGB;
    }


    /**
     * Given an RGB associative array returns the equivalent HEX string
     *
     * @param array $rgb
     * @return string RGB string
     * @throws Exception "Bad RGB Array"
     */
    public static function rgbToHex($rgb = array())
    {
        // Make sure it's RGB
        if(empty($rgb) || !isset($rgb["R"]) || !isset($rgb["G"]) || !isset($rgb["B"]) ) {
            throw new \Exception("Param was not an RGB array");
        }

        // Convert RGB to HEX
        $hex[0] = dechex($rgb['R']);
        $hex[1] = dechex($rgb['G']);
        $hex[2] = dechex($rgb['B']);

        return implode('', $hex);
    }

    /**
     * Given a Hue, returns corresponding RGB value
     *
     * @param type $v1
     * @param type $v2
     * @param type $vH
     * @return int
     */
    private static function _huetorgb($v1, $v2, $vH)
    {
        if($vH < 0) {
            $vH += 1;
        }

        if($vH > 1) {
            $vH -= 1;
        }

        if((6*$vH) < 1) {
            return ($v1 + ($v2 - $v1) * 6 * $vH);
        }

        if((2*$vH) < 1) {
            return $v2;
        }

        if((3*$vH) < 2) {
            return ($v1 + ($v2-$v1) * ( (2/3)-$vH ) * 6);
        }

        return $v1;
    }

    /**
     * You need to check if you were given a good hex string
     *
     * @param string $hex
     * @return string Color
     * @throws Exception "Bad color format"
     */
    private static function _checkHex( $hex )
    {
        // Strip # sign is present
        $color = str_replace("#", "", $hex);

        // Make sure it's 6 digits
        if( strlen($color) == 3 ) {
            $color = $color[0].$color[0].$color[1].$color[1].$color[2].$color[2];
        } else if( strlen($color) != 6 ) {
            throw new \Exception("HEX color needs to be 6 or 3 digits long");
        }

        return $color;
    }
}
