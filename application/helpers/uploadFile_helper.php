<?php 

function uploadFile($filename, $path,$types,$first = true)
	{
        $ci = get_instance();
		$config['upload_path']          = $path;
		$config['allowed_types']        = $types;
        $config['max_size']             = 0;
		if($first){
			$ci->load->library('upload', $config);
		}else {
			$ci->upload->initialize($config);
		}
		if (!$ci->upload->do_upload($filename))
        {
                $error = array('error' => $ci->upload->display_errors());
				return $error;
        }
        else
        {
                $upload_data = $ci->upload->data();
				return $upload_data['file_name'];
        }

	}