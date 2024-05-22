
var pathImageDir='./img/';
var pathNoImageFile=pathImageDir+'noimage.png';
var pathRoot='//'+location.hostname;
var pathCSSDir=pathRoot+'/common/css/add_contents_public.css';

var sendError='false';
//var historyDataBase=new Object();

// add contents template default button
var add_contents_box_result_template_default_button = (function() {/*
<div class="add_contents_box" id="add_contents_box_default">
<div class="btn_box_add"><a class="btn btn-app btn_add_contents" data-func-button="plus_button" data-remodal-target="modal"><i class="fa fa-plus"></i></a></div>
</div>
*/}).toString().match(/[^]*\/\*([^]*)\*\/\}$/)[1].replace(/\n|\r/g, "");


// add contents template
var add_contents_box_result_template = (function() {/*
<div class="add_contents_box" data-item-type="">
<div class="btn_box_add"><a class="btn btn-app btn_add_contents" data-func-button="plus_button" data-remodal-target="modal"><i class="fa fa-plus"></i></a></div>
<div class="add_contents_box_result">
<div class="add_contents_box_result_ui">
<a href="javascript:void(0)" class="func_up"><i class="fa fa-angle-up"></i></a>
<a href="javascript:void(0)" class="func_down"><i class="fa fa-angle-down"></i></a>
<a href="javascript:void(0)" class="func_edit" data-remodal-target="modal"><i class="fa fa-pencil-square-o"></i></a>
<a href="javascript:void(0)" class="func_del"><i class="fa fa-trash-o fc_r"></i></a>
</div>
<div class="add_contents_box_result_context">
</div>
</div>
</div>
*/}).toString().match(/[^]*\/\*([^]*)\*\/\}$/)[1].replace(/\n|\r/g, "");

$(function(){
	
	//history();
	ckEditorInit();
	
	init();
	addContents();
	modalControl();
	previewImageByModalEditor();
});

function ckEditorInit(){
	
	CKEDITOR.config.contentsCss = pathCSSDir;
	
	CKEDITOR.config.toolbar = [
	['Source','-','Save','NewPage','Preview','-','Templates']
	,['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print','SpellChecker']
	,['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat']
	,['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField']
	,'/'
	,['Bold','Italic','Underline','Strike','-','Subscript','Superscript']
	,['NumberedList','BulletedList','-','Outdent','Indent','Blockquote']
	,['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']
	,['Link','Unlink','Anchor']
	,['Table','HorizontalRule','Smiley','SpecialChar','PageBreak']
	,['Styles','Format','Font','FontSize']
	,['TextColor','BGColor']
	,['ShowBlocks']
	];
	
	CKEDITOR.replace('htmleditor');
	
	CKEDITOR.on( 'dialogDefinition', function( e ) {

		var dialogName = e.data.name;
		var dialogDefinition = e.data.definition;

		if ( dialogName == 'table' ) {
			
			var info = dialogDefinition.getContents( 'info' );
			info.remove('txtWidth');
			info.remove('txtBorder');
			info.remove('txtCellSpace');
			info.remove('txtCellPad');
			info.remove('txtHeight');
			info.remove('cmbAlign');
			info.remove('txtCaption');
		}
	});

}

//#modal_editorで編集項目のサムネールを選んだ時
function addContents(){

	$('a[data-editor-item]').on('click',function(e){
		
		//タブの切り替え
		modalTabChange_Enter($(this).attr('data-editor-item'));
	});
}

function saveButton(){
	
	//下書き保存（明示的）
	$('a[data-save-draft=true]').on('click',function(){
		
		sendDatabaseItemsToServer ( database_items );
	});
	
	//登録ボタン
	$('a[data-save-complete=true]').on('click',function(){
		
		//下書き保存
		sendDatabaseItemsToServer ( database_items );
		
		//実際の登録動作を挿入する
		trace('登録');
	});
}

//タブの切り替え
function modalTabChange_Enter(mode){
	
	//tab change
	$('#modal_tab > li').removeClass('active');
	$('#modal_tab_btn_editor').addClass('active');

	$('#modal_tab_content .tab-pane').removeClass('active');
	$('#modal_tab_editor').addClass('active');
	
	//mode change
	$('.editor_item').removeClass('active');
	$('#'+mode).addClass('active');
	
	modalTabEmpty( mode );
}

function modalTabEmpty(mode){
	
	//プラスボタンから起動したとき
	if(mode=='editor_item_noset'){
		
		//項目の入力値をリセット
		$('#editor_set').find("textarea, input[type=text], select").val(null).removeClass('item_error').end().find(":checked").prop("checked", false).removeClass('item_error');
		
		//エラーをリセット
		$('#editor_set .item_error_notes').each(function(){
			
			$(this).empty();
			$(this).removeClass('active');
		});

		//プレビュー画像をリセット
		$('#editor_set .item_children img').each(function(){
			
			$(this).attr('src',pathNoImageFile);
		});
		
		//選択したファイルをリセット
		$('#editor_set input[type=file]').each(function(){
			
			$(this).val(null);
			$(this).removeAttr('data-result-base64');
		});
		
		//追加した項目を削除
		$('#editor_item_text .item_children:not(:eq(0))').remove();
		$('#editor_item_list .item_children:not(:eq(0))').remove();
	
	//その他のボタンから起動したとき
	}else{
		
		//エラーをリセット
		$('#editor_set').find("textarea, input, select").removeClass('item_error');
		$('#editor_set .item_error_notes').each(function(){
			
			$(this).empty();
			$(this).removeClass('active');
		});
	}
}

