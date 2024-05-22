// content editor main
$(function(){
	getAddPoint();
	addItem();
	removeItem();
});

// get add point
function getAddPoint(){
	
	if( !$('[data-toggle="modal"]')[0] ){ return; }
	
	$('[data-toggle="modal"]').on('click',function(){
		
		var $itemEditor=$(this).closest('.content_editor_item');
		var itemIndex=$('[data-content-editor] .content_editor_item').index( $itemEditor );
		$('[data-content-editor-addpoint]').attr('data-content-editor-addpoint',itemIndex);
	});
}

// Add
function addItem(){
	
	if( !$('[data-content-editor-additem]')[0] ){ return; }
	
	$('[data-content-editor-additem]').on('click',function(){
		
		// get add point
		var itemIndex=$(this).attr('data-content-editor-addpoint');
		
		// before item
		var $beforeItem=$('[data-content-editor] .content_editor_item:eq('+itemIndex+')');
		
		// get add item
		var ID=$(this).attr('data-content-editor-additem');

		// copy template
		var $cloneItem=$('[data-content-editor-template] [data-content-editor-item="'+ID+'"]').clone(true);
		
		// add new item
		$beforeItem.after($cloneItem);
		
		// refresh name
		refreshItemName();
	});
}

function removeItem(){
	
	if( !$('[data-content-editor-remove]')[0] ){ return; }
	
	$('[data-content-editor-remove]').on('click',function(){
		
		if (window.confirm('本当に削除しますか？')) {
			
			var $itemEditor=$(this).closest('.content_editor_item');
			$itemEditor.remove();
			
			// refresh name
			refreshItemName();
		}
	});
}

function refreshItemName(){
	
	if( !$('[data-content-editor] [name^="editor_"]')[0] ){ return; }
	
	$('[data-content-editor] [name^="editor_"]').each(function(index){
		
		var name=$(this).attr('name');
		var str=name.replace(/\d+/g,"");
		var newName='';
		
		if( $(this).attr('name').match(/editor_linkblank/) ){
			
			// get prev index
			var $itemEditor=$(this).closest('.content_editor_item');
			var prevName=$('[name^="editor_linkurl"]',$itemEditor).attr('name');
			var myIndex=Number(prevName.split('editor_linkurl')[1])+1;
			
			// index is prev index + 1
			newName=str+myIndex;
		}else{
			
			// index is directly
			newName=str+index;
		}
		
		// set
		$(this).attr('name',newName);
	});
}
