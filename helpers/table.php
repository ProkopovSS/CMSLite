<?php
    class table {
  	
  	public function __construct()
	{
		
	}
	
	public function GetTable($data)
	{
		$table=$this->TableView($data['data'],$data['params']);
		return $table;
	} 
	
	public function TableView($data,$params=null)
	{
			$controller	= $params['controller'];	
			$template	= $params['template'];
			$insert 	= $params['insert'];
			$update 	= $params['update'];
			$delete 	= $params['delete'];
			$sort		= $params['sort'];
			$page		= $params['page'];
			$header		= $params['header'];
			$key		= $params['key'];
		
		
		$table='<table border="0" cellpadding="4" cellspacing="0"><tr>';
		
		
		if($header!=null)
		{

			foreach($header as $head=>$val)
			{
				
				$table.= '<th>'.$val.'</th>';//'<th><span onclick="document.table_form_'.$head.'.submit()">'.$val.'</span></th>';	
			}
			
			$table.= '<th></th><th></th>';
			
		}
		
		$table.='</tr>';
		
		$i=0;
		$class="cl_1";
		
		foreach($data as $item)
		{
			if($i%2 == 0) {$class="cl_1";} else {$class="cl_2";}
			$table.='<tr class="'.$class.'">';
			foreach($item as $val)
			{
				$table.='<td>'.$val.'</td>';
			}
			
			$table.='<td><a href="/'.$template.'/'.$controller.'/'.$update.'/'.$item[$key].'">Редактировать</a></td>';
			$table.='<td><a href="/'.$template.'/'.$controller.'/'.$delete.'/'.$item[$key].'">Удалить</a></td>';
			$table.='</tr>';
			$i++;
		}
		
		$table.='</table>';
		
		return $table;	
	}
}
?>