//各種ボタンの設定
//プラスボタン
function plusButton(){
	
	var $button=$('[data-func-button=plus_button]');
	
	$button.off('click');
	
	$button.on('click',function(){
		
		var $editor = $('#modal_editor');
		
		//何番目のコンテンツかをエディターに伝える
		$editor.attr('data-item-index',$('[data-func-button=plus_button]').index(this));
		
		//プラスボタンが押されたことをエディターに伝える
		$editor.attr('data-edit-from','plus_button');
		
		//タブの切り替え
		modalTabChange_Enter('editor_item_noset');
	});
}

//順序いれかえボタン 上
function upButton(){
	
	var $button=$('.func_up');
	
	$button.off('click');
	
	$button.on('click',function(){
		
		var index = $('.func_up').index(this);
		
		saveDatabaseItems( database_items[index], 'up_button' );
		init();
		
		//自動スクロール
		$(window).trigger('upButtonEvent');
		$(window).off('upButtonEvent');
	});
}

//順序いれかえボタン 下
function downButton(){
	
	var $button=$('.func_down');
	
	$button.off('click');
	
	$button.on('click',function(){
		
		var index = $('.func_down').index(this);
		
		saveDatabaseItems( database_items[index], 'down_button' );
		init();
		
		//自動スクロール
		$(window).trigger('downButtonEvent');
		$(window).off('downButtonEvent');
	});
}

//編集ボタン
function editButton(){
	
	var $button=$('.func_edit');
	
	$button.off('click');
	
	$button.on('click',function(){
		
		var $editor = $('#modal_editor');
		var index = $('.func_edit').index(this);
		
		//何番目のコンテンツかをエディターに伝える
		$editor.attr( 'data-item-index', index );
		
		//編集ボタンが押されたことをエディターに伝える
		$editor.attr( 'data-edit-from', 'edit' );
		
		//タブの編集モードをコンテンツと同じものに切り替える
		var mode=$(this).closest('.add_contents_box').attr('data-item-type');
		modalTabChange_Enter( mode );
		
		//データをタブにリロードする
		initInputToModalEditor( mode, index );
	});
}

