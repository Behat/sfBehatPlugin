<?php

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2011 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Adapter to PHPUnit with symfony's lime interface
 *
 * @see         http://www.symfony-project.org/gentle-introduction/1_4/en/15-Unit-and-Functional-Testing#chapter_15_sub_the_lime_testing_framework
 *
 * @package     sfBehatPlugin
 * @author      Konstantin Kudryashov <ever.zet@gmail.com>
 */
class sfLimePhpUnitAdapter extends lime_test
{
    public function ok($exp, $message = '')
    {
        assertTrue($exp);
    }

    public function is($exp1, $exp2, $message = '')
    {
        assertSame($exp2, $exp1);
    }

    public function isnt($exp1, $exp2, $message = '')
    {
        assertNotSame($exp2, $exp1);
    }

    public function like($exp, $regex, $message = '')
    {
        assertRegExp($regex, $exp);
    }

    public function unlike($exp, $regex, $message = '')
    {
        assertNotRegExp($regex, $exp);
    }

    public function cmp_ok($exp1, $op, $exp2, $message = '')
    {
        switch ($op)
        {
            case '==':
            case '===':
                assertEquals($exp2, $exp1);
                break;
            case '!=':
            case '!==':
                assertNotEquals($exp2, $exp1);
                break;
            case '>':
                assertGreaterThan($exp2, $exp1);
                break;
            case '<':
                assertLessThan($exp2, $exp1);
                break;
            case '>=':
                assertGreaterThanOrEqual($exp2, $exp1);
                break;
            case '<=':
                assertLessThanOrEqual($exp2, $exp1);
                break;
        }
    }

    public function can_ok($object, $methods, $message = '')
    {
        foreach (array($methods) as $method) {
            assertTrue(method_exists($object, $method));
        }
    }

    public function isa_ok($var, $class, $message = '')
    {
        $type = is_object($var) ? get_class($var) : gettype($var);
        assertTrue($type == $class);
    }

    public function is_deeply($exp1, $exp2, $message = '')
    {
        assertEquals($exp2, $exp1);
    }

    public function fail($message = '')
    {
        assertTrue(false);
    }

    public function include_ok($file, $message = '')
    {
        assertTrue((@include($file)) == 1);
    }

    public function __construct($plan = null, $options = array()) {}
    public function __destruct() {}
    static public function reset() {}
    static public function to_array() {}
    static public function to_xml($results = null) {}

    public function handle_error($code, $message, $file, $line, $context) {} 
    public function error($message, $file = null, $line = null, array $traces = array()) {} 
    public function handle_exception(Exception $exception) {} 
    public function diag($message) {}
    public function skip($message = '', $nb_tests = 1) {}
    public function todo($message = '') {}
    public function comment($message) {}
    public function info($message) {}
    public function pass($message = '') {}
}
