
				Simple ExpressionEngine 2 plugin to make PHP getimagesize function data available as formatted html img tags or strings.
                
				------------------
				TAGS:
				------------------
                
				### {exp:imgdata:tag url="http://url/of/image.jpg" alt="Alt String" html="any additional html you want added to the img tag"}
                Returns HTML img tag with width, height, alt and any custom html
                Example: <img src="http://url/to/my_image.jpg" width="600" height="400" alt="My Image" class="gallery">
                
                ----------------------------------------------------------------
                
                
                ### {exp:imgdata:thumb_tag url="http://url/of/image.jpg" 
                	thumb_dir="http://url/of/thumbs_directory" alt="Alt String" 
                	html="any additional html you want added to the img tag"}
                	
				Return a string with the html img tag for an image with same filename 
				in a directory different from URL. Useful for returning info about EE File Manager manipulations
				in environments without access to EE's native file field variables.
				Important: No trailing slash on thumbs_dir "http://url/of/thumbs_directory"
				Example: <img src="http://url/to/thumbs/my_image.jpg" width="100" height="75" alt="My Image" class="thumbnail">
                
                ----------------------------------------------------------------
                
                                
                ### {exp:imgdata:img_width url="http://url/of/image.jpg"}
                Returns image width
                Example: 600
                
                ----------------------------------------------------------------
                
                
                ### {exp:imgdata:img_height url="http://url/of/image.jpg"}
                Returns image height
                Example: 400
                
				----------------------------------------------------------------
				
                
                ### {exp:imgdata:attr_str url="http://url/of/image.jpg"}
                Returns image width and height attributes for img tag
                Example: width="600" height="400"
                
                ----------------------------------------------------------------
                
                                
		        ------------------
				PARAMETERS:
				------------------
				
				###	url="http://url/to/my_image.jpg"
				URL of img file
				
				###	thumb_url="http://url/to/thumbs_directory"
				URL of alternate directory - no trailing slash
				
				###	alt="Alt Text"
				Alt text to add to img tag
				
				###	html='class="thumb"'
				Any custom html, such as css or title attribute to add to img tag
				
				
		        ------------------
				CHANGELOG:
				------------------
				
				1.1.0 Added img_filename and thumb_tag methods. 
				
				
				