function initInputToModalEditor( mode, index ){
		
	var $editor = $('#'+mode);
	var itemWrapStart = '<div class="item_children">';
	var itemWrapEnd = '</div>';
	var elementText='';
	var database_item=database_items[index];
	
	//text
	if( mode=='editor_item_text' ){
		
		//trace('アイテムの数 : '+database_item.data.length);
		for(var i=0; i<database_item.data.length; i++){
			
			elementText+=itemWrapStart+'<textarea class="textarea_w24 form-control">'+returnCodeToBreakTag( database_item.data[i].context )+'</textarea><a href="#" class="item_children_remove"><i class="fa fa-remove"></i></a>'+itemWrapEnd+'\n';
		}
		//trace('elementText : \n'+elementText);
		
		//書き出し
		$('.item_children',$editor).addClass('del_children');
		$('.del_children:eq(0)',$editor).before( elementText );
		$('.del_children',$editor).remove();
		
	//html
	}else if( mode=='editor_item_html' ){
		
		//jquryに変換し、ckEditor内で表示されるのテーブルの属性だけを変更（見た目のため）
		var $jCkObj=$( database_item.data[0].context );
		$jCkObjWrap=$('<div></div>');
		$jCkObjWrap.append($jCkObj);
		$('table',$jCkObjWrap).attr({ 
			style: 'width:100%;',
			cellpadding: '1',
			cellspacing: '1',
			border: '1'
		});
		CKEDITOR.instances.htmleditor.setData( $jCkObjWrap.html() );
		$('textarea:first-of-type',$editor).val( database_item.data[0].context );
		
	//image large, middle
	}else if( mode=='editor_item_image_l' || mode=='editor_item_image_m' ){
		
		$('img:eq(0)',$editor).attr('src',database_item.data[0].context );
		try{ $('input[type=file]:eq(0)',$editor).val( database_item.data[0].context ); }catch(e){}
		$('input[type=file]:eq(0)',$editor).attr('data-result-base64',database_item.data[0].context );//server
	
	//image large, middle
	}else if( mode=='editor_item_image_cl' || mode=='editor_item_image_cm' ){
		
		$('img:eq(0)',$editor).attr('src',database_item.data[0].context );
		try{ $('input[type=file]:eq(0)',$editor).val( database_item.data[0].context ); }catch(e){}
		$('input[type=file]:eq(0)',$editor).attr('data-result-base64',database_item.data[0].context );//server
		
		$('input[type=text]:eq(0)',$editor).val( database_item.data[1].context );//local
		
	}else if( mode=='editor_item_image_2col' ){
		
		//image1
		$('img:eq(0)',$editor).attr('src',database_item.data[0].context );
		try{ $('input[type=file]:eq(0)',$editor).val( database_item.data[0].context ); }catch(e){}
		$('input[type=file]:eq(0)',$editor).attr('data-result-base64',database_item.data[0].context );//server
		
		//image2
		$('img:eq(1)',$editor).attr('src',database_item.data[1].context );
		try{ $('input[type=file]:eq(1)',$editor).val( database_item.data[1].context ); }catch(e){}
		$('input[type=file]:eq(1)',$editor).attr('data-result-base64',database_item.data[1].context );//server
	
	}else if( mode=='editor_item_image_c2col' ){
		
		//image1
		$('img:eq(0)',$editor).attr('src',database_item.data[0].context );
		try{ $('input[type=file]:eq(0)',$editor).val( database_item.data[0].context ); }catch(e){}
		$('input[type=file]:eq(0)',$editor).attr('data-result-base64',database_item.data[0].context );//server
		$('input[type=text]:eq(0)',$editor).val( database_item.data[1].context );
		
		//image2
		$('img:eq(1)',$editor).attr('src',database_item.data[2].context );
		try{ $('input[type=file]:eq(1)',$editor).val( database_item.data[2].context ); }catch(e){}
		$('input[type=file]:eq(1)',$editor).attr('data-result-base64',database_item.data[2].context );//server
		$('input[type=text]:eq(1)',$editor).val( database_item.data[3].context );
		
	}else if( mode=='editor_item_image_3col' ){
		
		//image1
		$('img:eq(0)',$editor).attr('src',database_item.data[0].context );
		try{ $('input[type=file]:eq(0)',$editor).val( database_item.data[0].context ); }catch(e){}
		$('input[type=file]:eq(0)',$editor).attr('data-result-base64',database_item.data[0].context );//server
		
		//image2
		$('img:eq(1)',$editor).attr('src',database_item.data[1].context );
		try{ $('input[type=file]:eq(1)',$editor).val( database_item.data[1].context ); }catch(e){}
		$('input[type=file]:eq(1)',$editor).attr('data-result-base64',database_item.data[1].context );//server
		
		//image3
		$('img:eq(2)',$editor).attr('src',database_item.data[2].context );
		try{ $('input[type=file]:eq(2)',$editor).val( database_item.data[2].context ); }catch(e){}
		$('input[type=file]:eq(2)',$editor).attr('data-result-base64',database_item.data[2].context );//server
	
	}else if( mode=='editor_item_image_c3col' ){
		
		//image1
		$('img:eq(0)',$editor).attr('src',database_item.data[0].context );
		try{ $('input[type=file]:eq(0)',$editor).val( database_item.data[0].context ); }catch(e){}
		$('input[type=file]:eq(0)',$editor).attr('data-result-base64',database_item.data[0].context );//server
		$('input[type=text]:eq(0)',$editor).val( database_item.data[1].context );//local
		
		//image2
		$('img:eq(1)',$editor).attr('src',database_item.data[2].context );
		try{ $('input[type=file]:eq(1)',$editor).val( database_item.data[2].context ); }catch(e){}
		$('input[type=file]:eq(1)',$editor).attr('data-result-base64',database_item.data[2].context );//server
		$('input[type=text]:eq(1)',$editor).val( database_item.data[3].context );//local
		
		//image3
		$('img:eq(2)',$editor).attr('src',database_item.data[4].context );
		try{ $('input[type=file]:eq(2)',$editor).val( database_item.data[4].context ); }catch(e){}
		$('input[type=file]:eq(2)',$editor).attr('data-result-base64',database_item.data[4].context );//server
		$('input[type=text]:eq(2)',$editor).val( database_item.data[5].context );//local
		
	}else if( mode=='editor_item_fl' ){
		
		$('img:eq(0)',$editor).attr('src',database_item.data[0].context );
		try{ $('input[type=file]:eq(0)',$editor).val( database_item.data[0].context ); }catch(e){}
		$('input[type=file]:eq(0)',$editor).attr('data-result-base64',database_item.data[0].context );//server
		$('textarea:eq(0)',$editor).val( returnCodeToBreakTag( database_item.data[1].context ) );//local
		
	}else if( mode=='editor_item_fr' ){
		
		$('textarea:eq(0)',$editor).val( returnCodeToBreakTag( database_item.data[0].context ) );//local
		try{ $('img:eq(0)',$editor).attr('src',database_item.data[1].context ); }catch(e){}
		$('input[type=file]:eq(0)',$editor).val( database_item.data[1].context );//local
		$('input[type=file]:eq(0)',$editor).attr('data-result-base64',database_item.data[1].context );//server
		
	}else if( mode=='editor_item_header' || mode=='editor_item_header_sub' ){
		
		$('input[type=text]:eq(0)',$editor).val( database_item.data[0].context );

	}else if( mode=='editor_item_hr' ){
		
		$('input[type=checkbox]:eq(0)',$editor).prop('checked',true);
		
	}else if( mode=='editor_item_list' ){
		
		for(var i=0; i<database_item.data.length; i++){
			
			elementText+=itemWrapStart+'<input class="form-control" type="text" value="'+database_item.data[i].context+'" placeholder="項目を入力します" /><a href="#" class="item_children_remove"><i class="fa fa-remove"></i></a>'+itemWrapEnd+'\n';
		}
		
		//書き出し
		$('.item_children',$editor).addClass('del_children');
		$('.del_children:eq(0)',$editor).before( elementText );
		$('.del_children',$editor).remove();
	}
	
	//項目削除ボタン
	removeItemChildren();
}

