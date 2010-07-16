<?php

/*
 * This file is part of the sfBehatPlugin package.
 * (c) 2010 Konstantin Kudryashov <ever.zet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class sfBehatLimeNoOutput extends lime_output
{
  public function __construct($force_colors = false, $base_dir = null) {}
  public function diag() {}
  public function comment($message) {}
  public function info($message) {}
  public function error($message, $file = null, $line = null, $traces = array()) {}
  protected function print_trace($method = null, $file = null, $line = null) {}
  public function echoln($message, $colorizer_parameter = null, $colorize = true) {}
  public function green_bar($message) {}
  public function red_bar($message) {}
  protected function strip_base_dir($text) {}
}
