<?php
/**
 * @name		CodeIgniter Image Solution
 * @author		Md. Ariful Islam
 * @link		http://www.mdarifulislam.com
 * @license		MIT License Copyright (c) 2015 Md. Ariful Islam
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    
class MY_Image_lib extends CI_Image_lib {
    
    var $user_width = 0;
    var $user_height = 0;
    
    /**
     * Initialize image preferences
     *
     * @access	public
     * @param	array
     * @return	bool
     */
    function initialize($props = array()) {
        // save user specified dimensions and axis positions before they are modified by the CI library
        if (isset($props["img_width"])) {
            $this->user_width = $props["img_width"];
        }
        if (isset($props["img_height"])) {
            $this->user_height = $props["img_height"];
        }
        
        return parent::initialize($props);
    }
    
    /**
     * Resets values in case this class is used in a loop
     *
     * @access	public
     * @return	void
     */
    function clear() {
        $this->user_width = 0;
        $this->user_height = 0;
        
        return parent::clear();
    }
    
    /**
     * Fit the image with supplied dimentions
     *
     * @access	public
     * @return	bool
     */
    function fit_resize() {
    	
    	$custom_height = ( $this->orig_height * $this->user_width ) / $this->orig_width;
    	$custom_y = 0;
    	$custom_x = 0;
    	
    	if ($custom_height > $this->user_height) {
    		$custom_y = ($custom_height - $this->user_height) / 2;
    	} else {
    		$custom_height = $this->user_height;
    		$custom_width = ($this->orig_width * $this->user_height) / $this->orig_height;
    		$custom_x = ($custom_width - $this->user_width) / 2;
    	}
    	
    	$this->maintain_ratio = TRUE;
    	$this->width = $custom_width;
    	$this->height = $custom_height;
    	
    	$src_for_crop = $this->new_image;
    	$this->resize();
    	
    	
    	$this->source_image = $src_for_crop;
    	$this->maintain_ratio = FALSE;
    	$this->width = 60;
    	$this->height = 60;
    	$this->x_axis = $custom_x;
    	$this->y_axis = $custom_y;
    	
    	log_message('ERROR', $this->width.'#'.$this->height.'#'.$this->x_axis.'#'.$this->y_axis);
    	
    	
    	if($this->crop())
    	{
    		return TRUE;
    	}
        
        return FALSE;
    }
}