//消去ボタン
function deleteButton(){

	var $button=$('.func_del');
	
	$button.off('click');
	
	$button.on('click',function(){
		
		var $box = $(this).closest('.add_contents_box_result');
		
		$box.addClass('delete');
		
		if( confirm('本当に削除してもよろしいですか？') ){
			
			var index = $('.func_del').index(this);

			saveDatabaseItems( database_items[index], 'delete_button' );
			init();

		}else{
		
			$box.removeClass('delete');
			return false;
		}
	});
}

//初期化
function init(){
	
	//前回送信に失敗しているとき
	if(localStorage.getItem('add_contents_database_send_error')=='true'){
		
		$('#alert_area').hide();
		
		//trace('前回送信に失敗しているとき');
		
		if( confirm('前回、ページの保存に失敗しているようです。\nページの復帰には「OK」を選択します。\n') ){
			
			database_items = JSON.parse(localStorage.getItem('add_contents_database_items'));
			localStorage.getItem('add_contents_database_send_error','false');
			
		}else{
			
			$('#alert_area').show();
		}
	}
	
	//データがない場合
	if( !database_items ){
		
	}else{
		
		//データをロード
		loadDatabaseItems( database_items );
	}
	
	//ボタンを有効
	initButtons();
	
	dumper('init');
}

function initButtons(){
	
	plusButton();
	upButton();
	downButton();
	editButton();
	deleteButton();
}

//現状のページをロード
function loadDatabaseItems( database_items ){
	
	var $template = $(add_contents_box_result_template);
	
	//画面を初期化
	$('#add_area').empty();
	
	//ボタンをセット
	$('#add_area').prepend( add_contents_box_result_template_default_button );

	for(var i=0; i<database_items.length; i++){
		
		$template = $(add_contents_box_result_template);
		createContextToContents( $template, database_items[i] );
		appendPreviewContents ( $template, database_items[i].index, 'load' );
	}
}

//登録ボタン
function inputComplete( $button, e ){
	
	console.log('inputComplete start');

	var $template = $(add_contents_box_result_template);
	var $button = $button;
	var $editor = $button.closest('.editor_item');
	var database_item=new Object();
	
	//どのボタンから起動されたか
	var edit_from=$('#modal_editor').attr('data-edit-from');
	
	//データを初期化
	database_item.boot=false;
	database_item.mode=$editor.attr('id');
	database_item.data=new Array();
	database_item.index=$('#modal_editor').attr('data-item-index');
	
	//push input value to database_item
	var checkValue=0;
	var error='';
	
	$('textarea,input,select',$editor).each(function(i){
		
		var tagType=$(this).prop("tagName").toLowerCase();
		var inputType=$(this).attr('type');
		
		//エラーを初期化
		$(this).removeClass('item_error');
		$('.item_error_notes',$editor).empty();
		$('.item_error_notes',$editor).removeClass('active');
		
		//タグを無効化
		if( inputType!='file' || inputType!='checkbox' || tagType!='select' || inputType!='radio' ){
			
			if( $(this).val()!=''){

				if( database_item.mode!= 'editor_item_html' ){

					$(this).val(htmlspecialchars($(this).val()));
				}
			}
		}

		//textarea, select
		if( tagType=='textarea' || tagType=='select' ){
			
			//HTMLエディタ以外
			if( database_item.mode!= 'editor_item_html' ){
				
				if( tagType=='textarea' ){
					
					//改行をbrに変換して保存
					database_item.data[i]={ type : tagType, context : breakTagToReturnCode( $(this).val() ) };
					
				}else{
					
					database_item.data[i]={ type : tagType, context : $(this).val() };
				}
				
			//HTMLエディタの時
			}else{
				
				//ckeditorの値を編集
				var $jCkObj=$(CKEDITOR.instances.htmleditor.getData());
				$jCkObjWrap=$('<div></div>');
				$jCkObjWrap.append($jCkObj);
				$('table',$jCkObjWrap).removeAttr('style cellpadding cellspacing border');
				
				//編集した値をtextareaにセット
				$(this).val( $jCkObjWrap.html() );
				
				//データベースに複製
				database_item.data[i]={ type : tagType, context : $(this).val() };
			}
			
		}else if( inputType=='radio' ){
			
			database_item.data[i]={ type : inputType, context : $(this).val() };

		//input file(image file)
		}else if( inputType=='file' ){
			
			database_item.data[i]={ type : inputType, context : $(this).attr('data-result-base64') };
		
		//input text
		}else if( inputType=='text' ){
			
			database_item.data[i]={ type : inputType, context : $(this).val() };
		
		//input checkbox
		}else if( inputType=='checkbox' ){
			
			database_item.data[i]={ type : inputType, context : $(this).val() };
		}
		
		//エラーを表示
		if( inputType!='file' ){
			
			if( $(this).val()==''){
				
				if( tagType=='textarea'){

					error+='<p>'+String($('textarea',$editor).index(this)+1)+'つ目のテキストが入力されていません。'+'</p>';

				}else{

					if(inputType=='text'){

						error+='<p>'+String($(':text',$editor).index(this)+1)+'つ目のテキストが入力されていません。'+'</p>';

					}
				}
				$(this).addClass('item_error');
				checkValue++;
				
			}else{
				
				if( inputType=='checkbox' ){

					if( !$(this).prop('checked') ){

						error+='<p>チェックが入力されていません。</p>';
						$(this).addClass('item_error');
						checkValue++;
					}
				}
			}
		}
		
	});
	
	if(checkValue>0){
		
		$('.item_error_notes',$editor).addClass('active');
		$('.item_error_notes',$editor).append(error);

		e.preventDefault();
		return false;
	}

	//プレビュー用のタグをテンプレートに書き込む
	createContextToContents( $template, database_item );
	console.log('create html');
	
	//テンプレートをページに挿入
	appendPreviewContents ( $template, database_item.index, edit_from );
	console.log('write html');
	
	//データベースにデータを保存
	saveDatabaseItems ( database_item, edit_from );
	console.log('save data');
	
	dumper('inputComplete');
}

