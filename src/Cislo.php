<?php

namespace KhanovaSkola;


class Cislo
{

	public static function toWord($number)
	{
		if ($number < 0 || $number > 1e9 - 1)
		{
			throw new OutOfRangeException("Number '$number' should be from [0, 999_999_999]");
		}

		if ($number === 0)
		{
			return 'nula';
		}

		$groups = [];
		while ($group = substr($number, -3))
		{
			$number = substr($number, 0, -3);
			$groups[] = $group;
		}
		$groups = array_reverse($groups, TRUE);
		
		$words = [];
		foreach ($groups as $rank => $group)
		{
			if ($group == 0)
			{
				continue;
			}

			if ($group != 1)
			{
				$words[] = static::groupToWords($group);
			}
			switch ($rank)
			{
				case 0:
					break;
				case 1:
					$words[] = static::plural($group, 'tisíc', 'tisíce', 'tisíc');
					break;
				case 2:
					$words[] = static::plural($group, 'milion', 'miliony', 'milionů');
					break;
				default:
					throw new OutOfRangeException();
			}
		}

		return implode(' ', $words);
	}

	public static function plural($count, $one, $few, $many)
	{
		switch ($count)
		{
			case 1: return $one;
			case 2:
			case 3:
			case 4: return $few;
		}
		return $many;
	}

	public static function groupToWords($group)
	{
		$ranks = array_reverse(array_reverse(str_split($group), FALSE), TRUE) + [2 => 0, 1 => 0, 0 => 0];
		$hundreds = $ranks[2];
		$tens = $ranks[1] . $ranks[0];

		$words = [];
		if ($hundreds != 0)
		{
			$words[] = static::hundredsToWord($hundreds);
		}
		if ($tens != 0)
		{
			$words[] = static::tensToWord($tens);
		}
		return implode(' ', $words);
	}

	public static function hundredsToWord($hundreds)
	{
		switch ($hundreds)
		{
			case 1: return 'sto';
			case 2: return 'dvě stě';
			case 3: return 'tři sta';
			case 4: return 'čtyři sta';
			case 5: return 'pět set';
			case 6: return 'šest set';
			case 7: return 'sedm set';
			case 8: return 'osm set';
			case 9: return 'devět set';
		}
	}

	public static function tensToWord($tens)
	{
		switch ($tens)
		{
			case 1: return 'jedna';
			case 2: return 'dva';
			case 3: return 'tři';
			case 4: return 'čtyři';
			case 5: return 'pět';
			case 6: return 'šest';
			case 7: return 'sedm';
			case 8: return 'osm';
			case 9: return 'devět';
			case 10: return 'deset';
			case 11: return 'jedenáct';
			case 12: return 'dvanáct';
			case 13: return 'třináct';
			case 14: return 'čtrnáct';
			case 15: return 'patnáct';
			case 16: return 'šestnáct';
			case 17: return 'sedmnáct';
			case 18: return 'osmnáct';
			case 19: return 'devatenáct';
		}

		$high = substr($tens, 0, 1);
		$low = substr($tens, 1, 1);

		$w = NULL;
		switch ($high)
		{
			case 2: $w = 'dvacet'; break;
			case 3: $w = 'třicet'; break;
			case 4: $w = 'čtyřicet'; break;
			case 5: $w = 'padesát'; break;
			case 6: $w = 'šedesát'; break;
			case 7: $w = 'sedmdesát'; break;
			case 8: $w = 'osmdesát'; break;
			case 9: $w = 'devadesát'; break;
		}

		return "$w " . static::tensToWord($low);
	}

}
