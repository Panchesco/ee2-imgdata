<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	
             $plugin_info        = array(  
                'pi_name'        => 'Imgdata',  
                'pi_version'     => '1.1.0',  
                'pi_author'      => 'Richard Whitmer',  
                'pi_author_url'  => 'http://panchesco.com',  
                'pi_description' => 'Makes PHP getimagesize data available for an image url',  
                'pi_usage'       => Imgdata::usage()  
                );
                
		/**
		* Imgdata Class
		*
		* @package ExpressionEngine
		* @category Plugin
		* @author Richard Whitmer
		* @copyright Copyright (c) 2012, Richard Whitmer
		* @link NA
		*/
		
		
		
        
		class Imgdata {
		
			var $url;
			var $tag;
			var $alt;
			var $html;
			var $data =	array('width' => '','height' => '','type' => '','attr_str' => '');
			var $filename;
			var $thumb_dir; 
		
		
			public function __construct()
			{
				$this->EE =& get_instance();



				// Get info from params
				
                $this->url = $this->EE->TMPL->fetch_param('url');
                $this->alt = $this->EE->TMPL->fetch_param('alt');
                $this->html = $this->EE->TMPL->fetch_param('html');
                $this->thumb_dir = $this->EE->TMPL->fetch_param('thumb_dir');
                
                $this->filename = @basename($this->url);

			}
			
			//--------------------------------------------------------------------------------------
			
			
			/** 
			 * Return a string with the html img tag
			 * with width, height, alt attributes 
			 * as well as html passed in html parameter
			 * Example: <img src="http://url/to/my_image.jpg" width="600" height="400" alt="My Image" class="gallery">
			 *
			 * @return str
			*/
			function tag()
			{ 
				$this->_set_img_data();
				
				$this->tag = '<img src="' . $this->url . '" ';
				
				$this->tag.= 'width="' . $this->data['width'] . '" height="' . $this->data['height'] . '"';
				
				if($this->alt)
				{
					$this->tag.= ' alt="' . $this->alt . '"';
				}
				
				if($this->html)
				{
					$this->tag.= ' ' . $this->html;
				}
				$this->tag.=">";
				
				return $this->tag;
			}
			
			//--------------------------------------------------------------------------------------
			
			
			
			/** 
			 * Return a string with the html img tag for an image with same filename 
			 * in a directory different from URL. Useful for returning info about EE File Manager manipulations
			 * in environments without access to EE's native file field variables
			 * 
			 * Example: <img src="http://url/to/thumbs/my_image.jpg" width="100" height="75" alt="My Image" class="thumbnail">
			 *
			 * @params string
			 * @return str
			*/
			function thumb_tag()
			{
				// Set some properties the _set_img_data method will use
				
				$this->url = $this->thumb_dir . '/' . $this->filename;
				
				$this->_set_img_data();
			
				return  $this->tag();
			}
			
			//--------------------------------------------------------------------------------------
			
			
			
			/** 
			 * Return image width
			 * Example: 600
			 *  
			 * @return str
			*/
			function img_width()
			{
				$this->_set_img_data();
				
				return $this->data['width'];
			}
			
			//--------------------------------------------------------------------------------------
			
			
			
			/** 
			 * Return image height
			 * Example: 400
			 *
			 * @return str
			*/
			function img_height()
			{
				$this->_set_img_data();
				
				return $this->data['height'];
			}
			
			//--------------------------------------------------------------------------------------
			

			/** 
			 * Return "type" data string
			 * Example: 2
			 *
			 * @return str
			*/
			function img_type()
			{
			
				$this->_set_img_data();
			
				return $this->data['type'];
			
			}

			//--------------------------------------------------------------------------------------
			
			
			
			/** 
			 * Return html height width attribute string
			 * Example: width="600" height="400"
			 *  
			 * @return str
			*/
			function attr_str()
			{
				$this->_set_img_data();
				
				return  $this->data['attr_str'];
			}
			
			//--------------------------------------------------------------------------------------
			
			
			
			/** 
			 * Return filename from submitted URL
			 * Example: my_file.jpg
			 *  
			 * @return str
			*/
			function img_filename()
			{
				return  $this->filename;
			}
			
			//--------------------------------------------------------------------------------------
			


	
			/** 
			 * Set data available from getimageszize($this->url) to properties
			 * @return void
			*/
			private function _set_img_data()
			{
			
				list($this->data['width'],$this->data['height'],$this->data['type'],$this->data['attr_str']) = @getimagesize($this->url);

				return;
			
			}

			//--------------------------------------------------------------------------------------



		// ----------------------------------------  
		// Usage  
		// ----------------------------------------  


                  
                function usage()  
                {  
                ob_start();                
                ?>
                

                                
		------------------
		TAGS:
		------------------
		
				### {exp:imgdata:tag url="http://url/of/image.jpg" alt="Alt String" html="any additional html you want added to the img tag"}
                Returns HTML img tag with width, height, alt and any custom html
                Example: <img src="http://url/to/my_image.jpg" width="600" height="400" alt="My Image" class="gallery">
                
                ### {exp:imgdata:thumb_tag url="http://url/of/image.jpg" 
                	thumb_dir="http://url/of/thumbs_directory" alt="Alt String" 
                	html="any additional html you want added to the img tag"}
                	
				Return a string with the html img tag for an image with same filename 
				in a directory different from URL. Useful for returning info about EE File Manager manipulations
				in environments without access to EE's native file field variables.
				Important: No trailing slash on thumbs_dir "http://url/of/thumbs_directory"
				Example: <img src="http://url/to/thumbs/my_image.jpg" width="100" height="75" alt="My Image" class="thumbnail">
                
                
                ### {exp:imgdata:img_width url="http://url/of/image.jpg"}
                Returns image width
                Example: 100
                
                
                ### {exp:imgdata:img_height url="http://url/of/image.jpg"}
                Returns image height
                Example: 75
                
                ### {exp:imgdata:attr_str url="http://url/of/image.jpg"}
                Returns image width and height attributes for img tag
                Example: width="100" height="75"
                
                
		        ------------------
				PARAMETERS:
				------------------
				
				###	url="http://url/to/my_image.jpg"
				URL of img file
				
				###	alt="Alt Text"
				Alt text to add to img tag
				
				###	html='class="thumb"'
				Any custom html, such as css or title attribute to add to img tag


                
                <?php
                
                $buffer = ob_get_contents();
                  
                ob_end_clean();   
                  
                return $buffer;  
                }
                
		}
		


/* End of file pi.imgdata.php */  
/* Location: ./system/expressionengine/third_party/imgdata/pi.imgdata.php */  

            
            
		