//プレビュー用のタグをテンプレートに書き込む
function createContextToContents ( $template, database_item ){
	
	$template.attr('data-item-type',database_item.mode);
	
	//クラス名セット
	$template.removeAttr('class');
	$template.addClass('add_contents_box');
	$template.addClass(database_item.mode);
	
	var data_elements='';
	
	//text
	if( database_item.mode=='editor_item_text' ){
		
		for(var i=0; i<database_item.data.length; i++){
			
			data_elements += '<p>'+database_item.data[i].context+'</p>\n';
		}
	
	//html
	}else if( database_item.mode=='editor_item_html' ){
		
		data_elements = database_item.data[0].context+'\n';
	
	//image large
	}else if( database_item.mode=='editor_item_image_l' ){
		
		var imgsrc = (!database_item.data[0].context)?pathNoImageFile:database_item.data[0].context;
		data_elements = '<figure class="cl"><img src="'+imgsrc+'" /></figure>';
		
	//image middle
	}else if( database_item.mode=='editor_item_image_m' ){
		
		var imgsrc = (!database_item.data[0].context)?pathNoImageFile:database_item.data[0].context;
		data_elements = '<figure class="cm"><img src="'+imgsrc+'" /></figure>';
	
	}else if( database_item.mode=='editor_item_image_cl' ){
		
		var imgsrc = (!database_item.data[0].context)?pathNoImageFile:database_item.data[0].context;
		data_elements = '<figure class="cl"><img src="'+imgsrc+'" /><figcaption><span>'+database_item.data[1].context+'</span></figcaption></figure>';
	
	}else if( database_item.mode=='editor_item_image_cm' ){
		
		var imgsrc = (!database_item.data[0].context)?pathNoImageFile:database_item.data[0].context;
		data_elements = '<figure class="cm"><img src="'+imgsrc+'" /><figcaption><span>'+database_item.data[1].context+'</span></figcaption></figure>';
	
	}else if( database_item.mode=='editor_item_image_2col' ){
		
		var imgsrc1 = (!database_item.data[0].context)?pathNoImageFile:database_item.data[0].context;
		var imgsrc2 = (!database_item.data[1].context)?pathNoImageFile:database_item.data[1].context;
		
		data_elements = '<div class="images_tile images_tile_2col">\n'+
		'<div>\n'+
		'<figure><img src="'+imgsrc1+'" /></figure>\n'+
		'<figure><img src="'+imgsrc2+'" /></figure>\n'+
		'</div>\n'+
		'</div>\n';

	}else if( database_item.mode=='editor_item_image_c2col' ){
		
		var imgsrc1 = (!database_item.data[0].context)?pathNoImageFile:database_item.data[0].context;
		var imgsrc2 = (!database_item.data[2].context)?pathNoImageFile:database_item.data[2].context;
		
		data_elements = '<div class="images_tile images_tile_2col">\n'+
		'<div>\n'+
		'<figure><img src="'+imgsrc1+'" /><figcaption><span>'+database_item.data[1].context+'</span></figcaption></figure>\n'+
		'<figure><img src="'+imgsrc2+'" /><figcaption><span>'+database_item.data[3].context+'</span></figcaption></figure>\n'+
		'</div>\n'+
		'</div>\n';

	}else if( database_item.mode=='editor_item_image_3col' ){
		
		var imgsrc1 = (!database_item.data[0].context)?pathNoImageFile:database_item.data[0].context;
		var imgsrc2 = (!database_item.data[1].context)?pathNoImageFile:database_item.data[1].context;
		var imgsrc3 = (!database_item.data[2].context)?pathNoImageFile:database_item.data[2].context;
		
		data_elements = '<div class="images_tile images_tile_3col">\n'+
		'<div>\n'+
		'<figure><img src="'+imgsrc1+'" /></figure>\n'+
		'<figure><img src="'+imgsrc2+'" /></figure>\n'+
		'<figure><img src="'+imgsrc3+'" /></figure>\n'+
		'</div>\n'+
		'</div>\n';

	}else if( database_item.mode=='editor_item_image_c3col' ){
		
		var imgsrc1 = (!database_item.data[0].context)?pathNoImageFile:database_item.data[0].context;
		var imgsrc2 = (!database_item.data[2].context)?pathNoImageFile:database_item.data[2].context;
		var imgsrc3 = (!database_item.data[4].context)?pathNoImageFile:database_item.data[4].context;
		
		data_elements = '<div class="images_tile images_tile_c3col">\n'+
		'<div>\n'+
		'<figure><img src="'+imgsrc1+'" /><figcaption><span>'+database_item.data[1].context+'</span></figcaption></figure>\n'+
		'<figure><img src="'+imgsrc2+'" /><figcaption><span>'+database_item.data[3].context+'</span></figcaption></figure>\n'+
		'<figure><img src="'+imgsrc3+'" /><figcaption><span>'+database_item.data[5].context+'</span></figcaption></figure>\n'+
		'</div>\n'+
		'</div>\n';

	}else if( database_item.mode=='editor_item_fl' ){
		
		var imgsrc = (!database_item.data[0].context)?pathNoImageFile:database_item.data[0].context;
		
		data_elements = '<figure class="fl"><img src="'+imgsrc+'" /></figure>\n'+
		'<p>'+database_item.data[1].context+'</p>';

	}else if( database_item.mode=='editor_item_fr' ){
		
		var imgsrc = (!database_item.data[1].context)?pathNoImageFile:database_item.data[1].context;
		
		data_elements = '<p>'+database_item.data[0].context+'</p>\n'+
		'<figure class="fr"><img src="'+imgsrc+'" /></figure>';

	}else if( database_item.mode=='editor_item_header' ){
		
		data_elements = '<h2 class="add_contents_box_result_context_head01">'+database_item.data[0].context+'</h2>\n';
		
	}else if( database_item.mode=='editor_item_header_sub' ){
		
		data_elements = '<h2 class="add_contents_box_result_context_head02">'+database_item.data[0].context+'</h2>\n';
		
	}else if( database_item.mode=='editor_item_hr' ){
		
		if(database_item.data[0].context==1){
			
			data_elements = '<hr class="add_contents_box_result_context_hr">\n';
			
		}else{
			
			//trace('hr no set');
		}
		
	}else if( database_item.mode=='editor_item_list' ){
		
		data_elements ='<ul class="add_contents_box_result_context_list list_disc">\n';
		for(var i=0; i<database_item.data.length; i++){
			
			data_elements += '<li>'+database_item.data[i].context+'</li>\n';
		}
		data_elements = data_elements+'</ul>\n';
	}
	$template.find('.add_contents_box_result_context').append( data_elements );
}

