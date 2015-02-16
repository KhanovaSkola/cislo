<?php

/** @testCase */

namespace KhanovaSkola\Tests;

use KhanovaSkola\Cislo;
use Tester\Assert;
use Tester\TestCase;


require_once __DIR__ . '/../bootstrap.php';


class CisloTest extends TestCase
{

	public function testTensToWord()
	{
		Assert::same('jedna', Cislo::tensToWord(1));
		Assert::same('dvanáct', Cislo::tensToWord(12));
		Assert::same('čtyřicet devět', Cislo::tensToWord(49));
	}

	public function testHundredsToWord()
	{
		Assert::same('sto', Cislo::hundredsToWord(1));
		Assert::same('devět set', Cislo::hundredsToWord(9));
	}

	public function testGroupToWords()
	{
		Assert::same('sto dvacet tři', Cislo::groupToWords(123));
	}

	public function testToWord()
	{
		Assert::same('nula', Cislo::toWord(0));
		Assert::same('milion', Cislo::toWord(1000000));
		Assert::same('dva miliony', Cislo::toWord(2000000));
		Assert::same('dva miliony devět', Cislo::toWord(2000009));
		Assert::same('devět milionů sto dvacet tři tisíc čtyři sta padesát šest', Cislo::toWord(9123456));
	}

}

$test = new CisloTest();
$test->run();
