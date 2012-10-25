				Simple ExpressionEngine 2 plugin to make PHP getimagesize function data available as formatted html img tag or strings.
                
				------------------
				TAGS:
				------------------
                
                ### {exp:imgdata:tag url="http://url/of/image.jpg" alt="Alt String" html="any additional html you want added to the img tag"}
                Returns HTML img tag with width, height, alt and any custom html
                Example: <img src="http://url/to/my_image.jpg" width="100" height="75" alt="My Image" class="thumb">
                
                
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