//コンテンツの挿入
function appendPreviewContents ( $template, index, mode ){
	
	var index = Number(index);
	var elementIndex = index+1;
	
	//プラスボタンから起動されたとき
	if( mode=='plus_button' ){

		//一番先頭のプラスボタンが押されたら一番先頭にコンテンツを挿入
		if(index==0){

			$('#add_area').prepend( $template );

		}else{

			//一番下のプラスボタンが押されたら、その前にコンテンツを挿入
			if( $('#add_area > div').size()==elementIndex ){

				$('#add_area > div:last-of-type').before( $template );

			//一番下以外のプラスボタンが押されたら、その後にコンテンツを挿入
			}else{

				$('#add_area > div:nth-of-type('+index+')').after( $template );
			}
		}
		initButtons();
		
	//編集ボタンから起動されたとき
	}else if( mode=='edit' ){
		
		$('#add_area > div:nth-of-type('+elementIndex+')').replaceWith( $template );
		initButtons();
		
	//初期のロード時
	}else if( mode=='load' ){
				
		//インデックスが先頭の時は一番先頭にコンテンツを挿入
		if(index==0){

			$('#add_area').prepend( $template );
		
		//インデックスが先頭では無いときは、デフォルトのプラスボタンの前に挿入
		}else{
			
			$('#add_area > div:last-child').before( $template );
		}
		
	}else{
		
		//trace('!appendPreviewContents mode noset');
	}
	console.log('appendPreviewContents');
}

