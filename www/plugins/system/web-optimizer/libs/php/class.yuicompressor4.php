<?php
/**
 * File from Web Optimizer, Alexander Beshkenadze, Nikolay Matsievsky
 * (http://www.web-optimizer.us/)
 * Envelopes YUI Compressor into PHP call
 * Outputs minified content
 *
 * ============================================================
 * YUI Compressor binary is licensed under BSD license
 *
 * Software License Agreement (BSD License)
 * Copyright (c) 2009, Yahoo! Inc.
 * All rights reserved.
 * Redistribution and use of this software in source and binary forms, with or
 * without modification, are permitted provided that the following conditions
 * are met:
 * Redistributions of source code must retain the above copyright notice, this
 * list of conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice,
 * this list of conditions and the following disclaimer in the documentation
 * and/or other materials provided with the distribution.
 * Neither the name of Yahoo! Inc. nor the names of its contributors may be used
 * to endorse or promote products derived from this software without specific
 * prior written permission of Yahoo! Inc.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 **/
class YuiCompressor {

	function __construct($cachedir, $rootdir) {
		$this->jarfile = $rootdir . 'libs/yuicompressor/yuicompressor.jar';
		$this->command = '/usr/bin/env java -jar';
		$this->file = $cachedir . time() . '.js';
	}

	function compress($content, $type="js") {
		@file_put_contents($this->file, $content);
		if (!file_exists($this->file)) {
			return $content;
		}
		if (!$this->check()) {
			@unlink($this->file);
			return $content;
		}
		$content = @shell_exec($this->command . ' ' . $this->jarfile . ' ' . $this->file);
		@unlink($this->file);
		return $content; 
	}

	function check() {
		$locate = @shell_exec('whereis java');
		if (isset($locate)) {
			return true;
		} else {
			return false;
		}
	}
}
?>