function saveDatabaseItems ( database_item, mode ) {
	
	//JSのデータベースを上書き
	//プラスボタンから起動されたとき
	if( mode=='plus_button' ){
		
		//要素をインデックスの場所に追加
		database_items.splice( database_item.index, 0, database_item );
		
	//編集ボタンから起動されたとき
	}else if( mode=='edit' ){
		
		//要素を書き換え
		database_items.splice( database_item.index, 1, database_item );
		
	//初期のロード時
	}else if( mode=='load' ){
		
		//何もしない
	}
	
	//アップダウンボタン
	if( database_items.length>1 ){
		
		//上昇ボタン
		if( mode=='up_button' ){
			
			var newIndex=database_item.index-1;
			var nowIndex=database_item.index+1;
			
			if( database_item.index >= 1 ){
				
				//現在の要素を複製して新しいインデックスに挿入
				database_items.splice( newIndex, 0, database_item );
				
				//現在の要素を消去
				database_items.splice( nowIndex, 1);
				
				//順序入れ替え処理が完了したら、自動スクロールを登録
				$(window).on('upButtonEvent', function(e){
					
					$(window).scrollTop($('.add_contents_box:eq('+newIndex+')').offset().top);
				});
				
			}else{
				
				return;
			}
			
		//下降ボタン
		}else if( mode=='down_button' ){
			
			var newIndex=database_item.index+2;
			var nowIndex=database_item.index;
			
			if( database_items.length >= newIndex ){
				
				//現在の要素を複製して新しいインデックスに挿入
				database_items.splice( newIndex, 0, database_item );
				
				//現在の要素を消去
				database_items.splice( nowIndex, 1);
				
				//順序入れ替え処理が完了したら、自動スクロールを登録
				$(window).on('downButtonEvent', function(e){
					
					$(window).scrollTop($('.add_contents_box:eq('+(newIndex-1)+')').offset().top);
				});

			}else{
				
				return;
			}
		}
	}
	
	//削除ボタン		
	if( mode=='delete_button' ){

		database_items.splice( database_item.index, 1 );
	}
	console.log('objectにデータを挿入');
	
	
	//データの順番を表示されているものに合わせて書き換える
	for (var i=0; i<database_items.length; i++){
		
		database_items[i].index=i;
	}
	console.log('データの順番を正す');
	
	dumper( 'saveDatabaseItems' );
	
	//ローカルストレージへバックアップ（通信不能時のバックアップ・通常はサーバーのデータを優先して編集に扱う）
	var localdata = JSON.stringify(database_items);
	localStorage.setItem('add_contents_database_items',localdata);
	console.log('ローカルストレージへデータを挿入');
	
	//サーバーへ送信
	sendDatabaseItemsToServer ( database_items );
	console.log('サーバーへ送信');
}

function sendDatabaseItemsToServer ( database_items ) {

	// 各フィールドから値を取得してJSONデータを作成
	var data = database_items;

	// 通信実行
	$.ajax({
		
		type:"post",
		url:$('form2').attr('action'),// POST送信先のURL
		data:JSON.stringify(data),
		contentType: 'application/json',
		dataType: "json",
		success: function(json_data) {
			
			// 200 OK時
			
			// JSON Arrayの先頭が成功フラグ、失敗の場合2番目がエラーメッセージ
			if (!json_data[0]) {
				
				// サーバが失敗を返した場合
				alert("ページの送信が失敗しました。管理者に以下のコードを見せてください。\nなお、ページのデータはブラウザに保存されていますので、ページをリロードし送信しなおしてください。\nTransaction error. " + json_data[1]);
				
				sendError='true';
				localStorage.setItem('add_contents_database_send_error',sendError);
				return;
				
			}else{
				
				// 成功時処理
				console.log('送信成功');
				
				sendError='false';
				localStorage.setItem('add_contents_database_send_error',sendError);
			}
		},
		error: function() {
			
			// HTTPエラー時
			sendError='true';
			localStorage.setItem('add_contents_database_send_error',sendError);
			console.log("送信エラー");
		},
		complete: function() {
			
			// 成功・失敗に関わらず通信が終了した際の処理
			console.log("sendDatabaseItemsToServer終了");
		}
	});
}

//イメージ画像プレビュー
function previewImageByModalEditor (){
	
	if(!$('.item_photo_select').find('img')[0]){ return; }
	
	$('.item_photo_select input[type=file]').on('change',function(){
		
		var $input = $(this);
		var box = $input.closest('.item_photo_select li');
		
		var filePath = $input.prop('files')[0];
		var fileReader = new FileReader();
		
		if(filePath.type.match('image.*')){
			
			fileReader.onload = function(e){
				
				//base64 text
				$input.attr('data-result-base64',e.target.result);
				
				$('img',box).replaceWith(function() {
					
					var img =$('<img>');
					img.attr('src', fileReader.result);
					return img;
				});
			}
			fileReader.readAsDataURL(filePath);
		}
	});
}

//--------------------------------------------------------
//モーダル
function modalControl(){
	
	//キャンセルボタン
	$('[data-remodal-action=cancel]').on('click', function () {});
	
	//OKボタン
	$('[data-remodal-action=confirm]').on('click', function (e) {
		
		return inputComplete( $(this), e );
	});
	
	//入力項目を増やすボタン
	$('.editor_item .btn_add_contents').on('click', function () {
		
		var $editor_item = $(this).closest('.editor_item');
		
		var $item_children = $('.item_children:eq(-1)',$editor_item);
		
		//最後の項目に続けてクローンを挿入
		var $item_children_clone = $item_children.after( $item_children.clone(true) );
		
		//項目を消すボタンのイベントを設定
		removeItemChildren();
		
		//クローン元の入力値を消す
		//if( $item_children_clone.has('textarea') ){
			
			//$('textarea',$item_children_clone).val(null);
			
		//}else if( $item_children_clone.has('input') ){
			
			//$('input',$item_children_clone).val(null);
		//}
	});
	
	//項目削除ボタン
	removeItemChildren();
	
	//戻すボタン
	//$('[data-editor-action=undo]').on('click', function () {});
}

function removeItemChildren(){
	
	//var $button = $('.item_children_remove',$button);//.item_children_remove
	var $button = $('.item_children_remove');//.item_children_remove
	
	$button.off('click');
	
	//項目削除ボタン
	$button.on('click', function () {
		
		//var $editor_item = $(this).closest('.editor_item');
		var $item_children = $(this).closest('.item_children');
		//var id = $(this).attr('id');
		
		if( $item_children.nextAll('.item_children').size()==0 && $item_children.prevAll('.item_children').size()==0 ){
			
			trace('削除の限界');
			
		}else{
			
			$item_children.remove();
		}
		//writeHistory( $item_children.remove(), 'editor', id, 'remove' );
	});
}

//--------------------------------------------------------

//function history(){
//	
//	historyDataBase.editor=new Object();
//	historyDataBase.func=new Array();
//	
//	$('.editor_item').each(function(){
//		
//		historyDataBase.editor[$(this).attr('id')]=new Array();
//	});
//}
//function writeHistory( $elm, type, id, mode ){
//	
//	historyDataBase.editor[id].push($elm);
//}
//
//function takeHistory( $elm, type, id, mode ){
//	
//	if( historyDataBase.editor[id].length==0 ){ return; }
//	
//	var back = historyDataBase.editor[id].pop();
//	$elm.after( back );
//}

//--------------------------------------------------------

//フォーム送信　display none時の値取得
$('#btn').on('click', function() {
	
	var $form = $('#search form');
	var checkboxObj = Object();

	$('input:checkbox:checked').each(function(index) {
		
		var myname = $(this).attr('name');
		
		myname = myname.replace(/\[|\]/g,'');
		
		var myval = $(this).val();
		
		if(!checkboxObj[myname]){ checkboxObj[myname] = [] }
		
		checkboxObj[myname].push(myval);
	});
	
	var param = Object();	
	$( $form.serializeArray() ).each(function(i, v) { param[v.name]=v.value; });
	$.extend(param, checkboxObj);
	
	postForm( $form.attr('action'), param);
})

var postForm = function(url, data) {
	
	var $form = $('<form/>', {'action': url, 'method': 'post'});
	
	for(var key in data) {
		
		//複数選択項目
		if( $.isArray( data[key] ) ){
			
			for(var i=0; i< data[key].length; i++){
			
				$form.append($('<input/>', {'type': 'hidden', 'name': String(key+'[]'), 'value': data[key][i]}));
			}
		
		//複数選択項目　以外
		}else{
		
			$form.append($('<input/>', {'type': 'hidden', 'name': key, 'value': data[key]}));
		}
	}
	
	$form.appendTo(document.body);
	$form.submit();
};
//--------------------------------------------------------
//バリデーション系
function returnCodeToBreakTag( str ){
	
	var result=String(str.replace(/<br \/>/g, '\n'));
	return result;
}

function breakTagToReturnCode( str ){
	
	var inputValue = str.replace(/\r\n/g, '\n');
	inputValue = inputValue.replace(/\r/g, '\n');
	var lines = inputValue.split('\n');
	var result = lines.join('<br />');
	return result;
}

function htmlspecialchars(ch){
	ch = ch.replace(/&/g,"&amp;") ;
	ch = ch.replace(/"/g,"&quot;") ;
	ch = ch.replace(/'/g,"&#039;") ;
	ch = ch.replace(/</g,"&lt;") ;
	ch = ch.replace(/>/g,"&gt;") ;
	return ch ;
}

//--------------------------------------------------------
//デバッグ用
function dumper( who ){
	
	//var str = database_items.toSource();
	//var result = str.replace( /\[/g , "[<br>" );
	//result = result.replace( /\]/g , "<br>]" );
	//result = result.replace( /\{/g , "{<br>" );
	//result = result.replace( /\}/g , "<br>}" );
	//result = result.replace( /\,/g , ",<br>" );
	
	//$('#dumper').html(who+' called<br><br>'+result);
}

function trace( val ){
	var degug=true;
	if(degug){
		alert( val );
	}
}
